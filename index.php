<?php

require 'vendor/autoload.php';

if (!setlocale(LC_ALL, 'de_DE.UTF-8')) {
    if (!setlocale(LC_ALL, 'de_DE')) {
        error_log("Cannot set language");
    }
}

$loader = new Twig\Loader\FilesystemLoader(dirname(__FILE__));
$twig = new Twig\Environment($loader, [
    'cache' => dirname(__FILE__) . '/cache',
    'debug' => str_contains($_SERVER['HTTP_HOST'], 'localhost'),
]);

$template = $twig->load('index.html.twig');

$resume = json_decode(file_get_contents(dirname(__FILE__) . '/resume.json'));

print $template->render([
    'resume' => $resume,
]);
