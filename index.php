<?php

require 'vendor/autoload.php';

$loader = new Twig\Loader\FilesystemLoader(dirname(__FILE__));
$twig = new Twig\Environment($loader, [
    'cache' => dirname(__FILE__) . '/cache',
    'debug' => str_contains($_SERVER['HTTP_HOST'], 'localhost'),
]);

$mDateFilter = new Twig\TwigFilter('mdate', function ($input) {
   $time = strtotime($input);

   $months = [
       'Jan',
       'Feb',
       'Mär',
       'Apr',
       'Mai',
       'Jun',
       'Jul',
       'Aug',
       'Sep',
       'Okt',
       'Nov',
       'Dez',
   ];

    $monthIndex = intval(date('n', $time)) - 1;

    return $months[$monthIndex] . ' ' . date('Y', $time);
});

$twig->addFilter($mDateFilter);

$template = $twig->load('index.html.twig');

$resume = json_decode(file_get_contents(dirname(__FILE__) . '/resume.json'));

print $template->render([
    'resume' => $resume,
]);
