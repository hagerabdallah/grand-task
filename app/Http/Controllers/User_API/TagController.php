<?php

namespace App\Http\Controllers\User_API;

use App\Models\Tag;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use App\Http\Requests\TagRequest;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    use GeneralTrait;
    public function index(){
        $tags=Tag::orderBy('id','desc')->get();
        return $this->returnDate('tags', $tags, "data send successfully!");

    }
    public function store(TagRequest $request){
        Tag::create([
            'name'=>$request->name
        ]);
        return $this->returnSuccessMessage("tag created successfully!");

    }
    public function edit(TagRequest $request){
        $tag=Tag::find(request('id'));
        return $this->returnDate('tag', $tag, "data send successfully!");
    }
    public function update(TagRequest $request){
        $tag=Tag::find(request('id'));
        $tag->name=$request->name;
        $tag->save();
        return $this->returnSuccessMessage("tag  updated successfully!");
    }
    public function delete(TagRequest $request){
        $tag=Tag::find(request('id'));
        $tag->delete();
        return $this->returnSuccessMessage("tag  deleted successfully!");
    }
}
