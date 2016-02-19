<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/CountRepeats.php";

    $app = new Silex\Application();
    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'));

    $app->get("/", function() use ($app) {
        return $app['twig']->render('index.html.twig', array(
            'form' => true,
            'navbar' => true
        ));
    });

    $app->get("/count", function() use ($app) {
        $my_CountRepeats = new CountRepeats;
        $my_count = $my_CountRepeats->count($_GET['phrase'], $_GET['word']);
        if($my_count == 0) {
            $message_text = $_GET['word'] . " does not appear in the phrase: " . $_GET['phrase'];
        } elseif($my_count == 1) {
            $message_text = "The word " . $_GET['word'] . " appears 1 time.";
        } else {
            $message_text = "The word " . $_GET['word'] . " appears " . $my_count . " times.";
        }
        return $app['twig']->render('count.html.twig', array(
            'form' => true,
            'navbar' => true,
            'message' => array(
                'text' => $message_text,
                'type' => 'info'
            )
        ));
    });

    return $app;
 ?>
