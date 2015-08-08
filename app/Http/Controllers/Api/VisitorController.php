<?php


namespace RetailOne\Http\Controllers\Api;


use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use RetailOne\Device;
use RetailOne\Http\Controllers\Controller;
use RetailOne\Repositories\VisitorRepository;
use RetailOne\Visitor;

class VisitorController extends Controller {
    public function record(Request $request)
    {
        $this->validate($request, [
            'uuid' => 'required|exists:devices'
        ]);

        $date = Carbon::create();

        DB::table((new Visitor())->getTable())->lockForUpdate()->insert([
            'device_id'  => Device::where('uuid', $request->get('uuid'))->first()->id,
            'type'       => $request->get('type') ? 'in' : 'out',
            'created_at' => $date,
            'updated_at' => $date
        ]);

        return $this->response()->created();
    }

    public function query(Request $request)
    {
        $this->validate($request, [
            'period'    => 'required|in:day,week,month,year,range',
            'device_id' => 'required',
            'from'      => 'required',
        ]);

        $from = $request->get('from');

        $dateparsed_from = Carbon::parse($from);
        $dateparsed_from_original = null;

        $data = DB::table((new Visitor())->getTable());

        $period = $request->get('period');

        switch ($period) {
            case 'day':
                $dateparsed_from_original = $dateparsed_from->copy();
                $data =
                    $data->whereBetween('created_at', [$dateparsed_from->startOfDay()->toDateTimeString(), $dateparsed_from->endOfDay()->toDateTimeString()]);
                break;
            case 'week':
                $dateparsed_from_original = $dateparsed_from->copy();
                $data = $data->whereBetween('created_at',
                    [$dateparsed_from->startOfDay()->toDateTimeString(), $dateparsed_from->addWeek()->endOfDay()->toDateTimeString()]);
                break;
            case 'month':
                $dateparsed_from_original = $dateparsed_from->copy();
                $data = $data->whereBetween('created_at',
                    [$dateparsed_from->startOfDay()->toDateTimeString(), $dateparsed_from->addMonth()->endOfDay()->toDateTimeString()]);
                break;
            case 'year':
                $dateparsed_from_original = $dateparsed_from->copy();
                $data = $data->whereBetween('created_at',
                    [$dateparsed_from->startOfDay()->toDateTimeString(), $dateparsed_from->addYear()->endOfDay()->toDateTimeString()]);
                break;
            case 'range':
                $to = $request->get('to');

                $dateparsed_to = Carbon::parse($to);

                $data = $data->whereBetween('created_at', [$dateparsed_from->startOfDay()->toDateTimeString(), $dateparsed_to->endOfDay()->toDateTimeString()]);
                break;
        }

        return (new VisitorRepository($data))->periodical($period, $dateparsed_from_original);
    }
}
