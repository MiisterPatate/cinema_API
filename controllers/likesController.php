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

        function post(){
            include("bdd.php");
            $profil = $dbc->query("INSERT INTO likes FROM relation WHERE id = ".$id."");
            $result = array();
            while($row = $profil->fetch_assoc()){
                array_push($result, $row);
            }
            $newobj = new stdClass();
            $newobj-> data = $result;
            echo json_encode($newobj);
        }

    }