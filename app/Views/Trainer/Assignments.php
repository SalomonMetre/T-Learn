<?php

use App\Models\CommentModel;
use App\Models\AssignmentModel;
use App\Models\SubmissionModel;

$assignmentModel = new assignmentModel();
$assignments = $assignmentModel->getassignmentsWhere(['TrainerId' => session('trainer')['UserId']]);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" assignment="IE=edge">
    <meta name="viewport" assignment="width=device-width, initial-scale=1.0">
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
                    <li class="nav-item"> <i class="bi bi-app-indicator"></i> <span style="color:white; font-weight:bold;"> <?= session()->get('trainer')['FirstName'] . ' ' . session()->get('trainer')['LastName'] ?> [Trainer] </span> </li>
                </ul>
            </div>
        </nav>
        <div class="row">
            <div class="col-md-3" style="background-color: #005149;text-align:center;">
                <div class="container-fluid">
                    <div class="row">
                        <div style="color:white; margin:1em; padding:0.3em; font-size:1.5em;"> <a href="<?= base_url('TrainerShowPage/Home') ?>" style="text-decoration: none; color:white;"> <i class="bi bi-person-lines-fill"></i> Profile </a> </div>
                    </div>
                    <div class="row">
                        <div style="color:white; margin:1em; padding:0.3em; font-size:1.5em;"> <a href="<?= base_url('TrainerShowPage/Units') ?>" style="text-decoration: none; color:white;"> <i class="bi bi-book-half"></i> Units </a> </div>
                    </div>
                    <div class="row">
                        <div style="color:white; margin:1em; padding:0.3em; font-size:1.5em;"> <a href="<?= base_url('TrainerShowPage/Contents') ?>" style="text-decoration: none; color:white;"> <i class="bi bi-journal"></i> Contents </a> </div>
                    </div>
                    <div class="row" style="background-color: #222A2A; margin-right:-10%; margin-left:-10%;">
                        <div style="color:white; margin:1em; padding:0.3em; font-size:1.5em;"> <a href="<?= base_url('TrainerShowPage/Assignments') ?>" style="text-decoration: none; color:yellow;"> <i class="bi bi-pencil-square"></i> Assignments </a> </div>
                    </div>
                    <div class="row">
                        <div style="color:white; margin:1em; padding:0.3em; font-size:1.5em;"> <a href="<?= base_url('TrainerShowPage/Appointments') ?>" style="text-decoration: none; color:white;"> <i class="bi bi-calendar"></i> Appointments </a> </div>
                    </div>
                    <div class="row">
                        <div style="color:white; margin:1em; padding:0.3em; font-size:1.5em;"> <a href=<?= base_url('TrainerLogout/') ?> style="text-decoration: none; color:white"> <i class="bi bi-box-arrow-right"></i> Logout </a> </div>
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
                            <th scope="col"> Assignment Id </th>
                            <th scope="col"> Unit Id </th>
                            <th scope="col"> Description </th>
                            <th scope="col"> Assignment </th>
                            <th scope="col"> Time </th>
                            <th scope="col" style="text-align: center;"> Submissions </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($assignments) {
                            foreach ($assignments as $assignment) {
                        ?>
                                <tr>
                                    <td> <?= $assignment['AssignmentId'] ?> </td>
                                    <td> <?= $assignment['UnitId'] ?> </td>
                                    <td> <?= $assignment['Description'] ?> </td>
                                    <td> <a href="<?= base_url('Documents/Uploads/' . $assignment['FileName']) ?>" style="text-decoration: none; color:cyan;"> View Assignment </a> </td>
                                    <td> <?= $assignment['Time'] ?> </td>
                                    <td>
                                        <button class="btn btn-primary"> <a href="<?= base_url('TrainerShowPage/Submissions/?AssignmentId=' . $assignment['AssignmentId']) ?>" style="color:white; text-decoration:white;"> View Submissions </a> </button>
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