<?php

require("libs/toro.php");
require("controllers/UsersController.php");
require("controllers/MoviesController.php");

    ToroHook::add("404", function() {
        API::status(404);
        API::response(array('meta'=>array('code'=>404, 'error'=>'Not Found')));
    });

    Toro::serve(array(
        "/v1/users/" => "users",
        "/v1/users/:number" => "user_id",
        "/v1/movies/" => "movies",
        "/v1/movies/:number" => "movie_id",
    ));