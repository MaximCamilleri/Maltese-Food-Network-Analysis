<?php
    function getRecipes($param){
        $exec = "python3 ../Queries/getRecFromIngs.py"." ".$param;
        $result = exec($exec);
        $result_array = json_decode($result);
        for($i = 0; $i < count($result_array); $i++){
            echo("<li ><a target='_blank' href=".$result_array[$i + 1].">".$result_array[$i]."</a></li>"); 
            $i++;
        }
    } 

    if(isset($_POST['ings'])){
        $ing = '';
        for($i = 0; $i < count($_POST['ings']); $i++){
            $ing .= $_POST['ings'][$i];
            $ing .= ' ';
        }
        getRecipes($ing);
    }
?>