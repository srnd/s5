<?php
Event::listen('twigbridge.twig', function($twig) {
    if (Auth::check()) {
        $twig->addGlobal('me', Auth::user());
    }
});