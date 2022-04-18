<script>
    var data = <?php echo exec("python3 Queries/getIngredients.py"); ?>; 

    document.getElementById("results").style.height = "220px";

    let searchable = [];

    for(var i = 0; i < data.length; i++){
        searchable.push(data[i]);
    }

    // get reference to button
    var btn = document.getElementById("p3btn");
	// add event listener for the button, for action "click"
	btn.addEventListener("click", getListOfIng);

    function searchBox(searchInputIn, searchWrapperIn, resultsWrapperIn, count, searchId){
        searchInputIn.addEventListener('keyup', () => {
            let results = [];
            let input = searchInputIn.value;
            if (input.length) {
            results = searchable.filter((item) => {
                return item.toLowerCase().includes(input.toLowerCase());
            });
            }
            
            renderResults(results, searchWrapperIn, resultsWrapperIn, count, searchId);
        });
    }

    function renderResults(results, sW, rW, count, searchId) {
        if (!results.length) {
            return sW.classList.remove('show');
        }

        var temp = [];
        for(var i = 0; i < 5 && i < results.length; i++){
            temp.push(results[i]);
        }

        const content = temp
        .map((item) => {
            return `<li id = '${item}' class = 'searchIngredient${count}' onClick = 'returnSearch(this.id, true, ${searchId})'>${item}</li>`;
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
        if (temp.innerHTML.value != ""){
            document.getElementById("results").style.height = "220px !important";
        }
        else {
            document.querySelector('.results').style.height = "200px";
        }
    }

    //page 3

    function call(){
        i1 = document.getElementById('search').value;
        i2 = document.getElementById('searchOther').value;
        $.ajax({
            method: "POST",
            url: "get.php/getRecipePair.php",
            data: { ing1: i1 , ing2: i2}
            })
            .done(function( response ) {
                $("ul.recipeList").html(response);
        });

        $.ajax({
            method: "POST",
            url: "get.php/getIngrPairComp.php",
            data: { ing1: i1 , ing2: i2}
            })
            .done(function( response ) {
                $("ul.matchingIng").html(response);
        });

    }

    // page 4

    function getListOfIng(){
        ingList = document.getElementsByClassName("test");
        var inp = [];
        for(var i = 0; i < ingList.length; i++) {
            inp.push(ingList[i].value);
        }
        console.log(inp);
        //console.log(ingList)
    }

</script>