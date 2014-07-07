<?php

require("libs/toro.php");

    class users {
        function get() {
            include("bdd.php");
            echo '<h2>Tout les utilisateurs :</h2>';
            $name = $dbc->query('SELECT * FROM user');
            while($row = $name->fetch_assoc()){
                echo "<p>".$row['id']." - ".$row['username']."</p>";
            }
        }
    }

    Toro::serve(array(
        "/users/" => "users"
    ));