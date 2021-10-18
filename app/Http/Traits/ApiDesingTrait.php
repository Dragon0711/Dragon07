<?php
namespace App\Http\Traits;

Trait ApiDesingTrait{

        public function ApiResponse($code = 200,$message = null,$errors = null, $data = null){

        $array = [
            'status' => $code,
            'message' => $message,
            ];
        if ($errors == null && $data != null){
            $array['data'] = $data;
        }elseif ($data == null && $errors != null){
            $array['errors'] = $errors;
        }
        return response($array,200);
    }
}
