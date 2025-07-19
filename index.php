

<?php

require_once 'database/database.php';
$pageTitle = "page d'accueil du blog";

// debut de tampon de la page de sortie
ob_start();

// recuperer la view de la page d'accueil
require_once 'resources/views/blog/index_html.php';

// Recuperer le contenu du tampon de la page d'accueil
$pageContent = ob_get_clean();

require_once 'resources/views/layouts/blog-layout/blog-layout_html.php';

?>