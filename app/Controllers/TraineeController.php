<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\AppointmentModel;
use App\Models\CommentModel;
use App\Models\CustomModel;
use App\Models\RegistrationModel;
use App\Models\SubmissionModel;
use App\Models\UserModel;

class TraineeController extends BaseController{

    public function showPage($page){
        return view('Trainee/'.$page);
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
            return view('General/TraineeRegistrationPage');
        }
        else{
            $data=[
                'FirstName'=>$firstName,
                'LastName'=>$lastName,
                'Email'=>$email,
                'Password'=>hash('md5', $password),
                'Skills'=>$skills,
                'Type'=>'Trainee',
                'Suspended'=>'0',
            ];
            $userModel->addUser($data);
            echo '<script> alert("Trainee successfully added ! "); </script>';
            return view('General/TraineeRegistrationPage');
        }
    }

    public function login(){
        $userModel=new UserModel();

        $email=$this->request->getPost('EmailAddress');
        $password=$this->request->getPost('Password');
        $trainees=$userModel->getUsersWhere(['Email'=>$email, 'Password'=>hash('md5', $password), 'Type'=>'Trainee']);

        if(count($trainees)>0){
            session()->set('trainee',$trainees[0]);
            return $this->showPage('Intro');
        }
        else{
            echo '<script> alert("Unknown trainee !"); </script>';
            return view('General/LandingPage');
        }
    }

    public function updateTrainee(){
        $userModel=new UserModel();

        $adminId=session()->get('trainee')['UserId'];
        $firstName=$this->request->getPost('FirstName');
        $lastName=$this->request->getPost('LastName');
        $email=$this->request->getPost('Email');
        $password=$this->request->getPost('Password');
        $confPassword=$this->request->getPost('ConfPassword');
        $skills=$this->request->getPost('Skills');

        if($password!=$confPassword){
            echo '<script> alert("Passwords did not macth"); </script>';
            return view('Trainee/Home');
        }
        else{
            $conditions=['UserId'=>$adminId];
            $data=[
                'FirstName'=>$firstName,
                'LastName'=>$lastName,
                'Email'=>$email,
                'Password'=>hash('md5', $password),
                'Skills'=>$skills,
                'Type'=>'Trainee',
                'Suspended'=>'0',
            ];
            $userModel->updateUser($conditions, $data);
            session()->set('trainee', $userModel->getUsersWhere(['UserId'=>session()->get('trainee')['UserId']])[0]);
            echo '<script> alert("Trainee successfully updated ! "); </script>';
            return view('Trainee/Home');
        }
    }

    public function registerUnit(){
        $registrationModel=new RegistrationModel();

        $unitId=$this->request->getPost('UnitId');
        $traineeId=session()->get('trainee')['UserId'];
        $data=[
            'UnitId'=>$unitId,
            'TraineeId'=>$traineeId,
            'Status'=>'Pending',
        ];
        $registrationModel->addRegistration($data);
        echo '<script> alert("You successfully registered for the unit. It may take some time to reflect !"); </script>';
        return $this->showPage('Units');

    }

    public function postComment(){
        $commentModel=new CommentModel();

        $contentId=$this->request->getPost('ContentId');
        $comment=$this->request->getPost('Comment');
        $data=[
            'ContentId'=>$contentId,
            'Commentator'=>session('trainee')['FirstName'].' '.session('trainee')['LastName'],
            'Comment'=>$comment,
        ];
        $commentModel->addComment($data);
        echo '<script> alert("You have successfully posted a new comment"); </script>';
        return $this->showPage('Contents');
    }

    public function submitWork(){
        $customModel=new CustomModel();
        $submissionModel=new SubmissionModel();

        $submission=$this->request->getFile('Submission');
        $assignmentId=$this->request->getPost('AssignmentId');
        $unitId=$this->request->getPost('UnitId');
        $fileName=$customModel->moveFileAndGetName($submission);

        $data=[
            'AssignmentId'=>$assignmentId,
            'UnitId'=>$unitId,
            'TraineeId'=>session('trainee')['UserId'],
            'TraineeName'=>session('trainee')['FirstName'].' '.session('trainee')['LastName'],
            'FileName'=>$fileName,
            'Marked'=>0,
            'Marks'=>0,
        ];
        $submissionModel->addSubmission($data);
        echo '<script> alert("Work successfully submitted !"); </script>';
        return $this->showPage('Assignments');
    }

    public function addAppointment(){
        $appointmentModel=new AppointmentModel();

        $meetingTime=$this->request->getPost('MeetingTime');
        $toId=$this->request->getPost('ToId');
        $proposedById=session('trainee')['UserId'];
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
        session()->remove('trainee');
        return view('General/LandingPage');
    }
}

?>