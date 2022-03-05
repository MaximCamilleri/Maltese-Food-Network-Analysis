<?php 

$command = escapeshellcmd('GetPopularIngredients.py');
$output = shell_exec($command);
echo $output;

?>
