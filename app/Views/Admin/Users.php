<?php

use App\Models\UserModel;

$userModel = new UserModel();
$users = $userModel->getUsersOrWhere(['Type' => 'Trainer'], ['Type' => 'Trainee']);

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
                    <div class="row" style="background-color: #222A2A; margin-right:-10%; margin-left:-10%;">
                        <div style="color:white; margin:1em; padding:0.3em; font-size:1.5em;"> <a href="<?= base_url('AdminShowPage/Users') ?>" style="text-decoration: none; color:yellow;"> <i class="bi bi-person-circle"></i> Users </a> </div>
                    </div>
                    <div class="row">
                        <div style="color:white; margin:1em; padding:0.3em; font-size:1.5em;"> <a href="<?= base_url('AdminShowPage/Courses') ?>" style="text-decoration: none; color:white;"> <i class="bi bi-book-fill"></i> Courses </a> </div>
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
                <button class="btn btn-primary" style="width:90%;margin-left:3em; margin-right:3em; margin-top:2em; margin-bottom:2em;"> Users </button>
                <table id="myTable" class="table" style="color:white; width:80%; margin-left:5em; margin-right:5em; text-align:start;">
                    <thead>
                        <tr>
                            <th scope="col"> First Name </th>
                            <th scope="col"> Last Name </th>
                            <th scope="col"> Email </th>
                            <th scope="col"> Type </th>
                            <th scope="col"> Skills </th>
                            <th scope="col"> Edit </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($users) {
                            foreach ($users as $user) {
                        ?>
                                <tr>
                                    <td> <?= $user['FirstName'] ?></td>
                                    <td> <?= $user['LastName'] ?></td>
                                    <td> <?= $user['Email'] ?></td>
                                    <td> <?= $user['Type'] ?></td>
                                    <td> <?= $user['Skills'] ?></td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#modelId<?= $user['UserId'] ?>">
                                            Edit
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="modelId<?= $user['UserId'] ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" style="color:black;"> Update user </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="<?= base_url('AdminUpdateUser/') ?>" method="POST">
                                                        <div class="modal-body">
                                                            <input type="text" name="UserId" value="<?= $user['UserId'] ?>" hidden>
                                                            <input type="text" name="Type" value="<?= $user['Type'] ?>" hidden>
                                                            <div class="form-floating mb-3">
                                                                <input type="text" class="form-control" name="FirstName" id="Label" placeholder="" value="<?= $user['FirstName'] ?>" required>
                                                                <label for="floatingLabel"> First Name </label>
                                                            </div>
                                                            <div class="form-floating mb-3">
                                                                <input type="text" class="form-control" name="LastName" id="Label" placeholder="" value="<?= $user['LastName'] ?>" required>
                                                                <label for="floatingLabel"> Last Name </label>
                                                            </div>
                                                            <div class="form-floating mb-3">
                                                                <input type="text" class="form-control" name="Email" id="Label" placeholder="" value="<?= $user['Email'] ?>" required>
                                                                <label for="floatingLabel"> Email </label>
                                                            </div>
                                                            <div class="form-floating mb-3">
                                                                <input type="password" class="form-control" name="Password" id="Label" placeholder="">
                                                                <label for="floatingLabel"> Password </label>
                                                            </div>
                                                            <div class="form-floating mb-3">
                                                                <input type="password" class="form-control" name="ConfPassword" id="Label" placeholder="">
                                                                <label for="floatingLabel"> Confirm Password </label>
                                                            </div>
                                                            <div> <span style="color:black;"> Suspended </span>
                                                                <select name="Suspended" id="" style="width:100%;">
                                                                    <option value="0" selected> 0 </option>
                                                                    <option value="1"> 1 </option>
                                                                </select>
                                                            </div> <br>
                                                            <div class="form-floating mb-3">
                                                                <input type="text" class="form-control" name="Skills" id="Label" placeholder="" value="<?= $user['Skills'] ?>" required>
                                                                <label for="floatingLabel"> Skills </label>
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