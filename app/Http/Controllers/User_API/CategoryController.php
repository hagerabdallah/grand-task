<?php

namespace App\Http\Controllers\User_API;

use App\Models\Category;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\categoryRequest;

class CategoryController extends Controller
{
    use GeneralTrait;
    public function index(){
        $category=Category::orderBy('id','desc')->get();
        return $this->returnDate('category', $category, "data send successfully!");

    }
    public function store(categoryRequest $request){
        Category::create([
            'name'=>$request->name
        ]);
        return $this->returnSuccessMessage("category created successfully!");

    }
    public function edit(categoryRequest $request){
        $category=Category::find(request('id'));
        return $this->returnDate('category', $category, "data send successfully!");
    }
    public function update(categoryRequest $request){
        $category=Category::find(request('id'));
        $category->name=$request->name;
        $category->save();
        return $this->returnSuccessMessage("category updated successfully!");

    }
    public function delete(categoryRequest $request){
        $category=Category::find(request('id'));
        $category->delete();
        return $this->returnSuccessMessage("category deleted successfully!");
    }
}
