<?php

//conecting to the contact_system database
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "maltese_food_analysis";

//creating the connection
$connContact = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

//checking if the database connection was successful
if(!$connContact){
    die("Connection failed: ". mysqli_connect_error());
}

$open = fopen("../CSV/listOfRecipes.csv", "r");

$column = fgetcsv($open, 1000, ",");

while(($column = fgetcsv($open, 1000, ",")) !== FALSE){
   $sqlInsert = "Insert into recipeLinks (recipeName, recipeLink) VALUES (?, ?)";

    $stmt = $connContact->prepare($sqlInsert);
    $stmt->bind_param("ss", $column[2], $column[1]);
    $stmt->execute();   

}

fclose($open);
