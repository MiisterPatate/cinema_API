<?php

    class likes{

        function get($id){
            include("bdd.php");
            $profil = $dbc->query("SELECT likes FROM user WHERE id = ".$id."");
            $result = array();
            while($row = $profil->fetch_assoc()){
                array_push($result, $row);
            }
            $newobj = new stdClass();
            $newobj-> data = $result;
            echo json_encode($newobj);
        }

    }

    class addLikes{

        function post($user_id, $movie_id){
            include("bdd.php");
            $dbc->query("INSERT INTO relation (user_id, movie_id, likes) VALUES ('$user_id','$movie_id',1)");
            $dbc->query("UPDATE user SET likes=(SELECT count(*) FROM relation WHERE user_id = user.id)");
        }

    }