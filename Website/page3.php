<!DOCTYPE html>
<?php include "searchBox.php" ?>

<html>
    <head>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <link href="styles.css" rel="stylesheet" />
        <link href="page3.css?v=<?php echo time(); ?>" rel="stylesheet"/>

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
        <script src = "https://unpkg.com/split.js/dist/split.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    </head>
    
    
    <body style = "background-color: #292929 " >
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
                   
                    <div class = "cell sbLeft"> 
                        <div class = "container">
                            <div class = "wrapper">
                                <input type="text" name = "search" id = "search" placeholder = "Type to search" autocomplete = "chrome-off" onkeydown="returnSearchEnter(false, 'search', 'searchIngredient0')">
                                <button id="dropdownBtn"> <i class = "fa fa-search"></i></button>
                                <div class="results">
                                    <script>
                                        const searchInput = document.getElementById('search');
                                        const searchWrapper = document.querySelector('.wrapper');
                                        const resultsWrapper = document.querySelector('.results');

                                        searchBox(searchInput, searchWrapper, resultsWrapper, 0); 
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button id="call", name="search"></button>

                    <div class = "cell sbRight">
                        <div class = "container">
                            <div class = "wrapperOther"> 
                                <input type="text" name = "search" id = "searchOther" placeholder = "Type to search" autocomplete = "chrome-off" onkeydown="returnSearchEnter(false, 'searchOther', 'searchIngredient1')">
                                <button id="dropdownBtn"> <i class = "fa fa-search"></i></button>
                                <div class="resultsOther">
                                    <script>
                                        const searchOtherInput = document.getElementById('searchOther');
                                        const searchOtherWrapper = document.querySelector('.wrapperOther');
                                        const resultsOtherWrapper = document.querySelector('.resultsOther');

                                        searchBox(searchOtherInput, searchOtherWrapper, resultsOtherWrapper, 1);
                                    </script>
                                </div>
                            </div>
                        </div>
                        
                    </div>  
                </div>
                <script>Split(['.sbLeft','.sbRight']);</script>

                <div class = "detailContent">
                    <div class = "details recipe">
                        <h2 class = "headerD" id="recHead"> Recipes: </h2>
                        <ul class = "recipeList">

                        </ul>
                    </div>
                    <div class = "details ing">
                        <h2 class = "headerD" id="matchIngHead"> Other Matching Ingredients: </h2>
                    </div>

                </div>
                <script>Split(['.recipe','.ing']);</script>
                <script src="scripts.js"></script>
        </body>
</html>