<?php
// Función para obtener el contenido de un artículo aleatorio de Wikipedia en el idioma del usuario
function obtenerContenidoArticuloAleatorio() {
    // Obtener el idioma del navegador del usuario
    $userLanguage = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

    // Construir la URL de la API de Wikipedia en el idioma del usuario
    $url = "https://$userLanguage.wikipedia.org/w/api.php?action=query&list=random&rnnamespace=0&format=json";
    $json = file_get_contents($url);
    $data = json_decode($json, true);
    $randomTitle = $data['query']['random'][0]['title'];

    // Obtener el contenido del artículo usando la API de Wikipedia
    $articleUrl = "https://$userLanguage.wikipedia.org/w/api.php?action=parse&page=" . urlencode($randomTitle) . "&format=json";
    $articleJson = file_get_contents($articleUrl);
    $articleData = json_decode($articleJson, true);

    if (isset($articleData['parse']['text']['*'])) {
        // Devolver el título y el contenido del artículo en formato JSON válido
        $response = [
            'title' => $randomTitle,
            'content' => $articleData['parse']['text']['*']
        ];
        return json_encode($response);
    } else {
        return json_encode(['error' => 'Error al cargar el artículo aleatorio.']);
    }
}

// Mostrar el contenido del artículo aleatorio
echo obtenerContenidoArticuloAleatorio();
?>
