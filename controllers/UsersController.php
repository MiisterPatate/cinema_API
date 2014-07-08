<?php

    class listUsers {
        function get() {
            include("bdd.php");
            echo '<h2>Tout les utilisateurs :</h2>';
            $name = $dbc->query('SELECT * FROM user');
            while($row = $name->fetch_assoc()){
                echo "<p>".$row['id']." - ".$row['username']."</p>";
            }
        }
    }

    class addUsers{
        function get($name){
            include("bdd.php");
            $add = $dbc->query("INSERT INTO user VALUES ('', '".$name."')");
        }
    }