<?php


namespace RetailOne\Http\Controllers\Backend;


use RetailOne\Device;
use RetailOne\Http\Controllers\Controller;
use RetailOne\Store;
use RetailOne\Visitor;
use yajra\Datatables\Datatables;

class StoreController extends Controller {
    public function index(Datatables $datatables)
    {
        $columns = ['id', 'name', 'created_at'];

        if ($datatables->getRequest()->ajax()) {
            return $datatables->of(Store::select($columns))->addColumn('action', function ($row) {
                return '<a href="' . route('admin::stores.show', $row->id) .
                       '" class="btn blue btn-xs"><i class="fa fa-edit"></i> View</span>';
            })->make(true);
        }

        $columns[] = 'action';

        $html = $datatables->getHtmlBuilder()->columns($columns);

        return view('backend.admin.stores.index', compact('html'));
    }

    public function show(Datatables $datatables, $id)
    {
        $store  = Store::findOrFail($id);
        $device = Device::findOrFail($id);

        if ($datatables->getRequest()->ajax()) {
            return $datatables->of(Visitor::select(['type', 'device_id', 'created_at'])
                ->where('device_id', $device->id)->orderBy('created_at', 'desc'))
                ->make(true);
        }

        $html = $datatables->getHtmlBuilder()->columns(['type', 'created_at']);

        return view('backend.admin.stores.show', compact('device', 'store', 'html'));
    }
}
