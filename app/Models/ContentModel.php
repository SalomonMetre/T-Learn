<?php

namespace App\Models;
use CodeIgniter\Model;

class ContentModel extends Model{
    protected $table='contents';
    protected $primaryKey='ContentId';
    protected $allowedFields=['ContentId','UnitId','TrainerId','Description','FileName','Time'];

    protected $db, $builder;
    public function __construct(){
        $this->db=\Config\Database::connect();
        $this->builder=$this->db->table($this->table);
    }

    public function addContent($data){
        $this->builder->insert($data);
    }

    public function getAllContents(){
        return $this->builder->get()->getResultArray();
    }

    public function getContentsWhere($conditions){
        return $this->builder->where($conditions)->get()->getResultArray();
    }

    public function getContentsOrWhere($conditions1, $conditions2){
        return $this->builder->where($conditions1)->orWhere($conditions2)->get()->getResultArray();
    }

    public function getContentsWhereIn($field, $array){
        return $this->builder->whereIn($field, $array)->get()->getResultArray();
    }

    public function updateContent($conditions, $data){
        return $this->builder->where($conditions)->update($data);
    }
}

?>