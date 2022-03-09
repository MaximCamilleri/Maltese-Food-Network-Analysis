#!/usr/bin/env python3
import json
from py2neo import Graph, Node 

cGraph = Graph("neo4j+s://101fd6b7.databases.neo4j.io", auth=('neo4j', "gB9F-fD2doYqInIcXR3DJZwnvvDWm-ZpgvOJ3BGCl54"))

query = "MATCH (i:Ingredient)-[r:inRecipe]-(c:Recipe) RETURN i.name, count(r) AS connections ORDER BY connections DESC LIMIT 10"

result = cGraph.query(query)
result = result.data()

ret  = []

for temp in result:
    temp = str(temp).split("'")
    ret.append(temp[3])

ret_json = json.dumps(ret)

print(ret_json)