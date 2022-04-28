<?php
function getRecipePair($ing1, $ing2){
        $result = exec("python3 ../Queries/percentageMatch.py"." ".$ing1." ".$ing2); 
        $result_array = json_decode($result);

        for($i = 0; $i < count($result_array); $i++){
            echo("<p>$result_array[$i]%<p>"); 
            $i++;
        }
    }

    if(isset($_POST['ing1']) && isset($_POST['ing2'])){ 
        $ing1 = $_POST['ing1'];
        $ing2 = $_POST['ing2'];
        getRecipePair($ing1, $ing2);
    }