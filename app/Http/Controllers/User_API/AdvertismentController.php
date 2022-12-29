<?php

namespace App\Http\Controllers\User_API;

use App\Traits\GeneralTrait;
use App\Http\Requests\AdvertismentRequest;
use Illuminate\Http\Request;
use App\Models\{Advertisment
    ,category
    ,AdvertismentType
    ,Tag
};

use App\Http\Controllers\Controller;


class AdvertismentController extends Controller
{
    use GeneralTrait;
    public function index(){
        $advertisment=Advertisment::orderBy('id','desc')->with('user', 'category', 'tags')->get();
        return $this->returnDate('advertisment', $advertisment, "data send successfully!");

    }
    public function create(){
        $data=[
            'categories'=>category::orderBy('id','desc')->get(),
            'advertisment_types'=>AdvertismentType::orderBy('id','desc')->get(),
            'tags'=>Tag::orderBy('id','desc')->get()

        ];
        return $this->returnDate('data', $data, "data send successfully!");

    }
    public function store(AdvertismentRequest $request){
        
        $advertisment=Advertisment::create([
            'user_id'=>$request->user_id,
            'advertisment_type_id'=>$request->advertisment_type_id,
            'category_id'=>$request->category_id,
            'title'=>$request->title,
            'description'=>$request->description,
            'start_date'=>$request->start_date,
        ]);
        $advertisment->tags()->attach($request->tags);

        return $this->returnSuccessMessage("advertisment created successfully!");

    }
    public function edit(AdvertismentRequest $request){
        $advertisment=Advertisment::find(request('id'));
        return $this->returnDate('advertisment', $advertisment, "data send successfully!");
    }
    public function update(AdvertismentRequest $request){
        $advertisment=Advertisment::find(request('id'));
        $advertisment->advertisment_type_id=$request->advertisment_type_id;
        $advertisment->category_id=$request->category_id;
        $advertisment->title=$request->title;
        $advertisment->description=$request->description;
        $advertisment->start_date=$request->start_date;
        $advertisment->save();
        $advertisment->tags()->attach($request->tags);

        return $this->returnSuccessMessage("advertisment updated successfully!");

    }
    public function delete(AdvertismentRequest $request){
        $advertisment=Advertisment::find(request('id'));
        $advertisment->delete();
        return $this->returnSuccessMessage("advertisment deleted successfully!");
    }

    //filter by tag or category or both
    public function filter(){
        $query = Advertisment::query()->with('user','category','tags');
        $query->when(request('tag') != null , function ($q)  {

            return $q->whereHas('tags', function ($sub_query) {
                $sub_query->where('name', request('tag'));
            });

        });
        $query->when(request('category') != null , function ($q) {
            return $q->whereHas('category', function ($sub_query) {
                $sub_query->where('name',request('category') );
            });
            
        });
        $requests = $query->orderBy('id', 'desc')->get();
        return $this->returnDate('requests', $requests, "data sent Successfully!");

    }
    
}
