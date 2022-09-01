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
                    <li class="nav-item"> <i class="bi bi-app-indicator"></i> <span style="color:white; font-weight:bold;"> <?= session()->get('trainer')['FirstName'].' '.session()->get('trainer')['LastName'] ?> [Trainer] </span> </li>
                </ul>
            </div>
        </nav>
        <div class="row">
            <div class="col-md-3" style="background-color: #005149;text-align:center;">
                <div class="container-fluid">
                    <div class="row" style="background-color: #222A2A; margin-right:-10%; margin-left:-10%;">
                        <div style="color:white; margin:1em; padding:0.3em; font-size:1.5em;"> <a href="<?= base_url('TrainerShowPage/Home') ?>" style="text-decoration: none; color:yellow;"> <i class="bi bi-person-lines-fill"></i> Profile </a> </div>
                    </div>
                    <div class="row">
                        <div style="color:white; margin:1em; padding:0.3em; font-size:1.5em;"> <a href="<?= base_url('TrainerShowPage/Units') ?>" style="text-decoration: none; color:white;"> <i class="bi bi-book-half"></i> Units </a> </div>
                    </div>
                    <div class="row">
                        <div style="color:white; margin:1em; padding:0.3em; font-size:1.5em;"> <a href="<?= base_url('TrainerShowPage/Contents') ?>" style="text-decoration: none; color:white;"> <i class="bi bi-journal"></i> Contents </a> </div>
                    </div>
                    <div class="row">
                        <div style="color:white; margin:1em; padding:0.3em; font-size:1.5em;"> <a href="<?= base_url('TrainerShowPage/Assignments') ?>" style="text-decoration: none; color:white;"> <i class="bi bi-pencil-square"></i> Assignments </a> </div>
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
                <form action="<?= base_url('TrainerUpdate/') ?>" method="POST" style="padding-left:20%; padding-right:20%; text-align:center; margin-top:3em;">
                <button class="btn btn-primary" style="width:90%;margin-left:3em; margin-right:3em; margin-top:1em; margin-bottom:2em;"> Update Profile </button>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="FirstName" id="Label" placeholder="" value="<?= session()->get('trainer')['FirstName'] ?>" required>
                        <label for="floatingLabel"> First Name </label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="LastName" id="Label" placeholder="" value="<?= session()->get('trainer')['LastName'] ?>" required>
                        <label for="floatingLabel"> Last Name </label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" name="Email" id="Label" placeholder="" value="<?= session()->get('trainer')['Email'] ?>" required>
                        <label for="floatingLabel"> Email </label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="Password" id="Label" placeholder="" required>
                        <label for="floatingLabel"> Password </label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="ConfPassword" id="Label" placeholder="" required>
                        <label for="floatingLabel"> Confirm Password </label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="Skills" id="Label" value="<?= session()->get('trainer')['Skills'] ?>" placeholder="">
                        <label for="floatingLabel"> Skills </label>
                    </div>
                    <button type="submit" class="btn btn-primary"> Update </button>
                </form>
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