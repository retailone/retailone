<?php


namespace RetailOne\Http\Controllers\Backend;


use RetailOne\Http\Controllers\Controller;

class StoreController extends Controller {
    public function index()
    {
        return view('backend.admin.stores.index');
    }
}
