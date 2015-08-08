<?php


namespace RetailOne\Http\Controllers\Api;


use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use RetailOne\Device;
use RetailOne\Http\Controllers\Controller;
use RetailOne\Visitor;

class VisitorController extends Controller {
    public function record(Request $request)
    {
        $this->validate($request, [
            'uuid' => 'required|exists:devices'
        ]);

        $date = Carbon::create();

        DB::table((new Visitor())->getTable())->lockForUpdate()->insert([
            'device_id' => Device::where('uuid', $request->get('uuid'))->first()->id,
            'type'      => $request->get('type') ? 'in' : 'out',
            'created_at' => $date,
            'updated_at' => $date
        ]);

        return $this->response()->created();
    }
}
