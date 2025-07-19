
<?php

require_once 'database/database.php';
$pageTitle = 'page about';

// debut de tampon de la page de sortie
ob_start();

// recuperer la view de la page d'accueil
require_once 'ressources/views/blog/about_html.php';

// Recuperer le contenu du tampon de la page d'accueil
$pageContent = ob_get_clean();

require_once 'ressources/views/layouts/blog-layout/blog-layout_html.php';

?>


