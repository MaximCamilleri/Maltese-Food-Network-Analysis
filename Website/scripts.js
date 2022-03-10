/*!
* Start Bootstrap - Simple Sidebar v6.0.3 (https://startbootstrap.com/template/simple-sidebar)
* Copyright 2013-2021 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-simple-sidebar/blob/master/LICENSE)
*/
// 
// Scripts
// 

window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});


var viz;

function draw() {
    var config = {
        container_id: "viz",
        server_url: "neo4j+s://101fd6b7.databases.neo4j.io",
        server_user: "neo4j",
        server_password: "gB9F-fD2doYqInIcXR3DJZwnvvDWm-ZpgvOJ3BGCl54",
        labels: {
            "Character": {
                "caption": "name",
                "size": "pagerank",
                "community": "community",
                "title_properties": [
                    "name",
                    "pagerank"
                ]
            }
        },
        relationships: {
            "INTERACTS": {
                "thickness": "weight",
                "caption": false
            }
        },
        initial_cypher: "MATCH (n)-[:CommonRecipes]-(b) WHERE n.name = 'onion' RETURN b"
    };

    viz = new NeoVis.default(config);
    viz.render();
}
