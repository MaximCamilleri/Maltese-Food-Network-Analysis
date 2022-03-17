<!DOCTYPE html>

<html>
    <head>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <link href="styles.css" rel="stylesheet" />
        <link href="page3.css" rel="stylesheet"/>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
        
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
                
                <div>
                    <!--START WRITING HERE-->
                    <h2 id = "p3Title" style="color:white;">Percentage Matcher</h2>
                    
                </div>
                <div class = "container sbContainer">
                    <div class = "wrapper searchBoxes sbLeft">
                        <input type="text" name = "search" id = "search" placeholder = "Type to search" autocomplete = "chrome-off" onkeydown="returnSearchEnter(this)">
                        <button id="dropdownBtn"></i></button>
                        <div class="results">
                            <ul>
                                
                            </ul>
                        </div>
                    </div>
                    <div class = "wrapper searchBoxes sbRight">
                        <input type="text" name = "search" id = "search" placeholder = "Type to search" autocomplete = "chrome-off" onkeydown="returnSearchEnter(this)">
                        <button id="dropdownBtn"> </i></button>

                        <div class="results">
                            <ul>

                            </ul>
                            
                        </div>
                    </div>
                </div>
                    
               

                <script src="scripts.js"></script>
                <script src="searchBox.js"></script>
    </body>
</html>