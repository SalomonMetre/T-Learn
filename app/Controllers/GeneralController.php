<?php

namespace App\Controllers;
use App\Controllers\BaseController;

class GeneralController extends BaseController{

    public function showPage($page){
        return view('General/'.$page);
    }

    public function chooseRegistrationPage(){
        $registrationType=$this->request->getPost('RegistrationType');
        if($registrationType=='Trainer'){
            return $this->showPage('TrainerRegistrationPage');
        }
        else if($registrationType=='Trainee'){
            return $this->showPage('TraineeRegistrationPage');
        }
    }

    public function chooseLoginPage(){
        $loginType=$this->request->getPost('LoginType');
        if($loginType=='Trainer'){
            return view('Trainer/Login');
        }
        else if($loginType=='Trainee'){
            return view('Trainee/Login');
        }
    }
}

?>