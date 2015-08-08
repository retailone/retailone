<?php


namespace RetailOne\Http\Controllers\Backend;


use RetailOne\Http\Controllers\Controller;

class AdminController extends Controller {
    public function index() {
        return view('backend.admin.dashboard');
    }
}
