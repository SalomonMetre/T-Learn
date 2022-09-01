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
    <link rel="stylesheet" href="<?= base_url('Css/General/AdminLogin.css') ?>">
    <title> Landing Page </title>
    <style>
        body {
            background-image: url('<?= base_url('Images/General/main-image.avif') ?>');
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
                    <li class="nav-item active"> <a class="nav-link" href="<?= base_url('GeneralShowPage/LandingPage') ?>"> <i class="bi bi-house-fill"></i> Home </a> </li>
                    <li class="nav-item"><a class="nav-link" href="#"> <i class="bi bi-telephone-fill"></i> Contact Us </a></li>
                    <li class="nav-item"><a class="nav-link" href="#"> <i class="bi bi-info-circle-fill"></i> About Us </a></li>
                    <li class="nav-item"><a class="nav-link" href="#"> <i class="bi bi-box-arrow-in-right"></i> Admin Login </a></li>
                </ul>
            </div>
        </nav>
        <div class="row" style="color:white; padding:4em 7em 7em 7em; text-align: center; font-size:large;">
            <span style="padding-bottom: 2em; font-size:2em;"> Trainer Login </span>
            <div id="form" style="padding-left:20%; padding-right:20%;">
                <form action="<?= base_url('TrainerLogin/') ?>" method="post">
                    <div class="form-floating mb-3">
                      <input
                        type="text"
                        class="form-control" name="EmailAddress" id="Label" placeholder="">
                      <label for="floatingLabel"> Email Address </label>
                    </div>
                    <div class="form-floating mb-3">
                      <input
                        type="password"
                        class="form-control" name="Password" id="Label" placeholder="">
                      <label for="floatingLabel"> Password </label>
                    </div>
                    <button type="submit" class="btn btn-success" style="padding:1em 2em 1em 2em; margin-top:1em;"> Log In </button>
                </form>
            </div>
        </div>
        <div>

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