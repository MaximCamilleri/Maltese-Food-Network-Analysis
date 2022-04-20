<!DOCTYPE html>

<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <script src = "https://unpkg.com/split.js/dist/split.min.js"></script>
        <link href="styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
        <link rel= "stylesheet" href = "page1.css">
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
                        <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button> -->
                       
                    </div>
                </nav>
                <div class = "content">
                    <div class = "cell">
                        

                            <h1 class = "mt-4">Food Network Analysis</h1>
                            <div class = "text">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius placeat labore corrupti perferendis architecto repellat quos magni, impedit ad fugiat ipsum ab, commodi nemo consequatur numquam accusamus fugit expedita ducimus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum quidem ea sint corrupti mollitia culpa, quod assumenda recusandae rerum aut perferendis, eum, provident sunt doloribus iure? Ducimus nesciunt perspiciatis cumque!</p>
                                <button class ="button test-button" type="button">Test it out!</button>
                            </div>
                            
                        

                    </div>
                    <!-- <div class = "cell image">
                         <img src="food.png" alt="food"> 
                    </div> -->
                </div>
                
                <!-- <script> Split(['.text', '.image']); </script> -->
                
              
                
                <script src="scripts.js"></script>





        <!-- <div class = "container-fluid intro">

             <h1 class = "mt-4">Food Network Analysis</h1>

             <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius placeat labore corrupti perferendis architecto repellat quos magni, impedit ad fugiat ipsum ab, commodi nemo consequatur numquam accusamus fugit expedita ducimus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum quidem ea sint corrupti mollitia culpa, quod assumenda recusandae rerum aut perferendis, eum, provident sunt doloribus iure? Ducimus nesciunt perspiciatis cumque!</p>
             <button class ="button test-button" type="button">Test it out!</button>
         </div>  -->

        
    </body>
</html>