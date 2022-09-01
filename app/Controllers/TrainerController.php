<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\AppointmentModel;
use App\Models\AssignmentModel;
use App\Models\CommentModel;
use App\Models\ContentModel;
use App\Models\CustomModel;
use App\Models\UserModel;

class TrainerController extends BaseController{

    public function showPage($page){
        return view('Trainer/'.$page);
    }

    public function register(){
        $userModel=new UserModel();

        $firstName=$this->request->getPost('FirstName');
        $lastName=$this->request->getPost('LastName');
        $email=$this->request->getPost('Email');
        $password=$this->request->getPost('Password');
        $confPassword=$this->request->getPost('ConfPassword');
        $skills=$this->request->getPost('Skills');

        if($password!=$confPassword){
            echo '<script> alert("Passwords did not macth"); </script>';
            return view('General/TrainerRegistrationPage');
        }
        else{
            $data=[
                'FirstName'=>$firstName,
                'LastName'=>$lastName,
                'Email'=>$email,
                'Password'=>hash('md5', $password),
                'Skills'=>$skills,
                'Type'=>'Trainer',
                'Suspended'=>'0',
            ];
            $userModel->addUser($data);
            echo '<script> alert("Trainer successfully added ! "); </script>';
            return view('General/TrainerRegistrationPage');
        }
    }

    public function login(){
        $userModel=new UserModel();

        $email=$this->request->getPost('EmailAddress');
        $password=$this->request->getPost('Password');
        $trainers=$userModel->getUsersWhere(['Email'=>$email, 'Password'=>hash('md5', $password), 'Type'=>'Trainer']);

        if(count($trainers)>0){
            session()->set('trainer',$trainers[0]);
            return $this->showPage('Home');
        }
        else{
            echo '<script> alert("Unknown trainer !"); </script>';
            return $this->showPage('Login');
        }
    }

    public function updateTrainer(){
        $userModel=new UserModel();

        $adminId=session()->get('trainer')['UserId'];
        $firstName=$this->request->getPost('FirstName');
        $lastName=$this->request->getPost('LastName');
        $email=$this->request->getPost('Email');
        $password=$this->request->getPost('Password');
        $confPassword=$this->request->getPost('ConfPassword');
        $skills=$this->request->getPost('Skills');

        if($password!=$confPassword){
            echo '<script> alert("Passwords did not macth"); </script>';
            return view('Trainer/Home');
        }
        else{
            $conditions=['UserId'=>$adminId];
            $data=[
                'FirstName'=>$firstName,
                'LastName'=>$lastName,
                'Email'=>$email,
                'Password'=>hash('md5', $password),
                'Skills'=>$skills,
                'Type'=>'Trainer',
                'Suspended'=>'0',
            ];
            $userModel->updateUser($conditions, $data);
            session()->set('trainer', $userModel->getUsersWhere(['UserId'=>session()->get('trainer')['UserId']])[0]);
            echo '<script> alert("Trainer successfully updated ! "); </script>';
            return view('Trainer/Home');
        }
    }

    public function uploadContent(){
        $customModel=new CustomModel();
        $contentModel=new ContentModel();

        $unitId=$this->request->getPost('UnitId');
        $trainerId=$this->request->getPost('TrainerId');
        $contentFile=$this->request->getFile('Content');
        $description=$this->request->getPost('Description');
        $fileName=$customModel->moveFileAndGetName($contentFile);

        $data=[
            'UnitId'=>$unitId,
            'TrainerId'=>$trainerId,
            'Description'=>$description,
            'FileName'=>$fileName,
        ];
        $contentModel->addContent($data);
        echo '<script> alert("New content successfully added !"); </script>';
        return $this->showPage('Units');

    }

    public function uploadAssignment(){
        $customModel=new CustomModel();
        $assignmentModel=new AssignmentModel();

        $unitId=$this->request->getPost('UnitId');
        $trainerId=$this->request->getPost('TrainerId');
        $assignmentFile=$this->request->getFile('Assignment');
        $description=$this->request->getPost('Description');
        $startTime=$this->request->getPost('StartTime');
        $endTime=$this->request->getPost('EndTime');
        $fileName=$customModel->moveFileAndGetName($assignmentFile);

        $data=[
            'UnitId'=>$unitId,
            'TrainerId'=>$trainerId,
            'Description'=>$description,
            'FileName'=>$fileName,
            'StartTime'=>$startTime,
            'EndTime'=>$endTime,
        ];
        $assignmentModel->addAssignment($data);
        echo '<script> alert("New assignment successfully uploaded !"); </script>';
        return $this->showPage('Units');
    }

    public function addAppointment(){
        $appointmentModel=new AppointmentModel();

        $meetingTime=$this->request->getPost('MeetingTime');
        $toId=$this->request->getPost('ToId');
        $proposedById=session('trainer')['UserId'];
        $description=$this->request->getPost('Description');

        $data=[
            'ProposedById'=>$proposedById,
            'ToId'=>$toId,
            'Description'=>$description,
            'MeetingTime'=>$meetingTime,
            'Status'=>'Pending',
        ];
        $appointmentModel->addAppointment($data);
        echo '<script> alert("Appointment successfully added ! ") </script>';
        return $this->showPage('Appointments');
    }

    public function updateAppointment(){
        $appointmentModel=new AppointmentModel();

        $appointmentId=$this->request->getPost('AppointmentId');
        $description=$this->request->getPost('Description');
        $meetingTime=$this->request->getPost('MeetingTime');
        $status=$this->request->getPost('Status');
        $conditions=[
            'AppointmentId'=>$appointmentId,
        ];
        $data=[
            'Description'=>$description,
            'MeetingTime'=>$meetingTime,
            'Status'=>$status,
        ];
        $appointmentModel->updateAppointment($conditions, $data);
        echo '<script> alert("Appointment successfully updated !"); </script>';
        return $this->showPage('Appointments');
    }

    public function logout(){
        session()->remove('trainer');
        return view('General/LandingPage');
    }
}

?>