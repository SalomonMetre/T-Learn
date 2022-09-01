<?php

use App\Models\CourseModel;

$courseModel = new CourseModel();
$courses = $courseModel->getAllCourses();

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
                    <li class="nav-item"> <i class="bi bi-app-indicator"></i> Admin Logged in</li>
                </ul>
            </div>
        </nav>
        <div class="row">
            <div class="col-md-3" style="background-color: #005149;text-align:center;">
                <div class="container-fluid">
                    <div class="row">
                        <div style="color:white; margin:1em; padding:0.3em; font-size:1.5em;"> <a href="<?= base_url('AdminShowPage/Home') ?>" style="text-decoration: none; color:white;"> <i class="bi bi-person-lines-fill"></i> Profile </a> </div>
                    </div>
                    <div class="row">
                        <div style="color:white; margin:1em; padding:0.3em; font-size:1.5em;"> <a href="<?= base_url('AdminShowPage/Users') ?>" style="text-decoration: none; color:white;"> <i class="bi bi-person-circle"></i> Users </a> </div>
                    </div>
                    <div class="row" style="background-color: #222A2A; margin-right:-10%; margin-left:-10%;">
                        <div style="color:white; margin:1em; padding:0.3em; font-size:1.5em;"> <a href="<?= base_url('AdminShowPage/Courses') ?>" style="text-decoration: none; color:yellow;"> <i class="bi bi-book-fill"></i> Courses </a> </div>
                    </div>
                    <div class="row">
                        <div style="color:white; margin:1em; padding:0.3em; font-size:1.5em;"> <a href="<?= base_url('AdminShowPage/Units') ?>" style="text-decoration: none; color:white;"> <i class="bi bi-journal-album"></i> Units </a> </div>
                    </div>
                    <div class="row">
                        <div style="color:white; margin:1em; padding:0.3em; font-size:1.5em;"> <a href="<?= base_url('AdminShowPage/UnitRegistrations') ?>" style="text-decoration: none; color:white;"> <i class="bi bi-card-checklist"></i> Unit Registrations </a> </div>
                    </div>
                    <div class="row">
                        <div style="color:white; margin:1em; padding:0.3em; font-size:1.5em;"> <a href="<?= base_url('AdminShowPage/TrainerQuestions') ?>" style="text-decoration: none; color:white;"> <i class="bi bi-question-square-fill"></i> Trainer Questions </a> </div>
                    </div>
                    <div class="row">
                        <div style="color:white; margin:1em; padding:0.3em; font-size:1.5em;"> <a href=<?= base_url('AdminLogout/') ?> style="text-decoration: none; color:white"> <i class="bi bi-box-arrow-right"></i> Logout </a> </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#addCourseId" style="width:90%;margin-left:3em; margin-right:3em; margin-top:2em; margin-bottom:2em;">
                    Add Course
                </button>

                <!-- Modal -->
                <div class="modal fade" id="addCourseId" tabindex="-1" role="dialog" aria-labelledby="modelId" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" style="color:black;"> Add Course </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="<?= base_url('AdminAddCourse/') ?>" method="POST">
                                <div class="modal-body">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="CourseName" id="Label" placeholder="" required>
                                        <label for="floatingLabel"> Course Name </label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="Description" id="Label" placeholder="" required>
                                        <label for="floatingLabel"> Description </label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="Duration" id="Label" placeholder="" required>
                                        <label for="floatingLabel"> Duration </label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary"> Add Course </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <table id="myTable" class="table" style="color:white; width:80%; margin-left:5em; margin-right:5em; text-align:start;">
                    <thead>
                        <tr>
                            <th scope="col"> Course Id </th>
                            <th scope="col"> Description </th>
                            <th scope="col"> Duration </th>
                            <th scope="col"> Time </th>
                            <th scope="col"> Edit </th>
                            <th scope="col"> Enrol Trainee </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($courses) {
                            foreach ($courses as $course) {
                        ?>
                                <tr>
                                    <td> <?= $course['CourseId'] ?></td>
                                    <td> <?= $course['Description'] ?></td>
                                    <td> <?= $course['Duration'] ?></td>
                                    <td> <?= $course['Time'] ?></td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#editCourseId<?= $course['CourseId'] ?>">
                                            Edit
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="editCourseId<?= $course['CourseId'] ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" style="color:black;"> Update Course </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="<?= base_url('AdminUpdateCourse/') ?>" method="POST">
                                                        <div class="modal-body">
                                                            <input type="text" name="CourseId" value="<?= $course['CourseId'] ?>" hidden>
                                                            <div class="form-floating mb-3">
                                                                <input type="text" class="form-control" name="CourseName" value="<?= $course['CourseName'] ?>" id="Label" placeholder="">
                                                                <label for="floatingLabel"> Course Name </label>
                                                            </div>
                                                            <div class="form-floating mb-3">
                                                                <input type="text" class="form-control" name="Description" value="<?= $course['Description'] ?>" id="Label" placeholder="">
                                                                <label for="floatingLabel"> Description </label>
                                                            </div>
                                                            <div class="form-floating mb-3">
                                                                <input type="text" class="form-control" name="Duration" value="<?= $course['Duration'] ?>" id="Label" placeholder="">
                                                                <label for="floatingLabel"> Duration </label>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary"> Update </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    </td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#modelId">
                                            Enrol Trainee
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" style="color:black;"> Enrol Trainee </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="<?= base_url('AdminAddEnrolment/') ?>" method="POST">
                                                        <div class="modal-body">
                                                            <input type="text" name="CourseId" value="<?= $course['CourseId'] ?>" hidden>
                                                            <div class="form-floating mb-3">
                                                                <input type="text" class="form-control" name="TraineeId" id="Label" placeholder="" required>
                                                                <label for="floatingLabel"> Trainee Id </label>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary"> Add Enrolment </button>
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