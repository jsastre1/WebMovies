<?php
// Conexión a la base de datos
$conn = new mysqli('localhost', 'root', '', 'peliculas');

if ($conn->connect_error) {
    die('Error de conexión: ' . $conn->connect_error);
}

// Verificar si es una solicitud GET o POST
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Verificar si la película ya está registrada (GET)
    if (isset($_GET['imdbID'])) {
        $imdbID = $conn->real_escape_string($_GET['imdbID']);
        
        $result = $conn->query("SELECT * FROM peliculas WHERE imdbID = '$imdbID'");
        if ($result->num_rows > 0) {
            echo 'existe';
        } else {
            echo 'no existe';
        }
    } else {
        echo 'Parámetro imdbID faltante.';
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Guardar una nueva película (POST)
    $data = json_decode(file_get_contents('php://input'), true);

    if (!empty($data)) {
        $imdbID = $conn->real_escape_string($data['imdbID']);
        $title = $conn->real_escape_string($data['Title']);
        $year = $conn->real_escape_string($data['Year']);
        $rated = $conn->real_escape_string($data['Rated']);
        $released = $conn->real_escape_string($data['Released']);
        $runtime = $conn->real_escape_string($data['Runtime']);
        $genre = $conn->real_escape_string($data['Genre']);
        $director = $conn->real_escape_string($data['Director']);
        $writer = $conn->real_escape_string($data['Writer']);
        $actors = $conn->real_escape_string($data['Actors']);
        $plot = $conn->real_escape_string($data['Plot']);
        $language = $conn->real_escape_string($data['Language']);
        $country = $conn->real_escape_string($data['Country']);
        $awards = $conn->real_escape_string($data['Awards']);
        $poster = $conn->real_escape_string($data['Poster']);
        $metascore = $conn->real_escape_string($data['Metascore']);
        $imdbRating = $conn->real_escape_string($data['imdbRating']);
        $imdbVotes = $conn->real_escape_string($data['imdbVotes']);
        $type = $conn->real_escape_string($data['Type']);
        $dvd = $conn->real_escape_string($data['DVD']);
        $boxOffice = $conn->real_escape_string($data['BoxOffice']);
        $production = $conn->real_escape_string($data['Production']);
        $website = $conn->real_escape_string($data['Website']);

        // Verificar si la película ya existe antes de guardarla
        $result = $conn->query("SELECT * FROM peliculas WHERE imdbID = '$imdbID'");
        if ($result->num_rows > 0) {
            echo 'La película ya está registrada.';
        } else {
            // Insertar en la base de datos
            $sql = "INSERT INTO peliculas (Title, `Year`, Rated, Released, Runtime, Genre, Director, Writer, Actors, Plot,`Language`,
             Country, Awards, Poster, Metascore, imdbRating, imdbVotes, imdbID, `Type`, DVD, BoxOffice, Production, Website)
                    VALUES ('$title', '$year', '$rated', '$released', '$runtime', '$genre', '$director', '$writer', '$actors',
                    '$plot', '$language', '$country', '$awards', '$poster', '$metascore', '$imdbRating', '$imdbVotes', '$imdbID',
                    '$type', '$dvd', '$boxOffice', '$production', '$website')";

            if ($conn->query($sql) === TRUE) {
                echo "Película guardada correctamente.";
            } else {
                echo "Error al guardar la película: " . $conn->error;
            }
        }
    } else {
        echo 'No se proporcionaron datos.';
    }
} else {
    echo 'Método no permitido.';
}

$conn->close();
?>
