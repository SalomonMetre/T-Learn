<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\CourseModel;
use App\Models\EnrolmentModel;
use App\Models\RegistrationModel;
use App\Models\UnitModel;
use App\Models\UserModel;

class AdminController extends BaseController{

    public function showPage($page){
        return view('Admin/'.$page);
    }

    public function login(){
        $userModel=new UserModel();
        $email=$this->request->getPost('EmailAddress');
        $password=$this->request->getPost('Password');
        $admins=$userModel->getUsersWhere(['Email'=>$email, 'Password'=>hash('md5', $password)]);
        if(count($admins)>0){
            session()->set('admin',$admins[0]);
            return $this->showPage('Home');
        }
        else{
            echo '<script> alert("Unknown administrator !"); </script>';
            return view('General/AdminLoginPage');
        }
    }

    public function updateAdmin(){
        $userModel=new UserModel();

        $adminId=session()->get('admin')['UserId'];
        $firstName=$this->request->getPost('FirstName');
        $lastName=$this->request->getPost('LastName');
        $email=$this->request->getPost('Email');
        $password=$this->request->getPost('Password');
        $confPassword=$this->request->getPost('ConfPassword');
        $skills=$this->request->getPost('Skills');

        if($password!=$confPassword){
            echo '<script> alert("Passwords did not macth"); </script>';
            return view('Admin/Home');
        }
        else{
            $conditions=['UserId'=>$adminId];
            $data=[
                'FirstName'=>$firstName,
                'LastName'=>$lastName,
                'Email'=>$email,
                'Password'=>hash('md5', $password),
                'Skills'=>$skills,
                'Type'=>'Admin',
                'Suspended'=>'0',
            ];
            $userModel->updateUser($conditions, $data);
            session()->set('admin', $userModel->getUsersWhere(['UserId'=>session()->get('admin')['UserId']])[0]);
            echo '<script> alert("Admin successfully updated ! "); </script>';
            return view('Admin/Home');
        }
    }

    public function updateUser(){
        $userModel=new UserModel();

        $userId=$this->request->getPost('UserId');
        $firstName=$this->request->getPost('FirstName');
        $lastName=$this->request->getPost('LastName');
        $email=$this->request->getPost('Email');
        $password=$this->request->getPost('Password');
        $confPassword=$this->request->getPost('ConfPassword');
        $skills=$this->request->getPost('Skills');
        $type=$this->request->getPost('Type');
        $suspended=$this->request->getPost('Suspended');

        if($password!=$confPassword){
            echo '<script> alert("Passwords did not macth"); </script>';
            return view('Admin/Users');
        }
        else{
            $conditions=['UserId'=>$userId];
            $data=[
                'FirstName'=>$firstName,
                'LastName'=>$lastName,
                'Email'=>$email,
                'Password'=>hash('md5', $password),
                'Skills'=>$skills,
                'Type'=>$type,
                'Suspended'=>$suspended,
            ];
            $userModel->updateUser($conditions, $data);
            echo '<script> alert("User successfully updated ! "); </script>';
            return view('Admin/Users');
        }
    }

    public function updateRegistration(){
        $registrationModel=new RegistrationModel();

        $newStatus=$this->request->getPost('NewStatus');
        $registrationId=$this->request->getPost('RegistrationId');
        $data=[
            'Status'=>$newStatus,
        ];
        $registrationModel->updateRegistration(['RegistrationId'=>$registrationId], $data);
        echo '<script> alert("Status successfully updated ! "); </script>';
        return $this->showPage('UnitRegistrations');
    }

    public function updateCourse(){
        $courseModel=new CourseModel();

        $description=$this->request->getPost('Description');
        $courseName=$this->request->getPost('CourseName');
        $duration=$this->request->getPost('Duration');
        $courseId=$this->request->getPost('CourseId');
        $data=[
            'Description'=>$description,
            'Duration'=>$duration,
            'CourseName'=>$courseName,
        ];
        $courseModel->updateCourse(['CourseId'=>$courseId], $data);
        echo '<script> alert("Course updated successfully !"); </script>';
        return $this->showPage('Courses');

    }

    public function updateUnit(){
        $unitModel=new UnitModel();

        $unitId=$this->request->getPost('UnitId');
        $courseId=$this->request->getPost('CourseId');
        $unitName=$this->request->getPost('UnitName');
        $description=$this->request->getPost('Description');
        $duration=$this->request->getPost('Duration');

        $data=[
            'CourseId'=>$courseId,
            'UnitName'=>$unitName,
            'Description'=>$description,
            'Duration'=>$duration,
        ];

        $unitModel->updateUnit(['UnitId'=>$unitId], $data);
        echo '<script> alert("Unit updated successfully !"); </script>';
        return $this->showPage('Units');

    }

    public function addCourse(){
        $courseModel=new CourseModel();

        $courseName=$this->request->getPost('CourseName');
        $description=$this->request->getPost('Description');
        $duratin=$this->request->getPost('Duration');
        $data=[
            'CourseName'=>$courseName,
            'Description'=>$description,
            'Duration'=>$duratin,
        ];
        $courseModel->addCourse($data);
        echo '<script> alert("Course successfully added ! "); </script>';
        return view('Admin/Courses');
    }

    public function addUnit(){
        $unitModel=new UnitModel();
        $courseModel=new CourseModel();

        $trainerId=$this->request->getPost('TrainerId');
        $courseId=$this->request->getPost('CourseId');
        $description=$this->request->getPost('Description');
        $duratin=$this->request->getPost('Duration');
        $unitName=$this->request->getPost('UnitName');
        
        $courses=$courseModel->getCoursesWhere(['CourseId'=>$courseId]);
        if(count($courses)<=0){
            echo '<script> alert("Unknown course ! You cannot add this unit "); </script>';
            return view('Admin/Units');
        }
        else{
            $data=[
                'CourseId'=>$courseId,
                'TrainerId'=>$trainerId,
                'UnitName'=>$unitName,
                'Description'=>$description,
                'Duration'=>$duratin,
            ];
            $unitModel->addUnit($data);
            echo '<script> alert("Unit successfully added ! "); </script>';
            return view('Admin/Units');
        }
    }

    public function addEnrolment(){
        $enrolmentModel=new EnrolmentModel();

        $traineeId=$this->request->getPost('TraineeId');
        $courseId=$this->request->getPost('CourseId');

        $data=[
            'TraineeId'=>$traineeId,
            'CourseId'=>$courseId,
        ];
        $enrolmentModel->addEnrolment($data);
        echo '<script> alert("Trainee successfully enrolled in course ! "); </script>';
        return view('Admin/Courses');
    }

    public function logout(){
        session()->remove('admin');
        return view('General/LandingPage');
    }


}

?>