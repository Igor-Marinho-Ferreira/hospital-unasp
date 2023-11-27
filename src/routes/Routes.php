<?php


namespace src\routes;

use src\routes\BaseRouter;
use src\controllers\AdministrativeController;
use src\controllers\UserController;
use src\controllers\DepartmentsController;
use src\controllers\RoomsController;
use src\controllers\EnchiridionController;
use src\controllers\ApprovalController;
use src\controllers\RoomsMedicalController;
use src\controllers\MedicalController;
use src\controllers\NurseController;
use src\controllers\PatientController;
use src\controllers\PatientMedicalController;
use src\controllers\AppointmentController;
use src\controllers\HomeController;

$router = new BaseRouter;

$router->get(HOME, HomeController::class, 'redirect');
$router->get(ADMINISTRATIVE_DASHBOARD, AdministrativeController::class, 'dashboard');
$router->get(PATIENT_DASHBOARD, UserController::class, 'dashboard');
$router->get(MEDICAL_DASHBOARD, MedicalController::class, 'dashboard');

$router->group("/administrative", function($prefix){
    $this->get(ADMINISTRATIVE_DEPARTMENTS, DepartmentsController::class, 'index', $prefix);
    $this->get(ADMINISTRATIVE_DEPARTMENTS_UPDATE_STATUS, DepartmentsController::class, 'updateStatus', $prefix);
    $this->get(ADMINISTRATIVE_DEPARTMENTS_API_FIND, DepartmentsController::class, 'find', $prefix);
    $this->get(ADMINISTRATIVE_DEPARTMENTS_DESTROY, DepartmentsController::class, 'destroy', $prefix);
    $this->post(ADMINISTRATIVE_DEPARTMENTS_STORE, DepartmentsController::class, 'store', $prefix);
    $this->post(ADMINISTRATIVE_DEPARTMENTS_UPDATE, DepartmentsController::class, 'update', $prefix);

    $this->get(ADMINISTRATIVE_ROOMS, RoomsController::class, 'index', $prefix);
    $this->get(ADMINISTRATIVE_ROOMS_UPDATE_STATUS, RoomsController::class, 'updateStatus', $prefix);
    $this->get(ADMINISTRATIVE_ROOMS_API_FIND, RoomsController::class, 'find', $prefix);
    $this->get(ADMINISTRATIVE_ROOMS_DESTROY, RoomsController::class, 'destroy', $prefix);
    $this->post(ADMINISTRATIVE_ROOMS_STORE, RoomsController::class, 'store', $prefix);
    $this->post(ADMINISTRATIVE_ROOMS_UPDATE, RoomsController::class, 'update', $prefix);
    
    $this->get(ADMINISTRATIVE_MEDICAL, MedicalController::class, 'index', $prefix);
    $this->get(ADMINISTRATIVE_MEDICAL_UPDATE_STATUS, MedicalController::class, 'updateStatus', $prefix);
    $this->get(ADMINISTRATIVE_MEDICAL_API_FIND, MedicalController::class, 'find', $prefix);
    $this->get(ADMINISTRATIVE_MEDICAL_DESTROY, MedicalController::class, 'destroy', $prefix);
    $this->post(ADMINISTRATIVE_MEDICAL_STORE, MedicalController::class, 'store', $prefix);
    $this->post(ADMINISTRATIVE_MEDICAL_UPDATE, MedicalController::class, 'update', $prefix);
    
    $this->get(ADMINISTRATIVE_NURSE, NurseController::class, 'index', $prefix);
    $this->get(ADMINISTRATIVE_NURSE_UPDATE_STATUS, NurseController::class, 'updateStatus', $prefix);
    $this->get(ADMINISTRATIVE_NURSE_API_FIND, NurseController::class, 'find', $prefix);
    $this->get(ADMINISTRATIVE_NURSE_DESTROY, NurseController::class, 'destroy', $prefix);
    $this->post(ADMINISTRATIVE_NURSE_STORE, NurseController::class, 'store', $prefix);
    $this->post(ADMINISTRATIVE_NURSE_UPDATE, NurseController::class, 'update', $prefix);

    $this->get(ADMINISTRATIVE_PATIENT, PatientController::class, 'index', $prefix);
    $this->get(ADMINISTRATIVE_PATIENT_UPDATE_STATUS, PatientController::class, 'updateStatus', $prefix);
    $this->get(ADMINISTRATIVE_PATIENT_API_FIND, PatientController::class, 'find', $prefix);
    $this->get(ADMINISTRATIVE_PATIENT_DESTROY, PatientController::class, 'destroy', $prefix);
    $this->post(ADMINISTRATIVE_PATIENT_STORE, PatientController::class, 'store', $prefix);
    $this->post(ADMINISTRATIVE_PATIENT_UPDATE, PatientController::class, 'update', $prefix);

    $this->get(AUTH_LOGOUT_ADMINISTRATIVE_ID, AdministrativeController::class, 'authLogout', $prefix);
});

$router->group("/patient", function($prefix){
    $this->get(PATIENT_APPOINTMENT, AppointmentController::class, 'index', $prefix);
    $this->post(PATIENT_APPOINTMENT_STORE, AppointmentController::class, 'store', $prefix);
    $this->get(AUTH_LOGOUT_PATIENT_ID, UserController::class, 'authLogout', $prefix);
});

$router->group("/medical", function($prefix){
    $this->get(APPROVAL, ApprovalController::class, 'index', $prefix);
    $this->get(APPROVAL_UPDATE_STATUS, ApprovalController::class, 'updateStatus', $prefix);

    $this->get(ENCHIRIDION, EnchiridionController::class, 'index', $prefix);
    $this->get(AUTH_LOGOUT_MEDICAL_ID, MedicalController::class, 'authLogout', $prefix);
    $this->post(ENCHIRIDION_STORE, EnchiridionController::class, 'store', $prefix);

    $this->get(MEDICAL_ROOMS, RoomsMedicalController::class, 'index', $prefix);
    $this->get(MEDICAL_ROOMS_UPDATE_STATUS, RoomsMedicalController::class, 'updateStatus', $prefix);
    $this->get(MEDICAL_ROOMS_API_FIND, RoomsMedicalController::class, 'find', $prefix);
    $this->get(MEDICAL_ROOMS_DESTROY, RoomsMedicalController::class, 'destroy', $prefix);
    $this->post(MEDICAL_ROOMS_STORE, RoomsMedicalController::class, 'store', $prefix);
    $this->post(MEDICAL_ROOMS_UPDATE, RoomsMedicalController::class, 'update', $prefix);

    $this->get(MEDICAL_PATIENT, PatientMedicalController::class, 'index', $prefix);
    $this->get(MEDICAL_PATIENT_UPDATE_STATUS, PatientMedicalController::class, 'updateStatus', $prefix);
    $this->get(MEDICAL_PATIENT_API_FIND, PatientMedicalController::class, 'find', $prefix);
    $this->get(MEDICAL_PATIENT_DESTROY, PatientMedicalController::class, 'destroy', $prefix);
    $this->post(MEDICAL_PATIENT_STORE, PatientMedicalController::class, 'store', $prefix);
    $this->post(MEDICAL_PATIENT_UPDATE, PatientMedicalController::class, 'update', $prefix);
});

$router->group("/authentication", function($prefix){
    $this->get(AUTH_LOGIN_ADMINISTRATIVE, AdministrativeController::class, 'authLogin', $prefix);
    $this->get(AUTH_RESET_ADMINISTRATIVE, AdministrativeController::class, 'authReset', $prefix);
    $this->get(AUTH_RESET_ADMINISTRATIVE_CONFIRM, AdministrativeController::class, 'authResetConfirm', $prefix);
    $this->get(AUTH_LOGIN_PATIENT, UserController::class, 'authLogin', $prefix);
    $this->get(AUTH_LOGIN_MEDICAL, MedicalController::class, 'authLogin', $prefix);
    $this->post(AUTH_LOGIN_ADMINISTRATIVE_STORE, AdministrativeController::class, 'authLoginStore', $prefix);
    $this->post(AUTH_RESET_ADMINISTRATIVE_CONFIRM_STORE, AdministrativeController::class, 'authResetConfirmStore', $prefix);
    $this->post(AUTH_RESET_ADMINISTRATIVE_STORE, AdministrativeController::class, 'authResetStore', $prefix);
    $this->post(AUTH_LOGIN_PATIENT_STORE, UserController::class, 'authLoginStore', $prefix);
    $this->post(AUTH_LOGIN_MEDICAL_STORE, MedicalController::class, 'authLoginStore', $prefix);
});

return $router->init();
