# WebMovies
List of movies using API Omdb, Javascript, Html, Css, php and Mysql

# Description
You will need an API key from Omdb API to use the app. You can get one by signing up on their website:
https://www.omdbapi.com/apikey.aspx

Once you have the API key, you will be prompted to enter it when the app loads.

This is a codebase for a movie application that displays List of movies, and allows users Insert new movies on form, export files like Json and Excel and search movies with a view of details about them to add new ones. The application is built using Php, HTML, CSS, JavaScript and Mysql.

# Files
- index.html: The main HTML file that defines the structure of the application
- css/estilos.css: The CSS file that defines the styling of the application.
- guardar_busqueda.php, guardar_todas_peliculas.php, guardarinformacionformulario.php, obtener_películas.php: Contains the necessary logic for the operation of the application. It is responsible for save all the new movies, as well as making calls to The Omdb API to obtain information about the movies. It also contains the necessary logic for functionality.
- Api and Js folder: Have the logic to connect the web with the Api and doing the site work correctly
- agregar_peliculas.php, buscar_peliculas.php, exportar_excel.php, exportar_json.php: this files are contain a sections of the site to addition, search and export Excel and Json.

# How to use
1. Clone the repository or download the files.
2. Open the index.html file in your browser using Xampp for example wiht based on php.
3. You will need an API key from The Omdb API to use the Web site. You can get one by signing up on their website: https://www.omdbapi.com/apikey.aspx
4. Once you have the API key, you will be prompted to enter it when the web site loads.
5. Use the sections to view the corresponding pages.
6. Click on agregar peliculas to add new one
7. Click on Buscar pelicula to search a list of movies from the api and save
8. Click on Exportar Peliculas to dowload all movies you have on Data base
9. Click on Exportar Json to dowload a Json File.

# Functionality
Submenu tag: This function is used to handle navigation between different pages in the application. It is triggered on DOMContentLoaded and hashchange events.
agregar_peliculas.php, buscar_peliculas.php, exportar_excel.php, exportar_json.php functions: These functions are used to handle the display of different pages in the application. They are called by the
peliculas.php functions: These functions are used to handle the storage and retrieval of data from the browser's local storage.

# Limitations

- The application is a Web site and may contain bugs or errors that have not yet been identified.
  
- The application may have a limited scalability, it is not intended for high-traffic users because it isn't tested on this way.

- The code of the application may not be optimized for the production environment.

- The application may not have the security features that are needed for the final version.

- The application may haven't efficent to work in production deploy

# Future Improvements

- Add pagination to the search and main list of movies pages.
- Optimize the Website for other devices like phone, tablet.
- Add a way to filter the search results by different criteria.
- Add a way to add a buttom for favorites movies and a trend too.
- Add a framework like Laravel for have a organize and structure code.
- Add more features about securty.
