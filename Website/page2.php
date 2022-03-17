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
                    <!-- <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Profile</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Status</a> -->
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
                        <!--<div class="collapse navbar-collapse" id="navbarSupportedContent">
                             <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                <li class="nav-item active"><a class="nav-link" href="#!">Home</a></li>
                                <li class="nav-item"><a class="nav-link" href="#!">Link</a></li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#!">Action</a>
                                        <a class="dropdown-item" href="#!">Another action</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#!">Something else here</a>
                                    </div>
                                </li>
                            </ul> 
                        </div>-->
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
                                <input type="text" name = "search" id = "search" placeholder = "Type to search" autocomplete = "chrome-off">
                                <button id="dropdownBtn"> <i class = "fa fa-search"></i></button>
                                <div class="results">
                                    <ul>

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
                                            $sql = "SELECT recipeLink FROM recipeLinks WHERE recipeName = '".$recipe."'";
                                            $resultQuery = $conn->query($sql);
                                            
                                            if ($resultQuery->num_rows > 0) {
                                                //output data of each row
                                                $rows = $resultQuery->fetch_assoc();
                                                echo("<li class = 'recipeListInd'><a target='_blank' href=".$rows['recipeLink'].">$recipe</a></li>");
                                            
                                            }
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