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
        helper('uri');
        $employee = new EmployeeModel();
        $id = service('uri')->getSegment(2);

        if(!isset($id)){

            $body = json_decode($this->request->getBody());

            $employee->insert($body);
        }else{
  
            $body = json_decode($this->request->getBody());

            $employee->update($id,$body);
        }


        return $this->respond(["msg"=>"success"], 200);
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
}
