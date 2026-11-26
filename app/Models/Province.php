<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Province extends Model
{
    public $incrementing = false;

    protected $keyType = 'string';

    public function cities(): HasMany
    {
        return $this->hasMany(City::class);
    }

    public function districts(): HasMany
    {
        return $this->hasMany(District::class);
    }

    public function subdistricts(): HasMany
    {
        return $this->hasMany(Subdistrict::class);
    }
}
