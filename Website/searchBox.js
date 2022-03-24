let searchable = [
    'Elastic',
    'PHP',
    'Something about CSS',
    'How to code',
    'JavaScript',
    'Coding',
    'Some other item',
];

const searchInput = document.getElementById('search');
const searchOtherInput = document.getElementById('searchOther');

const searchWrapper = document.querySelector('.wrapper');
const searchOtherWrapper = document.querySelector('.wrapperOther');

const resultsWrapper = document.querySelector('.results');
const resultsOtherWrapper = document.querySelector('.resultsOther')

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

searchOtherInput.addEventListener('keyup', () => {
  
  let results = [];
  let input = searchOtherInput.value;
  if (input.length) {
    results = searchable.filter((item) => {
      return item.toLowerCase().includes(input.toLowerCase());
    });
  }
  renderResultsOther(results);
});

function renderResults(results) {
    if (!results.length) {
      return searchWrapper.classList.remove('show');
    }
  
    const content = results
      .map((item) => {
        return `<li id = '${item}' onClick = 'returnSearch(this.id)'>${item}</li>`;
      })
      .join('');
  
    searchWrapper.classList.add('show');
    resultsWrapper.innerHTML = `<ul>${content}</ul>`;
}

function renderResultsOther(results) {
  if (!results.length) {
    return searchOtherWrapper.classList.remove('show');
  }

  const content = results
    .map((item) => {
      return `<li id = '${item}' onClick = 'returnSearch(this.id)'>${item}</li>`;
    })
    .join('');

  searchOtherWrapper.classList.add('show');
  resultsOtherWrapper.innerHTML = `<ul>${content}</ul>`;
}



function returnSearch(item_id){
  alert(item_id);
}

function returnSearchEnter(item){
  if(event.key === 'Enter') {
    alert(item.value);        
  }
}