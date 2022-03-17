
function addSearch(){
    var search = "<div class = 'wrapper'> <input type='text' name = 'search' id = 'search' placeholder = 'Enter Ingredient' autocomplete = 'chrome-off' onkeydown='returnSearchEnter(this)'></i></button> <div class='results'><ul></ul></div></div>";
    document.getElementById("searchBoxDiv").innerHTML += search;
}