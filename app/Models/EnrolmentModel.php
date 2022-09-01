<?php

namespace App\Models;
use CodeIgniter\Model;

class EnrolmentModel extends Model{
    protected $table='enrolments';
    protected $primaryKey='EnrolmentId';
    protected $allowedFields=['EnrolmentId','CourseId','TraineeId','Time'];

    protected $db, $builder;
    public function __construct(){
        $this->db=\Config\Database::connect();
        $this->builder=$this->db->table($this->table);
    }

    public function getColumnWhere($column, $conditions){
        return $this->builder->where($conditions)->select($column)->get()->getResultArray();
    }

    public function addEnrolment($data){
        $this->builder->insert($data);
    }

    public function getAllEnrolments(){
        return $this->builder->get()->getResultArray();
    }

    public function getEnrolmentsWhere($conditions){
        return $this->builder->where($conditions)->get()->getResultArray();
    }
    
}

?>