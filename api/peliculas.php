<?php
// Tu clave de API de OMDb
$apiKey = '26e0f7c5'; // Reemplaza con tu clave de API real

// URL de la API de OMDb
$apiUrl = 'https://www.omdbapi.com/?s=Harry&apikey=' . $apiKey; //

// Realizar la solicitud a la API
$response = file_get_contents($apiUrl);

// Verificar si la solicitud fue exitosa
if ($response === FALSE) {
    die('Error al obtener los datos de la API');
}

// Decodificar el JSON recibido
$movies = json_decode($response, true);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Películas</title>
   <!-- <link rel="stylesheet" href="styles.css"> -->
<body>
    <h1>Lista de Películas</h1>
    <ul>
    <?php
        // Comprobar si hay películas y mostrarlas en una lista
        if (!empty($movies['Search'])) {
            foreach ($movies['Search'] as $movie) {
                // Realizar una solicitud adicional para obtener detalles de cada película
                $movieDetailsUrl = 'https://www.omdbapi.com/?i=' . $movie['imdbID'] . '&apikey=' . $apiKey;
                $movieDetailsResponse = file_get_contents($movieDetailsUrl);
                $movieDetails = json_decode($movieDetailsResponse, true);
            // Verificar si se obtuvieron detalles de la película
            if (!empty($movieDetails) && $movieDetails['Response'] === 'True') {
                echo "<div class='movie'>";
                echo "<img src='" . htmlspecialchars($movieDetails['Poster']) . "' alt='Póster de " . htmlspecialchars($movieDetails['Title']) . "' />";
                echo "<h2>" . htmlspecialchars($movieDetails['Title']) . " (" . htmlspecialchars($movieDetails['Year']) . ")</h2>";
                echo "<p><strong>Clasificación:</strong> " . htmlspecialchars($movieDetails['Rated']) . "</p>";
                echo "<p><strong>Estreno:</strong> " . htmlspecialchars($movieDetails['Released']) . "</p>";
                echo "<p><strong>Duración:</strong> " . htmlspecialchars($movieDetails['Runtime']) . "</p>";
                echo "<p><strong>Género:</strong> " . htmlspecialchars($movieDetails['Genre']) . "</p>";
                echo "<p><strong>Director:</strong> " . htmlspecialchars($movieDetails['Director']) . "</p>";
                echo "<p><strong>Escritor:</strong> " . htmlspecialchars($movieDetails['Writer']) . "</p>";
                echo "<p><strong>Actores:</strong> " . htmlspecialchars($movieDetails['Actors']) . "</p>";
                echo "<p><strong>Sinopsis:</strong> " . htmlspecialchars($movieDetails['Plot']) . "</p>";
                echo "<p><strong>Idioma:</strong> " . htmlspecialchars($movieDetails['Language']) . "</p>";
                echo "<p><strong>País:</strong> " . htmlspecialchars($movieDetails['Country']) . "</p>";
                echo "<p><strong>Premios:</strong> " . htmlspecialchars($movieDetails['Awards']) . "</p>";
                    // Manejo del Metascore
                    $metascore = !empty($movieDetails['Metascore']) ? htmlspecialchars($movieDetails['Metascore']) : 'N/A';
                    echo "<p><strong>Metascore:</strong> " . $metascore . "</p>";
                
                echo "<p><strong>Calificación IMDb:</strong> " . htmlspecialchars($movieDetails['imdbRating']) . "</p>";
                echo "<p><strong>Votos IMDb:</strong> " . htmlspecialchars($movieDetails['imdbVotes']) . "</p>";
                echo "<p><strong>ID IMDb:</strong> " . htmlspecialchars($movieDetails['imdbID']) . "</p>";
                echo "<p><strong>Tipo:</strong> " . htmlspecialchars($movieDetails['Type']) . "</p>";
                
                // Manejo de DVD, Box Office, Producción y Website
                echo "<p><strong>Dvd:</strong> " . (isset($movieDetails['DVD']) ? htmlspecialchars($movieDetails['DVD']) : 'No disponible') . "</p>";
                echo "<p><strong>Box Office:</strong> " . (isset($movieDetails['BoxOffice']) ? htmlspecialchars($movieDetails['BoxOffice']) : 'No disponible') . "</p>";
                echo "<p><strong>Producción:</strong> " . (isset($movieDetails['Production']) ? htmlspecialchars($movieDetails['Production']) : 'No disponible') . "</p>";
                echo "<p><strong>Sitio web:</strong> <a href='" . (isset($movieDetails['Website']) ? htmlspecialchars($movieDetails['Website']) : '#') . "' target='_blank'>" . (isset($movieDetails['Website']) ? htmlspecialchars($movieDetails['Website']) : 'No disponible') . "</a></p>";
                echo "<div class='clear'></div>";
                echo "</div>"; // Cierre del div .movie
            }else{
                echo "<p>No se encontraron detalles para la película: " . htmlspecialchars($movie['Title']) . "</p>";
            }
        }
        } else {
            echo '<li>No se encontraron películas.</li>';
        }
        ?>
    </ul>
</body>
</html>

<?php
// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "peliculas";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Tu clave de API de OMDb
$apiKey = '26e0f7c5'; // Reemplaza con tu clave de API real

// URL de la API de OMDb
$apiUrl = 'https://www.omdbapi.com/?s=Harry&apikey=' . $apiKey;

// Realizar la solicitud a la API
$response = file_get_contents($apiUrl);
if ($response === FALSE) {
    die('Error al obtener los datos de la API');
}

// Decodificar el JSON recibido
$movies = json_decode($response, true);

// Verificar si la respuesta contiene resultados
if (isset($movies['Search'])) {
    foreach ($movies['Search'] as $movie) {
        // Solicitar detalles completos de cada película
        $detailsUrl = 'https://www.omdbapi.com/?i=' . $movie['imdbID'] . '&apikey=' . $apiKey;
        $detailsResponse = file_get_contents($detailsUrl);
        $movieData = json_decode($detailsResponse, true);

        // Asignar los valores de la API a las variables
        $title = $movieData['Title'];
        $year = $movieData['Year'];
        $rated = $movieData['Rated'] ?? 'N/A';
        $released = $movieData['Released'] ?? 'N/A';
        $runtime = $movieData['Runtime'] ?? 'N/A';
        $genre = $movieData['Genre'] ?? 'N/A';
        $director = $movieData['Director'] ?? 'N/A';
        $writer = $movieData['Writer'] ?? 'N/A';
        $actors = $movieData['Actors'] ?? 'N/A';
        $plot = $movieData['Plot'] ?? 'N/A';
        $language = $movieData['Language'] ?? 'N/A';
        $country = $movieData['Country'] ?? 'N/A';
        $awards = $movieData['Awards'] ?? 'N/A';
        $poster = $movieData['Poster'] ?? 'N/A';
        $imdbRating = $movieData['imdbRating'] ?? 'N/A';
        $imdbVotes = $movieData['imdbVotes'] ?? 'N/A';
        $imdbID = $movieData['imdbID'] ?? 'N/A';
        $type = $movieData['Type'] ?? 'N/A';
        $DVD = $movieData['DVD'] ?? 'N/A';
        $BoxOffice = $movieData['BoxOffice'] ?? 'N/A';
        $Production = $movieData['Production'] ?? 'N/A';
        $Website = $movieData['Website'] ?? 'N/A';

        // Preparar la consulta SQL
        $sql = "INSERT INTO peliculas 
        (Title, `Year`, Rated, Released, Runtime, Genre, Director, Writer, Actors, 
        Plot, `Language`, Country, Awards, Poster, imdbRating, imdbVotes, imdbID, 
        `Type`, DVD, BoxOffice, Production, Website)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ON DUPLICATE KEY UPDATE
        Title=?, `Year`=?, Rated=?, Released=?, Runtime=?, Genre=?, Director=?, 
        Writer=?, Actors=?, Plot=?, `Language`=?, Country=?, Awards=?, 
        Poster=?, imdbRating=?, imdbVotes=?, imdbID=?, `Type`=?, DVD=?, BoxOffice=?, 
        Production=?, Website=?";


        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            die("Error en la preparación de la declaración: " . $conn->error);
        }

        // Ejecutar la declaración
        $stmt->bind_param(
            "ssssssssssssssssssssssssssssssssssssssssssss", // 44 's' para los 44 valores
            $title, $year, $rated, $released, $runtime, $genre, $director, $writer, $actors, $plot,
            $language, $country, $awards, $poster, $imdbRating, $imdbVotes, $imdbID, $type, $DVD,
            $BoxOffice, $Production, $Website,
            $title, $year, $rated, $released, $runtime, $genre, $director, $writer, $actors, $plot,
            $language, $country, $awards, $poster, $imdbRating, $imdbVotes, $imdbID, $type, $DVD, 
            $BoxOffice, $Production, $Website
        );        
        if ($stmt->execute()) {
            echo "Registro guardado o actualizado con éxito para: $title<br>";
        } else {
            echo "Error al guardar el registro para $title: " . $stmt->error . "<br>";
        }

        $stmt->close();
    }
} else {
    echo "No se encontraron películas para la búsqueda.";
}

// Cerrar la conexión
$conn->close();
?>

  