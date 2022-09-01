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
                    <li class="nav-item active"> <a class="nav-link" href="<?= base_url('/') ?>"> <i class="bi bi-house-fill"></i> Home </a> </li>
                    <li class="nav-item"><a class="nav-link" href="#"> <i class="bi bi-telephone-fill"></i> Contact Us </a></li>
                    <li class="nav-item"><a class="nav-link" href="#"> <i class="bi bi-info-circle-fill"></i> About Us </a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('GeneralShowPage/AdminLoginPage/') ?>"> <i class="bi bi-box-arrow-in-right"></i> Admin Login </a></li>
                    <button class="btn btn-success btn-lg" data-bs-toggle="modal" data-bs-target="#modelId">
                        <i class="bi bi-box-arrow-in-right"></i> Register
                    </button>
                    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" style="color:black;"> Choose type of registration </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="<?= base_url('GeneralChooseRegistrationPage/') ?>" method="POST">
                                    <div class="modal-body">
                                        <select name="RegistrationType" id="" style="width:100%; padding:1em;">
                                            <option value="Trainer"> -- Trainer --</option>
                                            <option value="Trainee"> -- Trainee -- </option>
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary"> Choose </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </ul>
            </div>
        </nav>
        <div class="row" style="color:white; padding:10em;">
            <div style="font-size:3em;"> Learn with teachers who care about you </div>
            <div style="margin-bottom: 1em;"> This is a simple platform that enables trainers to teach and collaborate with their trainees</div>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#loginId" style="width:50%;">
                Click here to log in
            </button>

            <!-- Modal -->
            <div class="modal fade" id="loginId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" style="color:black;"> Login Type </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="<?= base_url('GeneralChooseLoginPage/') ?>" method="POST">
                            <div class="modal-body">
                                <select name="LoginType" id="" style="width:100%; padding:1em;">
                                    <option value="Trainer"> -- Trainer --</option>
                                    <option value="Trainee"> -- Trainee -- </option>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary"> Choose </button>
                            </div>
                        </form>
                    </div>
                </div>
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