<?php 


namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionIterface;

class EmployeeModel extends Model
{
    protected $table = 'employees';
    protected $primaryKey = 'id'; 
    protected $allowedFields = ['id', 'firstname', 'lastname', 'age', 'birth_date', 'email', 'password', 'date_created', 'job_title', 'access_level_id', 'date_modified']; 
    protected $db;

   


    public function authenticate ($data) {
        $db = db_connect();

        $builder = $this->db->table('employees');
        $builder->select("*");
        $builder->where("email",$data['email']);
        $query = $builder->get()->getResult();

        return $query[0];
    }
}
