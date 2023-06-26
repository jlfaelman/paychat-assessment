<?php 


namespace App\Models;

use CodeIgniter\Model;

class EmployeeModel extends Model
{
    protected $table = 'employees';
    protected $primaryKey = 'id'; 
    protected $allowedFields = ['id', 'firstname', 'lastname', 'age', 'birth_date', 'email', 'password', 'date_created', 'job_title', 'access_level_id', 'date_modified']; 
}
