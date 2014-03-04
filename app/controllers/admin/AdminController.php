<?php

class AdminController extends BaseController {
    public function getIndex()
    {
        return View::make('admin/index');
    }

    public function getApplications()
    {
        return View::make('admin/applications', ['apps' => Application::all()]);
    }
}