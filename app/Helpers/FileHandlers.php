<?php

function moveFileAndGetName($file)
{
    if ($file->isValid() && !$file->hasMoved()) {
        $fileName = $file->getRandomName();
        $file->move(ROOTPATH . 'public/Documents/Uploads/', $fileName);
    }
    return $fileName;
}


?>