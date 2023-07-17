<?php

require 'vendor/autoload.php';

$loader = new Twig\Loader\FilesystemLoader(dirname(__FILE__));
$twig = new Twig\Environment($loader, [
    'cache' => dirname(__FILE__) . '/cache',
    'debug' => str_contains($_SERVER['HTTP_HOST'], 'localhost'),
]);
$template = $twig->load('privacy-openscale2healthconnect.html.twig');

print $template->render();
