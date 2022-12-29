<?php

namespace App\Http\Controllers\User_API;

use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use App\Models\AdvertismentType;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdvertismentTypeRequest;

class AdvertismentTypeController extends Controller
{
    use GeneralTrait;
    public function index(){
        $advertisment_type=AdvertismentType::orderBy('id','desc')->get();
        return $this->returnDate('advertisment_type', $advertisment_type, "data send successfully!");

    }
    public function store(AdvertismentTypeRequest $request){
        AdvertismentType::create([
            'name'=>$request->name
        ]);
        return $this->returnSuccessMessage("advertisment type created successfully!");

    }
    public function edit(AdvertismentTypeRequest $request){
        $advertisment_type=AdvertismentType::find(request('id'));
        return $this->returnDate('advertisment_type', $advertisment_type, "data send successfully!");
    }
    public function update(AdvertismentTypeRequest $request){
        $advertisment_type=AdvertismentType::find(request('id'));
        $advertisment_type->name=$request->name;
        $advertisment_type->save();
        return $this->returnSuccessMessage("advertisment type updated successfully!");

    }
    public function delete(AdvertismentTypeRequest $request){
        $advertisment_type=AdvertismentType::find(request('id'));
        $advertisment_type->delete();
        return $this->returnSuccessMessage("advertisment type deleted successfully!");
    }
}
