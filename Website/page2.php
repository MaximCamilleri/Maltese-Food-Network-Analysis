<!DOCTYPE html>

<html>
    <head>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <link href="styles.css" rel="stylesheet" />
        <link href="page2.css?v=<?php echo time(); ?>" rel="stylesheet"/>

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
        <script src = "https://unpkg.com/split.js/dist/split.min.js"></script>

        <script src="https://cdn.neo4jlabs.com/neovis.js/v1.5.0/neovis.js"></script>
        <script src="https://rawgit.com/neo4j-contrib/neovis.js/master/dist/neovis.js"></script>
        <script src="connectToGraph.js"></script>
    </head>
    
    
    <body style = "background-color: #292929 " onload="draw()">
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
                        <!-- <button class="btn btn-primary" id="sidebarToggle"><i class="fas fa-bars" ></i></button> -->
                        <button class = "btn btn-primary" id = "sidebarToggle">
                            <i class="fas fa-bars fa-lg"></i>
                        </button>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    </div>
                </nav>
                <h2 id = "p2Title"> Featured Ingredients</h2>
                <div class = "content">
                    <!--START WRITING HERE-->
                   
                    <div class = "cell ingList">
                        <h1 style="color:white;"></h1>
                        <table class = "featIng">
                            <ul>
                            <?php
                                $result = exec("python3 Queries/populerIngredients.py");
                                $result_array = json_decode($result);

                                foreach($result_array as $row){
                                    $class = $row;
                                    $row = str_ireplace("_", " ", $row);
                                    $row = ucfirst($row);
                                    echo("<li class = 'allIng'>
                                            <form method='GET'>
                                                <input type='hidden' name = 'ingredient' value = '$class'>
                                                <button type = 'submit' class = 'ingBtn'> $row </button>
                                            </form>
                                            </li>");
                                }
                            ?>
                            </ul>
                        </table>
                        
                        
                        <div class = "container">
                            <div class = "wrapper">
                                <input type="text" name = "search" id = "search" placeholder = "Type to search" autocomplete = "chrome-off" onkeydown="returnSearchEnter(this)">
                                <button id="dropdownBtn"> <i class = "fa fa-search"></i></button>
                                <div class="results">
                                    <ul>
                                        <!-- possible items will go here -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class = "cell ingDetails">
                        <div id = "recipes">
                            <h3><u> Recipes: </u></h3>
                            <ul class = "recipeList">
                                <?php
                                    if($_GET != NULL){
                                        $exec = "python3 Queries/ingredientRecipes.py"." ".$_GET['ingredient'];

                                        $result = exec($exec);
                                        $result_array = json_decode($result);

                                        foreach($result_array as $recipe){
                                            //echo("<li class = 'recipeListInd'><a target='_blank' href="">$recipe</a></li>");
                                            echo $result_array
                                        }
                                    }
                                ?>
                            
                            </ul>
                        </div>
                        <div id = "viz"></div>
                    </div>  
                </div>
                <script>Split(['.ingList','.ingDetails']);</script>
                <script src="scripts.js"></script>
                <script src="searchBox.js"></script>
        </body>
</html>