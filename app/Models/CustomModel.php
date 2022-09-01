<?php

namespace App\Models;

class CustomModel{

    public function getValuesFrom2DArray($array, $field){
        $myArray=array();
        foreach($array as $row){
            array_push($myArray, $row[$field]);
        }
        return $myArray;
    }

    function moveFileAndGetName($file){
        if ($file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move(ROOTPATH . 'public/Documents/Uploads/', $fileName);
        }
        return $fileName;
    }

}
