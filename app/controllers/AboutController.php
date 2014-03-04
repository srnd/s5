<?php

class AboutController extends BaseController {
    public function getAccounts()
    {
        return View::make('about/accounts');
    }

}