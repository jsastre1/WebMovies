<?php
$servername = "localhost"; // Cambia esto si tu servidor tiene un nombre diferente
$username = "root"; // Tu nombre de usuario de la base de datos
$password = ""; // Tu contraseña de la base de datos
$dbname = "peliculas"; // Nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario

    $title = $_POST['Title'];
    $year = $_POST['Year'];
    $rated = $_POST['Rated'];
    $released = $_POST['Released'];
    $runtime = $_POST['Runtime'];
    $genre = $_POST['Genre'];
    $director = $_POST['Director'];
    $writer = $_POST['Writer'];
    $actors = $_POST['Actors'];
    $plot = $_POST['Plot'];
    $language = $_POST['Language'];
    $country = $_POST['Country'];
    $awards = $_POST['Awards'];
    $poster = $_POST['Poster'];
    $ratings = $_POST['Ratings']; // Asegúrate de que este campo esté definido en tu formulario
    $metascore = $_POST['Metascore'];
    $imdbRating = $_POST['imdbRating'];
    $imdbVotes = $_POST['imdbVotes'];
    $imdbID = $_POST['imdbID'];
    $type = $_POST['Type'];
    $dvd = $_POST['DVD'];
    $boxOffice = $_POST['BoxOffice'];
    $production = $_POST['Production'];
    $website = $_POST['Website'];

    // Verificar si la película ya existe en la base de datos
    $query = "SELECT * FROM peliculas WHERE imdbID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $imdbID); // Usa el imdbID como identificador único
    $stmt->execute();
    $result = $stmt->get_result();

if ($result->num_rows > 0) {
    // La película ya existe
    echo "Error: La película ya está registrada.";
} else {

// Asegurarte que $data['Title'] está presente.
if (empty($title)) {
    throw new Exception("El título no puede estar vacío.");
}
// Preparar y ejecutar la consulta
$sql = "INSERT INTO peliculas (Title, `Year`, Rated, Released, Runtime, Genre,
    Director, Writer, Actors, Plot, `Language`, Country, Awards, Poster, Ratings, Metascore,
    imdbRating, imdbVotes, imdbID, `Type`, DVD, BoxOffice, Production, Website) VALUES 
    (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssssssssssssssssssss", 
    $title, $year, $rated, $released, $runtime, 
    $genre, $director, $writer, $actors, $plot, 
    $language, $country, $awards, $poster, $ratings, 
    $metascore, $imdbRating, $imdbVotes, $imdbID, 
    $type, $dvd, $boxOffice, $production, $website
);

    if ($stmt->execute()) {
        echo "Datos guardados con éxito.";

    } else {
        echo "Error al guardar los datos: " . $stmt->error;
    }
}
$stmt->close();
$conn->close();
?>
