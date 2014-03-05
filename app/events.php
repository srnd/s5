<?php
Event::listen('twigbridge.twig', function($twig) {
    if (Auth::check()) {
        $twig->addGlobal('me', Auth::user());
    }
});

Event::listen('User.*', function($obj) {
    if (Event::firing() === 'User.PasswordChange') {
        Webhook::ExecuteAll(Event::firing(), ['username' => $obj['user']->username, 'password' => $obj['password']]);
    } else if (Event::firing() === 'User.Delete') {
        Webhook::ExecuteAll(Event::firing(), ['username' => $obj['username']]);
    } else {
        Webhook::ExecuteAll(Event::firing(), ['username' => $obj['user']->username]);
    }
});