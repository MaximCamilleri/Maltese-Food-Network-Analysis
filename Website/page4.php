<!DOCTYPE html>

<?php
    include "searchBox.php";
?>

<html>
    <head>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <script src = "https://unpkg.com/split.js/dist/split.min.js"></script>
        <link href="styles.css" rel="stylesheet" />
        <link href="page4.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

       
        <script src ="page4.js"></script>
        
    </head>
    <body style = "background-color: #292929 ">
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end" id="sidebar-wrapper" >
                <div class="sidebar-heading border-bottom bg-light"></div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="page1.php">Home</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="page2.php">Ingredient Search</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="page3.php">Percentage Matcher</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="page4.php">List Entry</a>
                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
                        <button class = "btn btn-primary" id = "sidebarToggle">
                            <i class="fas fa-bars fa-lg"></i>
                        </button>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    </div>
                </nav>
                
                <div class = "content">
                    <div class = "split a">
                    
                        <h2 style="color:white;">Enter list of ingredients:</h1>

                        <div id = "searchBoxDiv">
                            <div class = "wrapper">
                                <input class = 'searchBoxText' type="text" name = "search" id = "search" placeholder = "Enter Ingredient" autocomplete = "chrome-off" onkeydown="returnSearchEnter(false,'search','searchIngredient0')">
                                <div class="results">
                                    <ul>
                                     <!-- possible items will go here -->
                                    </ul>
                                </div>
                            </div>

                            <div class = "wrapper">
                                <input class = 'searchBoxText' type="text" name = "search" id = "search" placeholder = "Enter Ingredient" autocomplete = "chrome-off" onkeydown="returnSearchEnter(false,'search','searchIngredient0')">
                                <div class="results">
                                    <ul>
                                     <!-- possible items will go here -->
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <button id = "addSearch" onClick = "addSearch()"><i class="fa fa-solid fa-plus"></i></button>

                        <button id = "p3btn" type = "button" onClick = "getListOfIng()">Submit</button>

                    </div>

                    <div class = "split b">
                        <h2>Recipes with entered ingredients:</h2>
                        <div id="recipes">
                        </div>
                    </div>
                    <embed src="https://www.sbs.com.au/food/recipes/maltese-kapunata" style="width:500px; height: 300px;">
                </div>
                <script>Split(['.a','.b'])</script>
                
                <script src="scripts.js"></script>
        </body>
        
</html>