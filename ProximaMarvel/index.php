<?php

const API_URL = "https://whenisthenextmcufilm.com/api";

# Inicializar una nueva sesion de Curl ch = Curl Handle
$ch = curl_init(API_URL);

// Indicar que queremos recibir la respuesta del servidor y no mostrarla en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Ejecutar la peticion y guardar el resultado
$result = curl_exec($ch);
$data = json_decode($result, true);

// Cerrar la sesion de Curl
curl_close($ch);

// $result = file_get_contents(API_URL); // Solo si se quiere hacer una peticion GET de una API

?>

<head>
    <meta charset="UTF-8"/>
    <title>Siguiente Pelicula de Marvel</title>
    <!-- Centered viewport -->
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
    >
</head>

<main >

    <section style="display: flex; justify-content: center;">
        <img src="<?= $data["poster_url"]; ?>" width="300" alt="Poster de <?= $data["title"] ?>" style="border-radius: 16px;"/>
    </section>

    <hgroup style="display: grid; place-content: center; text-align: center">
        <h2><?= $data["title"] ?> se estrena en <?= $data["days_until"]; ?> días</h2>
        <p>Fecha de Estreno: <?= $data["release_date"]; ?></p>
        <p>La siguiente Pelicula es: <?= $data["following_production"]["title"] ?></p>
    </hgroup>

</main>