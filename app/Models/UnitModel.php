<?php

namespace App\Models;
use CodeIgniter\Model;

class UnitModel extends Model{
    protected $table='units';
    protected $primaryKey='UnitId';
    protected $allowedFields=['UnitId','CourseId','TrainerId','UnitName','Description','Duration','Time'];

    protected $db, $builder;
    public function __construct(){
        $this->db=\Config\Database::connect();
        $this->builder=$this->db->table($this->table);
    }

    public function addUnit($data){
        $this->builder->insert($data);
    }

    public function getAllUnits(){
        return $this->builder->get()->getResultArray();
    }

    public function getUnitsWhere($conditions){
        return $this->builder->where($conditions)->get()->getResultArray();
    }

    public function getUnitsOrWhere($conditions1, $conditions2){
        return $this->builder->where($conditions1)->orWhere($conditions2)->get()->getResultArray();
    }

    public function updateUnit($conditions, $data){
        return $this->builder->where($conditions)->update($data);
    }
}

?>