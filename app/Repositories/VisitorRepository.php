<?php


namespace RetailOne\Repositories;


use Carbon\Carbon;
use DB;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;

class VisitorRepository {
    public function __construct(Builder $data)
    {
        $this->data = $data;
    }

    public function periodical($period, Carbon $from, Carbon $to = null)
    {
        switch ($period) {

            case 'week':
                $y_axis = DB::raw("DAY(created_at) as $period");
                break;
            case 'month':
                $y_axis = DB::raw("DAY(created_at) as $period");
                break;
            case 'year':
                $y_axis = DB::raw("MONTH(created_at) as $period");
                break;
            case 'day':
            default:
                $y_axis = DB::raw("HOUR(created_at) as $period");
                break;
        }

        $prd = $this->data->select([
            DB::raw('count(id) as `count`'),
            $y_axis,
            'type'
        ])->groupBy($period)->groupBy('type')->get();

        $colle = new Collection($prd);

        $transform = new Collection();

        switch ($period) {
            case 'week':
                for ($i = 0; $i < 7; $i++) {
                    $ayy       = new \stdClass();
                    $ayy->name = $from->format('D');

                    $day = $from->format('j');

                    $ayy->{$period} = $day;

                    $from = $from->addDay();

                    $ayy->count_in  = $colle->sum(function ($x) use ($day, $period) {
                        return ($x->{$period} == $day and $x->type == 'in') ? $x->count : 0;
                    });
                    $ayy->count_out = $colle->sum(function ($x) use ($day, $period) {
                        return ($x->{$period} == $day and $x->type == 'out') ? $x->count : 0;
                    });

                    $transform->push($ayy);
                }

                $transform = $transform->sortBy($period);
                break;
            case 'month':
                for ($i = 1; $i <= $from->daysInMonth; $i++) {
                    $ayy       = new \stdClass();
                    $ayy->name = $from->format('M-j');

                    $day = $from->format('j');

                    $ayy->{$period} = $day;

                    $from = $from->addDay();

                    $ayy->count_in  = $colle->sum(function ($x) use ($day, $period) {
                        return ($x->{$period} == $day and $x->type == 'in') ? $x->count : 0;
                    });
                    $ayy->count_out = $colle->sum(function ($x) use ($day, $period) {
                        return ($x->{$period} == $day and $x->type == 'out') ? $x->count : 0;
                    });

                    $transform->push($ayy);
                }

                break;
            case 'day':
            default:
                for ($i = 0; $i <= 23; $i++) {
                    $ayy            = new \stdClass();
                    $ayy->{$period} = $i;
                    $ayy->name      = $i . ':00';

                    $ayy->count_in  = $colle->sum(function ($x) use ($i, $period) {
                        return ($x->{$period} == $i and $x->type == 'in') ? $x->count : 0;
                    });
                    $ayy->count_out = $colle->sum(function ($x) use ($i, $period) {
                        return ($x->{$period} == $i and $x->type == 'out') ? $x->count : 0;
                    });

                    $transform->push($ayy);
                }

                $transform = $transform->sortBy($period);
                break;
        }

        return $transform;
    }
}
