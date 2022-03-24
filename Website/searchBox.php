<script>
    var data = <?php echo exec("python3 Queries/getIngredients.py"); ?>; 

    let searchable = [];

    for(var i = 0; i < data.length; i++){
        searchable.push(data[i]);
    }


    const searchInput = document.getElementById('search');
    const searchWrapper = document.querySelector('.wrapper');
    const resultsWrapper = document.querySelector('.results');

    searchInput.addEventListener('keyup', () => {
        let results = [];
        let input = searchInput.value;
        if (input.length) {
        results = searchable.filter((item) => {
            return item.toLowerCase().includes(input.toLowerCase());
        });
        }
        renderResults(results);
    });
    
    function renderResults(results) {
        if (!results.length) {
        return searchWrapper.classList.remove('show');
        }
        
        if(results.length > 6){
            results = results.slice[0, 6];
            console.log(results);
        }
        const content = results
        .map((item) => {
            return `<li id = '${item}' onClick = 'returnSearch(this.id)'>${item}</li>`;
        })
        .join('');
    
        searchWrapper.classList.add('show');
        resultsWrapper.innerHTML = `<ul>${content}</ul>`;
    }

    function returnSearch(item_id){
    alert(item_id);
    }

    function returnSearchEnter(item){
    if(event.key === 'Enter') {
        alert(item.value);        
    }
    }
</script>