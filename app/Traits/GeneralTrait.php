<?php
namespace App\Traits;


trait GeneralTrait
{
    
    public function returnError($message,$code){
        return response()->json([
           'status' => false,
           'message' => $message
        ],$code);
    }

    public function returnSuccessMessage($message = ""){
        return response()->json(['status' => true, 'message' => $message],200);
    }

    public function returnDate($key, $value, $message){
        return response()->json([
           'status' => true,
           'message' => $message,
            $key => $value
        ],200);
    }
    


}
