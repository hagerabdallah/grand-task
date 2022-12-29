<?php

namespace App\Http\Controllers\User_API;
use App\Traits\GeneralTrait;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use GeneralTrait;
    public function index(){
        $users=User::orderBy('id','desc')->with('advertismentsUser')->get();
        return $this->returnDate('users', $users, "data send successfully!");

    }

}
