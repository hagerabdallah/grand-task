<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvertismentType extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function advertisments()
    {
        return $this->hasMany(Advertisment::class);
    }
    
}
