<?php

namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model{
    protected $table='users';
    protected $primaryKey='UserId';
    protected $allowedFields=['UserId', 'LastName','FirstName', 'Email','Password','Type','Skills','Suspended','Time'];

    protected $db, $builder;
    public function __construct(){
        $this->db=\Config\Database::connect();
        $this->builder=$this->db->table($this->table);
    }

    public function addUser($data){
        $this->builder->insert($data);
    }

    public function getAllUsers(){
        return $this->builder->get()->getResultArray();
    }
    
    public function getUsersWhere($conditions){
        return $this->builder->where($conditions)->get()->getResultArray();
    }

    public function getUsersOrWhere($conditions1, $conditions2){
        return $this->builder->where($conditions1)->orWhere($conditions2)->get()->getResultArray();
    }
    
    public function updateUser($conditions, $data){
        $this->builder->where($conditions)->update($data);
    }

    public function deleteUser($conditions){
        $this->builder->where($conditions)->delete();
    }
}

?>