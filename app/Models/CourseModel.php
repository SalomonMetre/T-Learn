<?php

namespace App\Models;
use CodeIgniter\Model;

class CourseModel extends Model{
    protected $table='courses';
    protected $primaryKey='CourseId';
    protected $allowedFields=['CourseId','CourseName','Description','Duration','Time'];

    protected $db, $builder;
    public function __construct(){
        $this->db=\Config\Database::connect();
        $this->builder=$this->db->table($this->table);
    }

    public function addCourse($data){
        $this->builder->insert($data);
    }

    public function getAllCourses(){
        return $this->builder->get()->getResultArray();
    }

    public function getCoursesWhere($conditions){
        return $this->builder->where($conditions)->get()->getResultArray();
    }

    public function getCoursesOrWhere($conditions1, $conditions2){
        return $this->builder->where($conditions1)->orWhere($conditions2)->get()->getResultArray();
    }

    public function updateCourse($conditions, $data){
        return $this->builder->where($conditions)->update($data);
    }

    public function getCoursesWhereIn($field, $array){
        return $this->builder->whereIn($field, $array)->get()->getResultArray();
    }
}

?>