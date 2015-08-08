<?php

namespace RetailOne;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model {
    public function device()
    {
        return $this->belongsTo(Device::class);
    }
}
