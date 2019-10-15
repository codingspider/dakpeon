<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Branch extends Model {

    protected $table = "branches";
    // table fields
    protected $guarded = [];

    public function users() {
        return $this->hasMany(User::class);
    }

    public function currier_infos() {
        return $this->hasMany(CurrierInfo::class);
    }

}
