<?php

    class genre{

        function get(){
            include("bdd.php");
            $name = $dbc->query("SELECT * FROM genre");
            $result = array();
            $afficher = array();
            while($row = $name->fetch_object()){
                $result = array(
                    'id' => (int)$row->id,
                    'name' => $row->name
                );
                array_push($afficher, $result);
            }
            $newobj = new stdClass();
            $newobj-> data = $afficher;
            header('Content-type: application/json');
            exit (json_encode($newobj));
        }

    }
