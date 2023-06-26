<?php

namespace App\Controllers;

use App\Models\EmployeeModel;
use App\Models\AccessLevelModel;

class Auth extends BaseController
{
    protected $helpers = ['auth'];
    public function index()
    {
        return view('header').view('auth').view('footer');
    }

    public function authenticate()
    {

        $data = $this->request->getPost();
        $model = new EmployeeModel();
        $user = $model->authenticate($data);

        if($user && password_verify($data['password'], $user->password) ){
            login($user);
            echo json_encode(["msg"=> "ok", "status" => "200"]);
        }else{
            echo json_encode(["msg"=> "error", "status" => "404"]);
        }


        
        
    }
}
