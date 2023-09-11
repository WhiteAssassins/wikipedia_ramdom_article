<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artículo Aleatorio de Wikipedia</title>
    <!-- Agrega los enlaces a los estilos de Tailwind CSS y tu archivo CSS personalizado aquí -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link href="main.css" rel="stylesheet">
</head>
<body>
    <div class="min-h-screen flex items-center justify-center">
        <div class="card">
            <h1 class="text-2xl font-bold mb-4">Artículo Aleatorio de Wikipedia</h1>
            <div id="random-article-content">
                <p><strong>Título:</strong> <span id="article-title">Cargando...</span></p>
                <!-- Agregar un enlace al artículo completo -->
                <p><strong>Enlace al artículo completo:</strong> <a id="article-link" href="#" target="_blank">Ir al artículo</a></p>
            </div>
            <div id="article-content" class="mt-4"></div>
            <button class="mt-4 bg-blue-500 text-white py-2 px-4 rounded-md cursor-pointer" onclick="cargarArticuloAleatorio()">Cargar Artículo Aleatorio</button>
            <div id="loader" class="hidden mt-4">
                <div class="loader"></div>
            </div>
        </div>
    </div>

    <script src="main.js"></script>
</body>
</html>
