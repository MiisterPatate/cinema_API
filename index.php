<?php

require("libs/toro.php");
require("controllers/UsersController.php");

    ToroHook::add("404", function() {
        API::status(404);
        API::response(array('meta'=>array('code'=>404, 'error'=>'Not Found')));
    });

    Toro::serve(array(
        "/users/" => "listUsers",
        "/users/profil/:number" => "profilUsers",
        "/users/add/:string" => "addUsers"
    ));