<?php
function getRecipePair($ing1, $ing2){
        $result = exec("python3 ../Queries/getRecipePair.py"." ".$ing1, $ing2);
        $result_array = json_decode($result);

        foreach($result_array[0] as $row){
            echo ($row. ',');
        }

        echo('.');

        for($i = 0; $i < count($result_array[1]); $i++){
            echo($result_array[1][$i]);
        }

        
    }

    if(isset($_POST['ing1']) && isset($_POST['ing2'])){
        $ing1 = $_POST['ing1'];
        $ing2 = $_POST['ing2'];
        getRecipePair($ing1, $ing2);
    }