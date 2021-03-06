var viz;

function draw() {
    var config = {
        container_id: "viz",
        server_url: "neo4j://101fd6b7.databases.neo4j.io",
        server_user: "neo4j",
        server_password: "gB9F-fD2doYqInIcXR3DJZwnvvDWm-ZpgvOJ3BGCl54",
        encrypted: 'ENCRYPTION_ON',

        labels: {
            "Ingredient":{
                "caption": "name",
                "community": "type"
            }
        },
        relationships: {
            "CommonRecipes": {
                "thickness": "comRecWeight",
                "caption": true
            }
        },
        initial_cypher: "MATCH (n)-[:IngPair]-(b) WHERE n.name = 'onion' RETURN *"
    };
    viz = new NeoVis.default(config);
    viz.render();
}

