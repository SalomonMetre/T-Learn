<?php

namespace App\Models;
use CodeIgniter\Model;

class AssignmentModel extends Model{
    protected $table='assignments';
    protected $primaryKey='AssignmentId';
    protected $allowedFields=['AssignmentId','UnitId','TrainerId','Description','FileName','StartTime','EndTime', 'Time'];

    protected $db, $builder;
    public function __construct(){
        $this->db=\Config\Database::connect();
        $this->builder=$this->db->table($this->table);
    }

    public function addAssignment($data){
        $this->builder->insert($data);
    }

    public function getAllAssignments(){
        return $this->builder->get()->getResultArray();
    }

    public function getAssignmentsWhere($conditions){
        return $this->builder->where($conditions)->get()->getResultArray();
    }

    public function getAssignmentsOrWhere($conditions1, $conditions2){
        return $this->builder->where($conditions1)->orWhere($conditions2)->get()->getResultArray();
    }

    public function getAssignmentsWhereIn($field, $array){
        return $this->builder->whereIn($field, $array)->get()->getResultArray();
    }

    public function updateAssignment($conditions, $data){
        return $this->builder->where($conditions)->update($data);
    }
}

?>