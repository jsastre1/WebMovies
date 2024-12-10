<?php
// Conexión a la base de datos
$conn = new mysqli('localhost', 'root', '', 'peliculas');

if ($conn->connect_error) {
    die('Error de conexión: ' . $conn->connect_error);
}

// Leer el cuerpo de la solicitud
$data = file_get_contents('php://input');
$movies = json_decode($data, true);

if (!empty($movies)) {
    foreach ($movies as $movie) {
        // Verificar si los campos existen antes de acceder a ellos
        $imdbID = isset($movie['imdbID']) ? $conn->real_escape_string($movie['imdbID']) : null;
        $title = isset($movie['Title']) ? $conn->real_escape_string($movie['Title']) : null;
        $year = isset($movie['Year']) ? $conn->real_escape_string($movie['Year']) : null;
        $rated = isset($movie['Rated']) ? $conn->real_escape_string($movie['Rated']) : null;
        $released = isset($movie['Released']) ? $conn->real_escape_string($movie['Released']) : null;
        $runtime = isset($movie['Runtime']) ? $conn->real_escape_string($movie['Runtime']) : null;
        $genre = isset($movie['Genre']) ? $conn->real_escape_string($movie['Genre']) : null;
        $director = isset($movie['Director']) ? $conn->real_escape_string($movie['Director']) : null;
        $writer = isset($movie['Writer']) ? $conn->real_escape_string($movie['Writer']) : null;
        $actors = isset($movie['Actors']) ? $conn->real_escape_string($movie['Actors']) : null;
        $plot = isset($movie['Plot']) ? $conn->real_escape_string($movie['Plot']) : null;
        $language = isset($movie['Language']) ? $conn->real_escape_string($movie['Language']) : null;
        $country = isset($movie['Country']) ? $conn->real_escape_string($movie['Country']) : null;
        $awards = isset($movie['Awards']) ? $conn->real_escape_string($movie['Awards']) : null;
        $poster = isset($movie['Poster']) ? $conn->real_escape_string($movie['Poster']) : null;
        $metascore = isset($movie['Metascore']) ? $conn->real_escape_string($movie['Metascore']) : null;
        $imdbRating = isset($movie['imdbRating']) ? $conn->real_escape_string($movie['imdbRating']) : null;
        $imdbVotes = isset($movie['imdbVotes']) ? $conn->real_escape_string($movie['imdbVotes']) : null;
        $type = isset($movie['Type']) ? $conn->real_escape_string($movie['Type']) : null;
        $dvd = isset($movie['DVD']) ? $conn->real_escape_string($movie['DVD']) : null;
        $boxOffice = isset($movie['BoxOffice']) ? $conn->real_escape_string($movie['BoxOffice']) : null;
        $production = isset($movie['Production']) ? $conn->real_escape_string($movie['Production']) : null;
        $website = isset($movie['Website']) ? $conn->real_escape_string($movie['Website']) : null;

        // Verificar si la película ya existe en la base de datos
        $result = $conn->query("SELECT * FROM peliculas WHERE imdbID = '$imdbID'");
        if ($result->num_rows == 0) {
            // Insertar la película si no existe
            $sql = "INSERT INTO peliculas (Title, `Year`, Rated, Released, Runtime, Genre, Director, Writer, Actors, Plot, 
                    `Language`, Country, Awards, Poster, Metascore, imdbRating, imdbVotes, imdbID, `Type`, DVD, BoxOffice, Production, Website)
                    VALUES ('$title', '$year', '$rated', '$released', '$runtime', '$genre', '$director', '$writer', '$actors', '$plot',
                    '$language', '$country', '$awards', '$poster', '$metascore', '$imdbRating', '$imdbVotes', '$imdbID', '$type', '$dvd',
                    '$boxOffice', '$production', '$website')";
            
            // Ejecutar la consulta de inserción
            if ($conn->query($sql) === TRUE) {
                echo "Película guardada correctamente. <br>";
            } else {
                echo "Error al guardar la película " . $conn->error . "<br>";
            }
        } else {
            echo "La película con IMDB ID '$imdbID' ya está registrada.<br>";
        }
    }
} else {
    echo 'No hay películas para guardar.';
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
