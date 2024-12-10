<?php 

try {
    header('Content-Type: application/json'); // Asegurar respuesta JSON

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        http_response_code(405);
        echo json_encode(['error' => 'Método no permitido']);
        exit();
    }

    $data = json_decode(file_get_contents('php://input'), true);
    if (!$data) {
        http_response_code(400);
        echo json_encode(['error' => 'Datos JSON inválidos']);
        exit();
    }

    $host = 'localhost'; 
    $db = 'peliculas';
    $user = 'root';
    $pass = '';

    $conn = new mysqli($host, $user, $pass, $db);
    if ($conn->connect_error) {
        throw new Exception("Conexión fallida: " . $conn->connect_error);
    }

    // Asegurarte que $data['Title'] está presente.
    if (empty($data['Title'])) {
        throw new Exception("El título no puede estar vacío.");
    }

    $ratings = isset($data['Ratings']) ? json_encode($data['Ratings']) : null;
    $stmt = $conn->prepare("INSERT INTO peliculas (Title, `Year`, Rated, Released, Runtime, Genre,
    Director, Writer, Actors, Plot, `Language`, Country, Awards, Poster, Ratings, Metascore,
    imdbRating, imdbVotes, imdbID, `Type`, DVD, BoxOffice, Production, Website) VALUES 
    (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    if (!$stmt) {
        throw new Exception('Error al preparar la consulta: ' . $conn->error);
    }

    $stmt->bind_param("ssssssssssssssssssssssss", 
        $data['Title'], $data['Year'], $data['Rated'], $data['Released'], $data['Runtime'], 
        $data['Genre'], $data['Director'], $data['Writer'], $data['Actors'], $data['Plot'], 
        $data['Language'], $data['Country'], $data['Awards'], $data['Poster'], $ratings, 
        $data['Metascore'], $data['imdbRating'], $data['imdbVotes'], $data['imdbID'], 
        $data['Type'], $data['DVD'], $data['BoxOffice'], $data['Production'], $data['Website']
    );

    if (!$stmt->execute()) {
        throw new Exception('Error al guardar la película: ' . $stmt->error);
    }

    echo json_encode(['message' => 'Película guardada
     correctamente', 'status' => 'success']);


    $stmt->close();
    $conn->close();
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}

?>

  