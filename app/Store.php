<?php


namespace RetailOne;

use Illuminate\Database\Eloquent\Model;

class Store extends Model {
    public function devices()
    {
        return $this->hasMany(Device::class);
    }
}
