<?php
Event::listen('twigbridge.twig', function($twig) {
    if (Auth::check()) {
        $twig->addGlobal('me', Auth::user());
    }
    $csrf = csrf_token();
    $twig->addGlobal('csrf_token', $csrf);
    $twig->addGlobal('csrf', '<input type="hidden" name="_token" value="'.$csrf.'" />');
});

Event::listen('User.*', function($obj) {
    if (Event::firing() === 'User.PasswordChange') {
        Webhook::ExecuteAll(Event::firing(), ['username' => $obj['user']->username, 'password' => $obj['password']]);
    } else if (Event::firing() === 'User.Delete') {
        Webhook::ExecuteAll(Event::firing(), ['username' => $obj['username']]);
    } else if (Event::firing() === 'User.Rename') {
        Webhook::ExecuteAll(Event::firing(), ['old_username' => $obj['old_username'], 'new_username' => $obj['new_username']]);
    } else {
        Webhook::ExecuteAll(Event::firing(), ['username' => $obj['user']->username]);
    }
});