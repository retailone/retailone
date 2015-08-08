<?php

namespace RetailOne;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function stores() {
        return $this->hasMany(Store::class);
    }
}
