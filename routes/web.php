<?php


$router->get('/', function () use ($router) {
    echo "<center> Welcome </center>";
});

$router->get('/version', function () use ($router) {
    return $router->app->version();
});

Route::group([

    'prefix' => 'api'


], function ($router) {

Route::post('login', 'AuthController@login');

Route::post('user-profile', 'AuthController@me');


//User1Controller

$router->get('/users1',['uses' => 'User1Controller@index']); //LISTUSER - show all user records

$router->get('/user1/{id}', 'User1Controller@getID1'); //GETIDUSER - gets user by id

$router->post('/user1', 'User1Controller@addUser1'); //ADDUSER - creates a new user

$router->put('/user1/{id}', 'User1Controller@updateUser1');  //UPDATEUSER - updates user records with put

$router->patch('/user1/{id}', 'User1Controller@updateUser1');  //UPDATEUSER - updates user records with patch

$router->delete('/user1/{id}', 'User1Controller@deleteUser1'); //DELETEUSER - delete an existing user

//User1ControllerJob




//User2Controller

$router->get('/users2',['uses' => 'User2Controller@index']); //LISTUSER - show all user records

$router->get('/user2/{id}', 'User2Controller@getID2'); //GETIDUSER - gets user by id

$router->post('/user2', 'User2Controller@addUser2'); //ADDUSER - creates a new user

$router->put('/user2/{id}', 'User2Controller@updateUser2');  //UPDATEUSER - updates user records with put

$router->patch('/user2/{id}', 'User2Controller@updateUser2');  //UPDATEUSER - updates user records with patch

$router->delete('/user2/{id}', 'User2Controller@deleteUser2'); //DELETEUSER - delete an existing user


});