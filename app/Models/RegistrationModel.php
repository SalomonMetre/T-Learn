<?php

namespace App\Models;
use CodeIgniter\Model;

class RegistrationModel extends Model{
    protected $table='registrations';
    protected $primaryKey='RegistrationId';
    protected $allowedFields=['RegistrationId','TraineeId','UnitId','Status','Time'];

    protected $db, $builder;
    public function __construct(){
        $this->db=\Config\Database::connect();
        $this->builder=$this->db->table($this->table);
    }

    public function addRegistration($data){
        $this->builder->insert($data);
    }

    public function getAllRegistrations(){
        return $this->builder->get()->getResultArray();
    }

    public function getRegistrationsWhere($conditions){
        return $this->builder->where($conditions)->get()->getResultArray();
    }

    public function getRegistrationsOrWhere($conditions1, $conditions2){
        return $this->builder->where($conditions1)->orWhere($conditions2)->get()->getResultArray();
    }

    public function updateRegistration($conditions, $data){
        return $this->builder->where($conditions)->update($data);
    }
}

?>