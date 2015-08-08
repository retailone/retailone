<?php


namespace RetailOne;

use Illuminate\Database\Eloquent\Model;


class Device extends Model {
    public function store() {
        return $this->belongsTo(Store::class);
    }

    public function type() {
        return $this->belongsTo(DeviceType::class);
    }
}
