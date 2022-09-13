<?php

namespace Config;

use App\Controllers\TrainerController;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

// general routes
$general_routes=[
    'GeneralShowPage/(:any)'=>'GeneralController::showPage/$1',
    'GeneralChooseRegistrationPage/'=>'GeneralController::chooseRegistrationPage',
    'GeneralChooseLoginPage/'=>'GeneralController::chooseLoginPage/',
];
foreach ($general_routes as $route=>$function){
    $routes->match(['get','post'], $route, $function);
}

// admin routes
$admin_routes=[
    'AdminShowPage/(:any)'=>'AdminController::showPage/$1',
    'AdminLogin/'=>'AdminController::login',
    'AdminLogout/'=>'AdminController::logout',

    'AdminUpdate/'=>'AdminController::updateAdmin',
    'AdminUpdateUser/'=>'AdminController::updateUser',

    'AdminAddCourse/'=>'AdminController::addCourse',
    'AdminUpdateCourse/'=>'AdminController::updateCourse',

    'AdminAddUnit/'=>'AdminController::addUnit',
    'AdminUpdateUnit/'=>'AdminController::updateUnit',

    'AdminAddEnrolment/'=>'AdminController::addEnrolment',

    'AdminUpdateRegistration/'=>'AdminController::updateRegistration',
];
foreach($admin_routes as $route=>$function){
    $routes->match(['get','post'], $route, $function);
}

// trainer routes
$trainer_routes=[
    'TrainerShowPage/(:any)'=>'TrainerController::showPage/$1',

    'TrainerRegister/'=>'TrainerController::register',
    'TrainerLogin/'=>'TrainerController::login',
    'TrainerLogout/'=>'TrainerController::logout',

    'TrainerUpdate/'=>'TrainerController::updateTrainer',

    'TrainerUploadContent/'=>'TrainerController::uploadContent',
    'TrainerUploadAssignment/'=>'TrainerController::uploadAssignment',

    'TrainerAddAppointment/'=>'TrainerController::addAppointment',
    'TrainerUpdateAppointment/'=>'TrainerController::updateAppointment',
    'TrainerMarkSubmission/'=>'TrainerController::markSubmission',
];
foreach ($trainer_routes as $route=>$function){
    $routes->match(['get','post'], $route, $function);
}

// trainee routes
$trainee_routes=[
    'TraineeShowPage/(:any)'=>'TraineeController::showPage/$1',
    'TraineeRegister/'=>'TraineeController::register',
    'TraineeLogin'=>'TraineeController::login',
    'TraineeLogout/'=>'TraineeController::logout',

    'TraineeUpdate/'=>'TraineeController::updateTrainee',

    'TraineeRegisterUnit/'=>'TraineeController::registerUnit/',

    'TraineePostComment/'=>'TraineeController::postComment',
    'TraineeSubmitWork/'=>'TraineeController::submitWork',

    'TraineeAddAppointment/'=>'TraineeController::addAppointment',
    'TraineeUpdateAppointment/'=>'TraineeController::updateAppointment',
    
];
foreach ($trainee_routes as $route=>$function){
    $routes->match(['get','post'], $route, $function);
}

// 

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
