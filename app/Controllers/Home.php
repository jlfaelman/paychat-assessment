<?php

namespace App\Controllers;


use App\Models\EmployeeModel;
use App\Models\AccessLevelModel;


class Home extends BaseController
{
    public function index()
    {
        $data['employees'] = $this->loadEmployees();
        return view('header') . view('employees',$data) . view('footer');
    }


    public function form($id = null) 
    {
        if(isset($id)){
            $data['employee'] = $this->loadEmployees($id);
            $header['title'] = "Edit" ;
        }
        else{
            $header['title'] = "Add" ;
        } 

        $data['access_levels'] = $this->loadAccessLevels(null);

        
        return view('header', $header) . view('employee-form',$data) . view('footer');
    }

    public function delete()
    {

    }

    public function update($id = null)
    {

        $employee = new EmployeeModel();

        if(!isset($id)){

            $data = $this->request->getPost();

         
            $employee->insert($data);
        }else{
  
            $data = $this->request->getPost();

            $employee->update($id,$data);
        }

        echo json_encode(["msg" => "ok", "status" => "200"]);
       
    }

    protected function loadEmployees($id = null)
    {   
        if(!isset($id)){

            $employee = new EmployeeModel();

            return $employee->findAll();

        }else{

            $employee = new EmployeeModel();
            
            return $employee->find($id);
        }
    }

    protected function loadAccessLevels($id)
    {
        if(!isset($id)){

            $al = new AccessLevelModel();

            return $al->findAll();
            
        }else{
            $al = new AccessLevelModel();

            return $al->find($id);
        }
    }
    public function options($any)
    {
        return $this->response->setHeader('Access-Control-Allow-Origin', '*') //for allow any domain, insecure
            ->setHeader('Access-Control-Allow-Headers', '*') //for allow any headers, insecure
            ->setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, DELETE') //method allowed
            ->setStatusCode(200); //status code
    }
}
