<?php


namespace RetailOne\Http\Controllers\Backend;

use RetailOne\Client;
use RetailOne\Http\Controllers\Controller;
use yajra\Datatables\Datatables;

class ClientController extends Controller {
    public function index(Datatables $datatables) {
        $columns = ['id', 'name', 'created_at'];

        if ($datatables->getRequest()->ajax()) {
            return $datatables->of(Client::select($columns))->make(true);
        }

        $html = $datatables->getHtmlBuilder()->columns($columns);

        return view('backend.admin.clients.index', compact('html'));
    }
}
