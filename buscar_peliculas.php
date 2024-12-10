<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css"><!-- Referencia al archivo CSS -->
    <title>Buscar Películas</title>
    <style>
    body {
        font-family: Arial, sans-serif; /* Tipografía de la página */
        background-color: #f4f4f4; /* Color de fondo claro */
        margin: 0; /* Sin márgenes en el cuerpo */
        padding: 20px; /* Espaciado interno de 20px */
    }
    /* Estilo para el pie de página */
    footer {
        color: black; /* Color del texto (negro) */
        text-align: center; /* Centrar el texto en el pie de página */
    }

    /* Estilo para el título h1 */
    h1 {
        color: white; /* Color del texto (blanco) */
        font-size: 30px; /* Tamaño de fuente para el título */
        text-align: center; /* Alinear el texto al centro */
        margin:  10px 18px; /* Sin márgenes */
        padding: 0px 0px;
    }
    .Container{
        background-color: #040434;
        margin: 0 18px;
        padding: 10px 5px;
        
    }
    .results{
        display: grid;
        grid-template-columns: repeat(4, 1fr); /* Cambiamos a 4 columnas */
        gap: 20px;
        padding:20px;
    }
    .container{
        padding-top: 10px;
    }
    .guardar{
        background-color: #040434;
        color:white;
        margin-left:625px;
        justify-content:center;
        border-radius: 15px;
        width:200px;
        height: 40px;
    }
    .boton{
        display: flex;
        align-items: center;
        text-align:center;
    }
    .buscar{
        background-color: white;
        color:#040434
        margin-left:25px;
        border-radius: 15px;
        width:100px;
        height: 25px;
    }
    form{
        padding-bottom: 10px;
        padding-left:30px;
    }

    </style>
</head>
<body>
<div class="Container">
    <h1>Buscar Películas</h1>
        <form id="searchForm">
            <input type="text" id="searchInput" placeholder="Buscar película..." required>
            <button type="submit" class="buscar">Buscar</button>
        </form>
</div>
    <div id="results" class="results"></div>
    <div class="boton">
    <button id="saveAllButton" style="display: none;" class="guardar">Guardar todas las películas</button>
    </div>
    <div class="container">
        <section class="grid-container">
            <script>
                document.getElementById('searchForm').addEventListener('submit', async function (event) {
                    event.preventDefault(); // Evitar el envío del formulario
                    const query = document.getElementById('searchInput').value;
                    const resultsDiv = document.getElementById('results');
                    const saveAllButton = document.getElementById('saveAllButton');
                    resultsDiv.innerHTML = ''; // Limpiar resultados anteriores
                    saveAllButton.style.display = 'none'; // Ocultar el botón al inicio

                    const apiUrl = `https://www.omdbapi.com/?s=${encodeURIComponent(query)}&apikey=26e0f7c5`;

                    try {
                        const response = await fetch(apiUrl);
                        const data = await response.json();

                        if (data.Response === 'True') {
                            const moviesToSave = [];

                            for (const movie of data.Search) {
                                const movieDetailsUrl = `https://www.omdbapi.com/?i=${movie.imdbID}&apikey=26e0f7c5`;
                                const detailsResponse = await fetch(movieDetailsUrl);
                                const movieDetails = await detailsResponse.json();

                                // Verificar en el backend si la película ya existe
                                const verifyResponse = await fetch(`guardar_busqueda.php?imdbID=${encodeURIComponent(movie.imdbID)}`);
                                const verifyData = await verifyResponse.text();


                                if (verifyData === 'existe') {
                                    resultsDiv.innerHTML += `
                                        <div class='movie-card'>
                                                <img src='${movieDetails.Poster}' alt='Póster de ${movieDetails.Title}' />
                                                <h2>${movieDetails.Title} (${movieDetails.Year})</h2>
                                                <p><strong>Clasificación:</strong> ${movieDetails.Rated}</p>
                                                <p><strong>Estreno:</strong> ${movieDetails.Released}</p>
                                                <p><strong>Duración:</strong> ${movieDetails.Runtime}</p>
                                                <p><strong>Género:</strong> ${movieDetails.Genre}</p>
                                                <p><strong>Director:</strong> ${movieDetails.Director}</p>
                                                <p><strong>Escritor:</strong> ${movieDetails.Writer}</p>
                                                <p><strong>Actores:</strong> ${movieDetails.Actors}</p>
                                                <p><strong>Sinopsis:</strong> ${movieDetails.Plot}</p>
                                                <p><strong>Idioma:</strong> ${movieDetails.Language}</p>
                                                <p><strong>País:</strong> ${movieDetails.Country}</p>
                                                <p><strong>Premios:</strong> ${movieDetails.Awards}</p>
                                                <p><strong>Metascore:</strong> ${movieDetails.Metascore ? movieDetails.Metascore : 'N/A'}</p>
                                                <p><strong>Calificación IMDb:</strong> ${movieDetails.imdbRating}</p>
                                                <p><strong>Votos IMDb:</strong> ${movieDetails.imdbVotes}</p>
                                                <p><strong>ID IMDb:</strong> ${movieDetails.imdbID}</p>
                                                <p><strong>Tipo:</strong> ${movieDetails.Type}</p>
                                                <p><strong>DVD:</strong> ${movieDetails.DVD ? movieDetails.DVD : 'No disponible'}</p>
                                                <p><strong>Box Office:</strong> ${movieDetails.BoxOffice ? movieDetails.BoxOffice : 'No disponible'}</p>
                                                <p><strong>Producción:</strong> ${movieDetails.Production ? movieDetails.Production : 'No disponible'}</p>
                                                <p><strong>Sitio web:</strong> 
                                                    <a href='${movieDetails.Website ? movieDetails.Website : '#'}' target='_blank'>
                                                        ${movieDetails.Website ? movieDetails.Website : 'No disponible'}
                                                    </a>
                                                </p>
                                            <p><strong>Estado:</strong> Ya está registrada.</p>
                                        </div>`;
                                } else {
                                    // Agregar al array de películas para guardar
                                    moviesToSave.push(movieDetails);

                                    resultsDiv.innerHTML += `
                                        <div class='movie-card'>
                                            <img src='${movieDetails.Poster}' alt='Póster de ${movieDetails.Title}' />
                                                <h2>${movieDetails.Title} (${movieDetails.Year})</h2>
                                                <p><strong>Clasificación:</strong> ${movieDetails.Rated}</p>
                                                <p><strong>Estreno:</strong> ${movieDetails.Released}</p>
                                                <p><strong>Duración:</strong> ${movieDetails.Runtime}</p>
                                                <p><strong>Género:</strong> ${movieDetails.Genre}</p>
                                                <p><strong>Director:</strong> ${movieDetails.Director}</p>
                                                <p><strong>Escritor:</strong> ${movieDetails.Writer}</p>
                                                <p><strong>Actores:</strong> ${movieDetails.Actors}</p>
                                                <p><strong>Sinopsis:</strong> ${movieDetails.Plot}</p>
                                                <p><strong>Idioma:</strong> ${movieDetails.Language}</p>
                                                <p><strong>País:</strong> ${movieDetails.Country}</p>
                                                <p><strong>Premios:</strong> ${movieDetails.Awards}</p>
                                                <p><strong>Metascore:</strong> ${movieDetails.Metascore ? movieDetails.Metascore : 'N/A'}</p>
                                                <p><strong>Calificación IMDb:</strong> ${movieDetails.imdbRating}</p>
                                                <p><strong>Votos IMDb:</strong> ${movieDetails.imdbVotes}</p>
                                                <p><strong>ID IMDb:</strong> ${movieDetails.imdbID}</p>
                                                <p><strong>Tipo:</strong> ${movieDetails.Type}</p>
                                                <p><strong>DVD:</strong> ${movieDetails.DVD ? movieDetails.DVD : 'No disponible'}</p>
                                                <p><strong>Box Office:</strong> ${movieDetails.BoxOffice ? movieDetails.BoxOffice : 'No disponible'}</p>
                                                <p><strong>Producción:</strong> ${movieDetails.Production ? movieDetails.Production : 'No disponible'}</p>
                                                <p><strong>Sitio web:</strong> 
                                                    <a href='${movieDetails.Website ? movieDetails.Website : '#'}' target='_blank'>
                                                        ${movieDetails.Website ? movieDetails.Website : 'No disponible'}
                                                    </a>
                                                </p>
                                            <p><strong>Estado:</strong> No está registrada.</p>
                                        </div>`;
                                }
                            }
 
                            // Si hay películas para guardar, mostrar el botón
                            if (moviesToSave.length > 0) {
                                saveAllButton.style.display = 'block';

                                // Manejar el evento de guardar todas las películas
                                saveAllButton.onclick = async function () {
                                    if (confirm('¿Desea guardar todas las películas nuevas encontradas?')) {
                                        try {
                                            const saveResponse = await fetch('guardar_todas_peliculas.php', {
                                                method: 'POST',
                                                headers: {
                                                    'Content-Type': 'application/json',
                                                },
                                                body: JSON.stringify(moviesToSave),
                                            });
                                            const saveData = await saveResponse.text();
                                            alert(saveData);
                                            window.location.href = 'index.php';
                                            // Ocultar el botón después de guardar
                                            saveAllButton.style.display = 'none';

                                        } catch (error) {
                                            console.error('Error al guardar las películas:', error);
                                        }
                                    }
                                };
                            }
                        } else {
                            resultsDiv.innerHTML = '<p>No se encontraron películas.</p>';
                        }
                    } catch (error) {
                        console.error('Error:', error);
                        resultsDiv.innerHTML = '<p>Error al buscar las películas.</p>';
                    }
                });
            </script>
        </section>
    </div>
    <footer>
        <p>© 2024 Jonathan Sastre - Página web de Películas</p>
    </footer>
</body>
</html>
  