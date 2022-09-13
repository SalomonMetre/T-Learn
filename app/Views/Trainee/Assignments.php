<?php

use App\Models\UserModel;
use App\Models\AssignmentModel;
use App\Models\ContentModel;
use App\Models\CustomModel;
use App\Models\RegistrationModel;
use App\Models\UnitModel;

$userModel = new UserModel();
$unitModel = new UnitModel();
$assignmentModel = new AssignmentModel;
$registrationModel = new RegistrationModel();
$customModel = new CustomModel();

$registrations = $registrationModel->getRegistrationsWhere(['TraineeId' => session('trainee')['UserId']]);
$unitIds = $customModel->getValuesFrom2DArray($registrations, 'UnitId');
$assignments = $assignmentModel->getAssignmentsWhereIn('UnitId', $unitIds);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <link rel="stylesheet" href="<?= base_url('Css/General/LandingPage.css') ?>">
    <link rel="stylesheet" href="<?= base_url('Css/Admin/Home.css') ?>">
    <title> Landing Page </title>
    <style>
        body {
            background-color: #222A2A;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-dark bg-success" style="padding:1em;">
            <div class="navbar-brand">
                <img src="<?= base_url('Images/General/logo.jpg') ?>" alt="No image" height="50em" width="50em" style="
                border-radius:50%;">
            </div>
            <button class="navbar-toggler" type="button" data-trigger="#main_nav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse" id="main_nav">
                <div class="offcanvas-header mt-3">
                    <button class="btn btn-outline-danger btn-close bg-danger float-right" style="padding: 1em;"> </button>
                    <h5 class="py-2 text-white"> </h5>
                </div>
                <ul class="navbar-nav">
                    <li class="nav-item"> <i class="bi bi-app-indicator"></i> Trainee Logged in</li>
                </ul>
            </div>
        </nav>
        <div class="row">
            <div class="col-md-3" style="background-color: #005149;text-align:center;">
                <div class="container-fluid">
                    <div class="row">
                        <div style="color:white; margin:1em; padding:0.3em; font-size:1.5em;"> <a href="<?= base_url('TraineeShowPage/Home') ?>" style="text-decoration: none; color:white;"> <i class="bi bi-person-lines-fill"></i> Profile </a> </div>
                    </div>
                    <div class="row">
                        <div style="color:white; margin:1em; padding:0.3em; font-size:1.5em;"> <a href="<?= base_url('TraineeShowPage/Courses') ?>" style="text-decoration: none; color:white;"> <i class="bi bi-journal-album"></i> Courses </a> </div>
                    </div>
                    <div class="row">
                        <div style="color:white; margin:1em; padding:0.3em; font-size:1.5em;"> <a href="<?= base_url('TraineeShowPage/Units') ?>" style="text-decoration: none; color:white;"> <i class="bi bi-book-half"></i> Units </a> </div>
                    </div>
                    <div class="row">
                        <div style="color:white; margin:1em; padding:0.3em; font-size:1.5em;"> <a href="<?= base_url('TraineeShowPage/Contents') ?>" style="text-decoration: none; color:white;"> <i class="bi bi-journal"></i> Contents </a> </div>
                    </div>
                    <div class="row" style="background-color: #222A2A; margin-right:-10%; margin-left:-10%;">
                        <div style="color:white; margin:1em; padding:0.3em; font-size:1.5em;"> <a href="<?= base_url('TraineeShowPage/Assignments') ?>" style="text-decoration: none; color:yellow;"> <i class="bi bi-pencil-square"></i> Assignments </a> </div>
                    </div>
                    <div class="row">
                        <div style="color:white; margin:1em; padding:0.3em; font-size:1.5em;"> <a href="<?= base_url('TraineeShowPage/Submissions') ?>" style="text-decoration: none; color:white;"> <i class="bi bi-person-lines-fill"></i> Submissions </a> </div>
                    </div>
                    <div class="row">
                        <div style="color:white; margin:1em; padding:0.3em; font-size:1.5em;"> <a href="<?= base_url('TraineeShowPage/Appointments') ?>" style="text-decoration: none; color:white;"> <i class="bi bi-calendar"></i> Appointments </a> </div>
                    </div>
                    <div class="row">
                        <div style="color:white; margin:1em; padding:0.3em; font-size:1.5em;"> <a href=<?= base_url('TraineeLogout/') ?> style="text-decoration: none; color:white"> <i class="bi bi-box-arrow-right"></i> Logout </a> </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <button type="button" class="btn btn-primary btn-lg" style="width:90%;margin-left:3em; margin-right:3em; margin-top:2em; margin-bottom:2em;">
                    Assignments
                </button>
                <table id="myTable" class="table" style="color:white; width:80%; margin-left:5em; margin-right:5em; text-align:start;">
                    <thead>
                        <tr>
                            <th scope="col"> AssignmentId </th>
                            <th scope="col"> Unit Name </th>
                            <th scope="col"> Trainer Name </th>
                            <th scope="col"> Assignment </th>
                            <th scope="col"> End Time </th>
                            <th scope="col"> Submit </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($assignments) {
                            foreach ($assignments as $assignment) {
                                $unitName = $unitModel->getUnitsWhere(['UnitId' => $assignment['UnitId']])[0]['UnitName'];
                                $trainer = $userModel->getUsersWhere(['UserId' => $assignment['TrainerId']])[0];
                                $trainerName = $trainer['FirstName'] . ' ' . $trainer['LastName'];
                        ?>
                                <tr>
                                    <td> <?= $assignment['AssignmentId'] ?> </td>
                                    <td> <?= $unitName ?> </td>
                                    <td> <?= $trainerName ?> </td>
                                    <td> <a href="<?= base_url('Documents/Uploads/' . $assignment['FileName']) ?>" style="text-decoration: none; color:cyan;"> View Assignment </a> </td>
                                    <td> <?= $assignment['EndTime'] ?> </td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#viewAssignment<?= $assignment['AssignmentId'] ?>">
                                            Submit Work
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="viewAssignment<?= $assignment['AssignmentId'] ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" style="color:black;"> New Submission </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="<?= base_url('TraineeSubmitWork/') ?>" method="POST" enctype="multipart/form-data">
                                                        <div class="modal-body">
                                                            <input type="text" name="AssignmentId" value="<?= $assignment['AssignmentId'] ?>" hidden>
                                                            <input type="text" name="UnitId" value="<?= $assignment['UnitId'] ?>" hidden>
                                                            <div class="form-floating mb-3">
                                                                <input type="file" class="form-control" name="Submission" id="Label" placeholder="">
                                                                <label for="floatingLabel"> Submission </label>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Close </button>
                                                            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal"> Submit </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        $("[data-trigger]").on("click", function() {
            var trigger_id = $(this).attr('data-trigger');
            $(trigger_id).toggleClass("show");
            $('body').toggleClass("offcanvas-active");
        });

        // close button 
        $(".btn-close").click(function(e) {
            $(".navbar-collapse").removeClass("show");
            $("body").removeClass("offcanvas-active");
        });

        $(document).ready(
            function() {
                $("#myTable").DataTable();
            }
        );
    </script>
</body>

</html>