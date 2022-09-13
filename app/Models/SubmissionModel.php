<?php

namespace App\Models;
use CodeIgniter\Model;

class SubmissionModel extends Model{
    protected $table='submissions';
    protected $primaryKey='SubmissionId';
    protected $allowedFields=['SubmissionId','AssignmentId','UnitId','TraineeId','TraineeName','FileName','Marked','Marks','Time'];

    protected $db, $builder;
    public function __construct(){
        $this->db=\Config\Database::connect();
        $this->builder=$this->db->table($this->table);
    }

    public function addSubmission($data){
        $this->builder->insert($data);
    }

    public function getAllSubmissions(){
        return $this->builder->get()->getResultArray();
    }

    public function getSubmissionsWhere($conditions){
        return $this->builder->where($conditions)->get()->getResultArray();
    }

    public function getSubmissionsOrWhere($conditions1, $conditions2){
        return $this->builder->where($conditions1)->orWhere($conditions2)->get()->getResultArray();
    }

    public function getSubmissionsWhereIn($field, $array){
        return $this->builder->whereIn($field, $array)->get()->getResultArray();
    }

    public function updateSubmission($conditions, $data){
        return $this->builder->where($conditions)->update($data);
    }
}

?>