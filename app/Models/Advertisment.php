<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisment extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function advertismentType(){
        return $this->belongsTo(AdvertismentType::class,'advertisment_type_id');
    }
    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class,'advertisment_tag');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }


}
