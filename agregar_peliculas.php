<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Agregar Película </title>
        <link rel="stylesheet" href="css/estilos.css"><!-- Referencia al archivo CSS -->

        <script src="js/script.js" defer></script><!-- Enlace a un archivo JavaScript -->
        <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            margin: 0;
            background-color: white;
        }
        .container form{
            justify-content: center; /* Centra horizontalmente */
            align-items: center;    /* Centra verticalmente */
        }

        #form-pelicula {
            display: grid;
            grid-template-columns: repeat(2, 1fr); /* Dos columnas de igual tamaño */
            gap: 10px; /* Espacio entre los campos */
            padding-left: 20px;
            padding-right: 20px;
            border-radius: 5px;
            box-shadow: 20px 10px 5px rgba(0, 0, 0, 0.1);
            padding-top:10px;
            color: white;
            background-color:#040434 ;
        }
        .form-section {
            grid-column: span 2; /* Cada sección ocupa ambas columnas */
            margin-bottom: 20px; /* Espacio entre secciones */
        }
        .form-group {
            display: flex; /* Usamos flexbox para alinear label e input */
            margin-bottom: 5px; /* Espacio entre grupos de campos */
            align-items: center; /* Centra verticalmente el contenido */
            margin-top:10px;
            justify-content:center;
        }   
        label {
            flex: 1; /* Fija el ancho de la etiqueta */
        }

        input, textarea {
            width: 550px;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            display: inline-flex;
        }

        button{
            background-color: white;
            color: #040434;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-bottom: 20px; /* Espacio debajo del botón */
            width: 100px;
            height: 50px;
            font-size: 19px;
            padding: 10px 20px; 
            margin-left:93%;
            text-align:center;
            padding-left: 10px;
            padding-right: 10px;
        }
        .buttom-form{
            justify-content:center;
            align-items:center;
        }
        .form-grid {
            grid-column: span 1; /* Ocupa una columna */
            margin-top: 10px;
        }
        h1{
            color: white;
            justify-content:center;
            align-items:center;
            display:flex;
            background-color: #040434;
            background-size: 10px;
            padding-top:10px;
            padding-bottom:10px;
            font-size: 35px;
        }
        footer{
           margin-bottom: 20px; /* Espacio debajo del botón */
           color:white;
           color:blue;
           justify-content:center;
            align-items:center;
            display:flex;
        }
    </style>
    </head>
        <body>
            <div class="container">
                <!-- Título de la página -->
                <h1>Agregar Pelicula</h1>

                <!-- Formulario para agregar nuevas películas -->
                <form id="form-pelicula" action="api/guardar_pelicula.php" method="POST">
                <div class="form-group">
                    <label for="Title">Título:</label>
                    <input type="text" id="Title" name="Title" placeholder="Título" required>
                </div>
                <div class="form-group">
                    <label for="Year">Año:</label>
                    <input type="text" id="Year" name="Year" placeholder="Año" required>
                </div>
                <div class="form-group">
                    <label for="Rated">Clasificación:</label>
                    <input type="text" id="Rated" name="Rated" placeholder="Clasificación" required>
                </div>
                <div class="form-group">
                    <label for="Released">Fecha de Estreno:</label>
                    <input type="date" id="Released" name="Released" required>
                </div>
                <div class="form-group">
                    <label for="Runtime">Duración:</label>
                    <input type="text" id="Runtime" name="Runtime" placeholder="Duración en minutos" required>
                </div>
                <div class="form-group">
                    <label for="Genre">Género:</label>
                    <input type="text" id="Genre" name="Genre" placeholder="Tipo de género" required>
                </div>
                <div class="form-group">
                    <label for="Director">Director:</label>
                    <input type="text" id="Director" name="Director" placeholder="Director" required>
                </div>
                <div class="form-group">
                    <label for="Writer">Escritor:</label>
                    <input type="text" id="Writer" name="Writer" placeholder="Escritor" required>
                </div>
                <div class="form-group">
                    <label for="Actors">Actores:</label>
                    <input type="text" id="Actors" name="Actors" placeholder="Actores" required>
                </div>
                <div class="form-group">
                    <label for="Plot">Sinopsis:</label>
                    <textarea id="Plot" name="Plot" placeholder="Sinopsis o resumen de trama" required></textarea>
                </div>
                <div class="form-group">
                    <label for="Language">Idioma:</label>
                    <input type="text" id="Language" name="Language" placeholder="Idioma" required>
                </div>
                <div class="form-group">
                    <label for="Country">País:</label>
                    <input type="text" id="Country" name="Country" placeholder="País" required>
                </div>
                <div class="form-group">
                    <label for="Awards">Premios:</label>
                    <input type="text" id="Awards" name="Awards" placeholder="Premios" required>
                </div>
                <div class="form-group">
                    <label for="Poster">URL del Poster:</label>
                    <input type="url" id="Poster" name="Poster" placeholder="URL del Poster" required>
                </div>
                <div class="form-group">
                    <label for="Ratings">Calificaciones:</label>
                    <input type="text" id="Ratings" name="Ratings" placeholder="Calificaciones en decimales" required>
                </div>
                <div class="form-group">
                    <label for="Metascore">Metascore:</label>
                    <input type="text" id="Metascore" name="Metascore" placeholder="Metascore" required>
                </div>
                <div class="form-group">
                    <label for="imdbRating">Calificación IMDb:</label>
                    <input type="text" id="imdbRating" name="imdbRating" placeholder="Calificación IMDb en decimal" required>
                </div>
                <div class="form-group">
                    <label for="imdbVotes">Votos IMDb:</label>
                    <input type="text" id="imdbVotes" name="imdbVotes" placeholder="Votos IMDb en decimal" required>
                </div>
                <div class="form-group">
                    <label for="imdbID">ID de IMDb:</label>
                    <input type="text" id="imdbID" name="imdbID" placeholder="ID de IMDb de cada película" required>
                </div>
                <div class="form-group">
                    <label for="Type">Tipo:</label>
                    <input type="text" id="Type" name="Type" placeholder="Serie, película" required>
                </div>
                <div class="form-group">
                    <label for="DVD">Fecha de lanzamiento en DVD:</label>
                    <input type="date" id="DVD" name="DVD" required>
                </div>
                <div class="form-group">
                    <label for="BoxOffice">Recaudación en Taquilla:</label>
                    <input type="text" id="BoxOffice" name="BoxOffice" placeholder="Recaudación en Taquilla" required>
                </div>
                <div class="form-group">
                    <label for="Production">Producción:</label>
                    <input type="text" id="Production" name="Production" placeholder="Producción" required>
                </div>
                <div class="form-group">
                    <label for="Website">Sitio Web:</label>
                    <input type="text" id="Website" name="Website" placeholder="Sitio Web" required>
                </div>

                    <div class="buttom-form">
                        <button id="pelicula" type="submit">Agregar</button>
                    </div>
                </form>
                <div id="resultado"></div>
<script>
document.getElementById('form-pelicula').addEventListener('submit', async function(event) {
    event.preventDefault(); // Evita el envío normal del formulario
    const formData = new FormData(this); // Crea un FormData a partir del formulario

    const imdbID = formData.get('imdbID');

    // Verificar con una API del backend si la película ya existe
    const response = await fetch('guardarinformacionformulario.php?imdbID=' + encodeURIComponent(imdbID));
    const data = await response.text();

    if (data === 'existe') {
        alert('La película ya está registrada.');
    } else {
    // Si no existe, enviar el formulario
    fetch('guardarinformacionformulario.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                document.getElementById('resultado').innerHTML = data; // Mostrar la respuesta en el div
                this.reset(); // Reinicia el formulario
                if(confirm('¿Desea agregar otra pelicula?')){
                }else
                    window.location.href = 'index.php';
                })
            .catch(error => console.error('Error:', error));
    }
});
</script>

                <footer>
                    <p>© 2024 Jonathan Sastre - Página web de Películas</p>
                </footer>
            </div>
        </body>
</html>