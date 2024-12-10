// Función para obtener película desde la API
async function obtenerPelicula() {
    try {
        // Verifica que tienes un imdbID válido para hacer la solicitud
        const imdbID = "tt0242653";  // Este es solo un ejemplo. Deberías obtener el valor dinámicamente.
        // Realizar una solicitud a obtener_Movies.php usando imdbID
        const response = await fetch('api/obtener_películas.php?imdbID=${imdbID}');

        const data = await response.json();
        // Verificar si se obtuvo una respuesta válida
        if (data.Response === 'True' && data.Movies && data.Movies.length > 0) {
            // Crear un elemento para mostrar la información de la película
            const listaPeliculas  = document.getElementById('peliculas-lista');
            listaPeliculas.innerHTML = ''; // Limpiar la lista antes de agregar nuevas películas
            // Ajustar el acceso a las propiedades de acuerdo con la estructura real de los datos
            const peliculaHTML = `
                <h3><strong>Title:</strong> ${data.Movies[0].Title || 'No disponible'}</h3>
                <p><strong>Year:</strong> ${data.Movies[0].Year || 'No disponible'}</p>
                <p><strong>Rated:</strong> ${data.Movies[0].Rated || 'No disponible'}</p>
                <p><strong>Released:</strong> ${data.Movies[0].Released || 'No disponible'}</p>
                <p><strong>Runtime:</strong> ${data.Movies[0].Runtime || 'No disponible'}</p>
                <p><strong>Genre:</strong> ${data.Movies[0].Genre || 'No disponible'}</p>
                <p><strong>Director:</strong> ${data.Movies[0].Director || 'No disponible'}</p>
                <p><strong>Writer:</strong> ${data.Movies[0].Writer || 'No disponible'}</p>
                <p><strong>Actors:</strong> ${data.Movies[0].Actors || 'No disponible'}</p>
                <p><strong>Plot:</strong> ${data.Movies[0].Plot || 'No disponible'}</p>
                <p><strong>Language:</strong> ${data.Movies[0].Language || 'No disponible'}</p>
                <p><strong>Country:</strong> ${data.Movies[0].Country || 'No disponible'}</p>
                <p><strong>Awards:</strong> ${data.Movies[0].Awards || 'No disponible'}</p>
                <p><strong>Ratings:</strong> ${data.Movies[0].Ratings || 'No disponible'}</p>
                <p><strong>Metascore:</strong> ${data.Movies[0].Metascore || 'No disponible'}</p>
                <p><strong>imdbRating:</strong> ${data.Movies[0].imdbRating || 'No disponible'}</p>
                <p><strong>imdbVotes:</strong> ${data.Movies[0].imdbVotes || 'No disponible'}</p>
                <p><strong>imdbID:</strong> ${data.Movies[0].imdbID || 'No disponible'}</p>
                <p><strong>Type:</strong> ${data.Movies[0].Type || 'No disponible'}</p>
                <p><strong>DVD:</strong> ${data.Movies[0].DVD || 'No disponible'}</p>
                <p><strong>BoxOffice:</strong> ${data.Movies[0].BoxOffice || 'No disponible'}</p>
                <p><strong>Production:</strong> ${data.Movies[0].Production || 'No disponible'}</p>
                <p><strong>Website:</strong> <a href="${data.Movies[0].Website || '#'}" target="_blank">${data.Movies[0].Website || 'No disponible'}</a></p>
            `;
            listaPeliculas.innerHTML = peliculaHTML; // Mostrar la película en la lista
        } else {
            const errorMessage = data.Error || 'No se encontró la película'; // Mostrar el error en la consola
            console.error('Error:', errorMessage);
            alert('No se encontró la película: ' + errorMessage);
        }
    } catch (error) {
        // Aquí va el código que maneja los errores
        console.error('Error al obtener la película:', error);
    } finally {
        // Este bloque es opcional, se ejecuta después de try y catch
        console.log('Operación de obtención de película terminada');
    }
}

// Llamar a la función para obtener las películas al cargar la página
window.onload = obtenerPelicula;
