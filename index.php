<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Películas</title>
    <link rel="stylesheet" href="css/estilos.css"><!-- Referencia al archivo CSS -->
    <script src="js/script.js"></script><!-- Enlace a un archivo JavaScript -->
</head>
<body>
    <?php
    // Configuración de la base de datos
    $servername = "Localhost";
    $username = "root";
    $password =  "";
    $dbname = "peliculas";
    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Verificar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }
    // Consulta para obtener todas las películas
    $sql = "SELECT Title, `Year`, Rated, Released, Runtime, Genre, Director, Writer, Actors, 
            Plot, `Language`, Country, Awards, Poster, imdbRating, imdbVotes, imdbID, 
            `Type`, DVD, BoxOffice, Production, Website FROM peliculas";
    $result = $conn->query($sql);
    ?>
    <style>

    /* Estilo general del cuerpo de la página */
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

    /* Estilo para el menú de navegación */
    nav {
        background-color: #040434; /* Fondo oscuro */
        margin: 0 18px; /* Margen izquierdo y derecho */
        padding: 15px 0; /* Espaciado vertical */
    }

    /* Estilo para la lista del menú */
    .menu {
        list-style: none; /* Sin viñetas */
        margin: 0 5px; /* Sin márgenes */
        padding: 0px;
        padding-right: 580px; /* Sin relleno */
        display: flex; /* Usar flexbox para distribución horizontal */
        font-size: 25px; /* Tamaño de fuente */
    }
    ul menu{
        padding:25px 0px;
    }
    /* Estilo para los elementos de la lista del menú */
    .menu > li {
        position: relative; /* Posicionamiento relativo para el submenú */
    }

    /* Estilo para los enlaces del menú */
    .menu > li > a {
        display: block; /* Mostrar como bloque */
        padding: 5px 20px; /* Espaciado interno */
        color: white; /* Color del texto */
        text-decoration: none; /* Sin subrayado */
        font-size: 30px; /* Tamaño de fuente */
    }

    /* Efecto hover para enlaces del menú y submenú */
    .menu > li > a:hover,
    .submenu li a:hover {
        background-color: gray; /* Fondo gray al pasar el mouse */
    }

    /* Estilo para el submenú */
    .submenu {
        display: none; /* Ocultar por defecto */
        position: absolute; /* Posicionar absolutamente */
        top: 100%; /* Justo debajo del menú principal */
        left: 10px; /* Alinear a la izquierda */
        background-color: #040434; /* Fondo oscuro */
        list-style: none; /* Sin viñetas */
        padding: 0; /* Sin relleno */
    }

    /* Estilo para los enlaces del submenú */
    .submenu li a {
        padding: 10px 30px; /* Espaciado interno */
        color: white; /* Color del texto */
        text-decoration: none; /* Sin subrayado */
        display: block; /* Mostrar como bloque */
    }

    /* Mostrar el submenú al pasar el mouse sobre el elemento del menú */
    .menu > li:hover .submenu {
        display: block; /* Mostrar el submenú */
    }

    /* Estilo para los elementos de la lista */
    li {
        flex: 1; /* Distribuir el espacio del menú */
        margin: 5px; /* Margen entre elementos */
    }
       
</style>     



 <!-- Menú -->
 <nav>
    <ul class="menu">
        <li>
            <a>Menú</a>
                <ul class="submenu">
                    <li><a href="agregar_peliculas.php">Agregar película</a></li>
                    <li><a href="exportar_excel.php">Exportar Excel</a></li>
                    <li><a href="exportar_json.php">Exportar Json</a></li>
                    <li><a href="buscar_peliculas.php">Buscar peliculas</a></li>
                </ul>
        </li>
        <h1>Lista de Películas</h1>
    </ul>
    
</nav> 
    <div class="container">
        <section class="grid-container">
            <?php
                // Aquí asumimos que $result contiene los datos obtenidos de la base de datos
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='movie-card'>";
                        echo "<img src='{$row['Poster']}' alt='Póster de {$row['Title']}' class='poster'>";
                        echo "<h2>{$row['Title']}</h2>";
                        echo "<p><strong>Año:</strong> {$row['Year']}</p>";
                        echo "<p><strong>Clasificación:</strong> {$row['Rated']}</p>";
                        echo "<p><strong>Fecha de Lanzamiento:</strong> {$row['Released']}</p>";
                        echo "<p><strong>Duración:</strong> {$row['Runtime']}</p>";
                        echo "<p><strong>Género:</strong> {$row['Genre']}</p>";
                        echo "<p><strong>Director:</strong> {$row['Director']}</p>";
                        echo "<p><strong>Escritor:</strong> {$row['Writer']}</p>";
                        echo "<p><strong>Actores:</strong> {$row['Actors']}</p>";
                        echo "<p><strong>Sinopsis:</strong> {$row['Plot']}</p>";
                        echo "<p><strong>Idioma:</strong> {$row['Language']}</p>";
                        echo "<p><strong>País:</strong> {$row['Country']}</p>";
                        echo "<p><strong>Premios:</strong> {$row['Awards']}</p>";
                        echo "<p><strong>Rating IMDb:</strong> {$row['imdbRating']}</p>";
                        echo "<p><strong>Votos IMDb:</strong> {$row['imdbVotes']}</p>";
                        echo "<p><strong>ID IMDb:</strong> {$row['imdbID']}</p>";
                        echo "<p><strong>Tipo:</strong> {$row['Type']}</p>";
                        echo "<p><strong>DVD:</strong> {$row['DVD']}</p>";
                        echo "<p><strong>Recaudación:</strong> {$row['BoxOffice']}</p>";
                        echo "<p><strong>Producción:</strong> {$row['Production']}</p>";
                        echo "<p><strong>Sitio Web:</strong> <a href='{$row['Website']}' target='_blank'>Visitar</a></p>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>No se encontraron películas.</p>";
                }
            ?>
        </section>
    </div>
    <footer>
        <p>© 2024 Jonathan Sastre - Página web de Películas</p>
    </footer>
</body> 
<!-- Pie de página -->
</html>