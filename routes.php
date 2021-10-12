<?php 

use App\Core\Route;

return[
    //admin routes                              controller name            method name
    Route::any('|^admin/?$|',                       'Admin',                'admin'),
    Route::post('|^addNewHouse/?$|',                'Admin',                'addNewHouse'),
    Route::post('|^addNewRoom/?$|',                 'Admin',                'addNewRoom'),
    Route::get('|^admin/editHouses[0-9]{1,}$|',     'Admin',                'getHouseById'),
    Route::get('|^admin/reservations$|',            'Admin',                'reservations'),
    Route::get('|^admin/allUsers$|',                'Admin',                'allUsers'),
    Route::get('|^admin/houses$|',                  'Admin',                'houses'),

    //user routes                                        
    Route::any('|^user/?$|',                        'User',                 'user'),
    Route::post('|^house/confirmReservation$|',     'User',                 'confirmReservation'),
    Route::post('|^user/getReservationById$|',      'User',                 'getReservationById'),
    Route::post('|^user/deleteReservation$|',       'User',                 'deleteReservation'),
    Route::post('|^user/confirmPassword$|',         'User',                 'confirmPassword'),
    Route::get('|^user/myreservations[0-9]{1,}$|',  'User',                 'myReservations'),
    Route::get('|^user/changePassword$|',           'User',                 'changePassword'),

            

    Route::any('|^.?$|',                            'Main',                 'index'),
    Route::any('|^login/?$|',                       'Main',                 'login'),
    Route::any('|^logout/?$|',                      'Main',                 'logout'),
    Route::post('|^authUser/?$|',                   'Main',                 'authUser'),
    Route::post('|^register/?$|',                   'Main',                 'register'),
    Route::get('|^house/getRooms\=[0-9]{1,}$|',     'Main',                 'getRooms'),
    Route::get('|^house/reservation[0-9]{1,}$|',    'Main',                 'reservation')
]
?>