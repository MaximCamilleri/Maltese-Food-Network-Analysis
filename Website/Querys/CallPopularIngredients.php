<?php
    $result = exec("python3 test.py");
    $result_array = json_decode($result);

    foreach($result_array as $row){
        echo($row . "<br>");
    }
 ?>