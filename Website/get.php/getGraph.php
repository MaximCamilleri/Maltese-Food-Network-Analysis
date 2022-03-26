<?php
    function getGraph($id){
        $result = exec("python3 ../Queries/getGraph.py"." ".$id);
        $result_array = json_decode($result);

        foreach($result_array[0] as $row){
            echo ($row. ',');
        }

        echo('.');

        for($i = 0; $i < count($result_array[1]); $i++){
            echo($result_array[1][$i]);
        }

        
    }

    if(isset($_POST['id'])){
        $ing = $_POST['id'];
        getGraph($ing);
    }
?>