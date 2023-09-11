// Función para cargar el contenido del artículo aleatorio en el idioma del usuario
// Función para cargar el contenido del artículo aleatorio en el idioma del usuario
function cargarArticuloAleatorio() {
    // Mostrar el loader y ocultar el contenido y el botón
    document.getElementById('loader').classList.remove('hidden');
    document.getElementById('random-article-content').style.display = 'none';
    document.getElementById('article-content').style.display = 'none';

    fetch('artc.php')
        .then(response => response.text())
        .then(data => {
            // Ocultar el loader y mostrar el contenido y el botón
            document.getElementById('loader').classList.add('hidden');
            document.getElementById('random-article-content').style.display = 'block';
            document.getElementById('article-content').style.display = 'block';

            // Parsear el JSON para obtener el título, el contenido y el enlace
            const articleData = JSON.parse(data);
            const articleTitle = articleData.title;
            const articleContent = articleData.content;

            // Actualizar el título y el contenido
            document.getElementById('article-title').textContent = articleTitle;
            document.getElementById('article-content').innerHTML = articleContent;

            // Construir el enlace al artículo completo
            const articleLink = `https://${navigator.language.substr(0, 2)}.wikipedia.org/wiki/${encodeURIComponent(articleTitle)}`;
            document.getElementById('article-link').href = articleLink;
        })
        .catch(error => {
            console.error(error);
            document.getElementById('loader').classList.add('hidden');
            document.getElementById('random-article-content').style.display = 'block';
            document.getElementById('article-content').style.display = 'none';
            document.getElementById('article-title').textContent = 'Error al cargar el artículo aleatorio.';
        });
}

