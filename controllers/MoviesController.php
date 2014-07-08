<?php

    class movies {

        function get() {
            include("bdd.php");
            $name = $dbc->query("SELECT * FROM movie");
            $result = array();
            while($row = $name->fetch_assoc()){
                array_push($result, $row);
            }
            $newobj = new stdClass();
            $newobj-> data = $result;
            echo json_encode($newobj);
        }

        function post(){
            include("bdd.php");
            $title = $_POST['title'];
            $picture = $_POST['picture'];
            $genre = $_POST['genre'];
            $dbc->query("INSERT INTO movie VALUES ('', '".$title."', '".$picture."', '".$genre."')");
            var_dump($_POST);
        }

    }

    class movie_id{

        function get($id){
            include("bdd.php");
            $profil = $dbc->query("SELECT * FROM movie WHERE id = ".$id." LIMIT 1");
            $result = array();
            while($row = $profil->fetch_assoc()){
                array_push($result, $row);
            }
            $newobj = new stdClass();
            $newobj-> data = $result;
            echo json_encode($newobj);
        }

        function put($id){
            include("bdd.php");
            $_PUT  = array();
            if($_SERVER['REQUEST_METHOD'] == 'PUT') {
                parse_str(file_get_contents('php://input'), $_PUT);
            }
            $title = $_PUT['title'];
            $picture = $_PUT['picture'];
            $genre = $_PUT['genre'];
            $dbc->query("UPDATE movie SET title = '".$title."' , picture = '".$picture."' , genre = '".$genre."' WHERE id = ".$id."");
            var_dump($_PUT);
        }

        function delete($id){
            include("bdd.php");
            $_DELETE  = array();
            if($_SERVER['REQUEST_METHOD'] == 'DELETE') {
                parse_str(file_get_contents('php://input'), $_DELETE);
            }
            $dbc->query("DELETE FROM movie WHERE id = ".$id."");
            var_dump($_DELETE);
        }

    }

?>