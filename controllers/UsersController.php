<?php

    class users {

        function get() {
            include("bdd.php");
            $name = $dbc->query("SELECT * FROM user");
            $result = array();
            while($row = $name->fetch_assoc()){
                array_push($result, $row);
            }
            $newobj = new stdClass();
            $newobj-> data = $result;
            //echo json_encode($newobj);
            header('Content-type: application/json');
            exit (json_encode($newobj));
        }

        function post(){
            include("bdd.php");
            $dbc->query("INSERT INTO user VALUES ('', '".$_POST['username']."')");
            var_dump($_POST);
        }

    }

    class user_id{

        function get($id){
            include("bdd.php");
            $profil = $dbc->query("SELECT * FROM user WHERE id = ".$id." LIMIT 1");
            $result = array();
            while($row = $profil->fetch_object()){
                $result = array(
                    'data' => array(
                        'id' => (int)$row->id,
                        'username' => $row->username,
                        'likes' => (int)$row->likes,
                        'dislikes' => (int)$row->dislikes,
                        'watched' => (int)$row->watched,
                        'watchlist' => (int)$row->watchlist
                    )
                );
            }
            $newobj = new stdClass();
            $newobj-> data = $result;
            header('Content-type: application/json');
            exit (json_encode($result));
        }

        function put($id){
            include("bdd.php");
            $_PUT  = array();
            if($_SERVER['REQUEST_METHOD'] == 'PUT') {
                parse_str(file_get_contents('php://input'), $_PUT);
            }
            $dbc->query("UPDATE user SET username = '".$_PUT['username']."' WHERE id = ".$id."");
            var_dump($_PUT);
        }

        function delete($id){
            include("bdd.php");
            $_DELETE  = array();
            if($_SERVER['REQUEST_METHOD'] == 'DELETE') {
                parse_str(file_get_contents('php://input'), $_DELETE);
            }
            $dbc->query("DELETE FROM user WHERE user id = ".$id."");
            var_dump($_DELETE);
        }

    }