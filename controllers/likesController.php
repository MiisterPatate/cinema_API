<?php

    class likes{

        function get($id){
            include("bdd.php");
            $profil = $dbc->query("SELECT movies_id FROM relation WHERE id = ".$id."");
            $result = array();
            $afficher = array();
            while($row = $profil->fetch_object()){
                $result = array(
                    'id' => (int)$row->id,
                    'title' => $row->title,
                    'cover' => (int)$row->cover,
                    'genre' => (int)$row->genre
                );
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