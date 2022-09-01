<?php

namespace App\Models;
use CodeIgniter\Model;

class AppointmentModel extends Model{
    protected $table='appointments';
    protected $primaryKey='AppointmentId';
    protected $allowedFields=['AppointmentId','ProposedById','Description','ToId','MeetingTime','Status','Time'];

    protected $db, $builder;
    public function __construct(){
        $this->db=\Config\Database::connect();
        $this->builder=$this->db->table($this->table);
    }

    public function addAppointment($data){
        $this->builder->insert($data);
    }

    public function getAllAppointments(){
        return $this->builder->get()->getResultArray();
    }

    public function getAppointmentsWhere($conditions){
        return $this->builder->where($conditions)->get()->getResultArray();
    }

    public function getAppointmentsOrWhere($conditions1, $conditions2){
        return $this->builder->where($conditions1)->orWhere($conditions2)->get()->getResultArray();
    }

    public function getAppointmentsWhereIn($field, $array){
        return $this->builder->whereIn($field, $array)->get()->getResultArray();
    }

    public function updateAppointment($conditions, $data){
        return $this->builder->where($conditions)->update($data);
    }
}

?>