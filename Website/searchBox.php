<script>
    var data = <?php echo exec("python3 Queries/getIngredients.py"); ?>; 

    let searchable = [];

    for(var i = 0; i < data.length; i++){
        searchable.push(data[i]);
    }

    const searchInput = document.getElementById('search');
    const searchOtherInput = document.getElementById('searchOther');

    const searchWrapper = document.querySelector('.wrapper');
    const searchOtherWrapper = document.querySelector('.wrapperOther');

    const resultsWrapper = document.querySelector('.results');
    const resultsOtherWrapper = document.querySelector('.resultsOther');

    searchInput.addEventListener('keyup', () => {
        let results = [];
        let input = searchInput.value;
        if (input.length) {
        results = searchable.filter((item) => {
            return item.toLowerCase().includes(input.toLowerCase());
        });
        }
        renderResults(results, searchWrapper, resultsWrapper);
    });

    searchOtherInput.addEventListener('keyup', () => {
        let results = [];
        let input = searchOtherInput.value;
        if (input.length) {
            results = searchable.filter((item) => {
            return item.toLowerCase().includes(input.toLowerCase());
            });
        }
        renderResults(results, searchOtherWrapper, resultsOtherWrapper);
    });
    
    function renderResults(results, sW, rW) {
        if (!results.length) {
            return sW.classList.remove('show');
        }

        var temp = [];
        for(var i = 0; i < 6 && i < results.length; i++){
            temp.push(results[i]);
        }

        const content = temp
        .map((item) => {
            return `<li id = '${item}' onClick = 'returnSearch(this.id)'>${item}</li>`;
        })
        .join('');
    
        sW.classList.add('show');
        rW.innerHTML = `<ul>${content}</ul>`;
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