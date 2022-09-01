<?php

namespace App\Models;
use CodeIgniter\Model;

class CommentModel extends Model{
    protected $table='comments';
    protected $primaryKey='CommentId';
    protected $allowedFields=['CommentId','ContentId','Commentator','Comment','Time'];

    protected $db, $builder;
    public function __construct(){
        $this->db=\Config\Database::connect();
        $this->builder=$this->db->table($this->table);
    }

    public function addComment($data){
        $this->builder->insert($data);
    }

    public function getAllComments(){
        return $this->builder->get()->getResultArray();
    }

    public function getCommentsWhere($conditions){
        return $this->builder->where($conditions)->get()->getResultArray();
    }

    public function getCommentsOrWhere($conditions1, $conditions2){
        return $this->builder->where($conditions1)->orWhere($conditions2)->get()->getResultArray();
    }

    public function getCommentsWhereIn($field, $array){
        return $this->builder->whereIn($field, $array)->get()->getResultArray();
    }

    public function updateComment($conditions, $data){
        return $this->builder->where($conditions)->update($data);
    }
}

?>