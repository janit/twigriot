<?php

$loader = new Twig_Loader_Filesystem(__DIR__ . '/../views');
$twig = new Twig_Environment($loader, array(
//    'cache' => __DIR__ . '/../cache',
));

$twig->addExtension(new Janit\Twig\RiotRendererExtension());

$coords = array('61.129696','21.512523');

echo $twig->render('index.html.twig', array('coords' => $coords));