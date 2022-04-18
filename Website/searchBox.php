<script>
    var data = <?php echo exec("python3 Queries/getIngredients.py"); ?>; 

    document.getElementById("results").style.height = "220px";

    let searchable = [];

    for(var i = 0; i < data.length; i++){
        searchable.push(data[i]);
    }

    function searchBox(searchInputIn, searchWrapperIn, resultsWrapperIn, count){
        searchInputIn.addEventListener('keyup', () => {
            let results = [];
            let input = searchInputIn.value;
            
            console.log("search");
            if (input.length) {
            results = searchable.filter((item) => {
                return item.toLowerCase().includes(input.toLowerCase());
            });
            }
            
            renderResults(results, searchWrapperIn, resultsWrapperIn, count);
        });
    }

    function renderResults(results, sW, rW, count) {
        if (!results.length) {
            return sW.classList.remove('show');
        }

        var temp = [];
        for(var i = 0; i < 5 && i < results.length; i++){
            temp.push(results[i]);
        }

        const content = temp
        .map((item) => {
            return `<li id = '${item}' class = 'searchIngredient${count}' onClick = 'returnSearch(this.id, true, "search")'>${item}</li>`;
        })
        .join('');

        sW.classList.add('show');
        rW.innerHTML = `<ul>${content}</ul>`;
        checkSearchBox("search");
    }

    // page 2
    function returnSearch(item_id, graph, searchId){ 
        setTextBox(item_id, searchId);
        if(graph == true){
            callGraph(item_id);

            $.ajax({
                method: "POST",
                url: "getRecipes.php",
                data: { id: item_id }
                })
                .done(function( response ) {
                    $("ul.recipeList").html(response);
            });
        }else{
            $.ajax({
                method: "POST",
                url: "/get.php/getRecipePair.php",
                data: { ing1: item_id , ing2: item_id}
                })
                .done(function( response ) {
                    $("ul.recipeList").html(response);
            });
        }
        
    }

    function returnSearchEnter(graph, searchId, si){
        if(event.key === 'Enter') {
            var ing = document.getElementsByClassName(si)[0].innerHTML; 
            returnSearch(ing, graph, searchId);
        }
    }

    function returnSearchButton(graph, searchId, si){
        var ing = document.getElementsByClassName(si)[0].innerHTML; 
        returnSearch(ing, graph, searchId);
    }

    function setTextBox(value, searchId){
        var temp = document.getElementById(searchId);
        temp.value = value;
    }

    function checkSearchBox(searchId){
        var temp = document.getElementById(searchId);
        console.log(temp.value)
        if (temp.innerHTML.value != ""){
            document.getElementById("results").style.height = "220px !important";
        }
        else {
            document.querySelector('.results').style.height = "200px";
        }
    }

    //page 3

    function call(){
        ing1 = document.getElementsByClassName('searchIngredient0')[0].innerHTML;
        ing2 = document.getElementsByClassName('searchIngredient1')[0].innerHTML;
    }

</script>