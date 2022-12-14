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
                    <li class="nav-item"> <i class="bi bi-app-indicator"></i> <span style="color:white; font-weight:bold;"> <?= session()->get('trainee')['FirstName'] . ' ' . session()->get('trainee')['LastName'] ?> </span> </li>
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
                    <div class="row">
                        <div style="color:white; margin:1em; padding:0.3em; font-size:1.5em;"> <a href="<?= base_url('TraineeShowPage/Assignments') ?>" style="text-decoration: none; color:white;"> <i class="bi bi-pencil-square"></i> Assignments </a> </div>
                    </div>
                    <div class="row" style="background-color: #222A2A; margin-right:-10%; margin-left:-10%;">
                        <div style="color:white; margin:1em; padding:0.3em; font-size:1.5em;"> <a href="<?= base_url('TraineeShowPage/Submissions') ?>" style="text-decoration: none; color:yellow;"> <i class="bi bi-person-lines-fill"></i> Submissions </a> </div>
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
                <button class="btn btn-primary" style="width:90%;margin-left:3em; margin-right:3em; margin-top:1em; margin-bottom:2em;"> My Submissions </button>
                <div>
                    <?php

                    use App\Models\SubmissionModel;

                    $submissionModel = new SubmissionModel();
                    $submissions = $submissionModel->getSubmissionsWhere(['TraineeId' => session('trainee')['UserId']]);
                    if ($submissions) {
                        foreach ($submissions as $submission) {
                    ?>
                            <div class="card" style="margin-bottom:5%; width:100%; height:80%; overflow-y: scroll; color:black;">
                                <div class="card-header" style="background-color:#0B5ED7; color:white">
                                    <h5> <?= $submission['Time'] ?> </h5>
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title"> <?= $submission['TraineeName'] ?> </h4>
                                    <h6 style="font-size:1em; color:blue;"> Marks : <?= $submission['Marks'] ?></h6>
                                    <p class="card-text">
                                        <a href="<?= base_url('Documents/Uploads/' . $submission['FileName']) ?>"> View Submission </a>
                                    </p>
                                </div>
                                <?php
                                if ($submission['Marked'] == 0) {
                                ?>
                                    <div class="card-header">
                                        <!-- Modal trigger button -->
                                        <button type="button" class="btn btn-success btn-lg" data-bs-toggle="modal" data-bs-target="#markSubmission<?= $submission['SubmissionId'] ?>">
                                            Mark this submission
                                        </button>

                                        <!-- Modal Body -->
                                        <div class="modal fade" id="markSubmission<?= $submission['SubmissionId'] ?>" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalTitleId"> Marking submission </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="<?= base_url('TrainerMarkSubmission/') ?>" method="POST">
                                                        <div class="modal-body">
                                                            <input type="text" name="SubmissionId" value="<?= $submission['SubmissionId'] ?>" hidden>
                                                            <div class="form-floating mb-3">
                                                                <input type="text" class="form-control" name="Marks" id="Label" placeholder="">
                                                                <label for="floatingLabel"> Marks </label>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Proceed</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Optional: Place to the bottom of scripts -->
                                        <script>
                                            const myModal = new bootstrap.Modal(document.getElementById('modalId'), options)
                                        </script>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        <?php
                        }
                    } else {
                        ?>
                        <div style="color: white; padding:10%; text-align:center;">
                            No submissions at the moment
                        </div>
                    <?php
                    }
                    ?>
                </div>
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
    </script>
</body>

</html>