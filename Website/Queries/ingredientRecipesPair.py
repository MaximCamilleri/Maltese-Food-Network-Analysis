#!/usr/bin/env python3
import json
from py2neo import Graph, Node 
import sys

cGraph = Graph("neo4j+s://101fd6b7.databases.neo4j.io", auth=('neo4j', "gB9F-fD2doYqInIcXR3DJZwnvvDWm-ZpgvOJ3BGCl54"))

query = "Match(i:Ingredient)-[r:RecIng]-(c:Recipe)-[d:RecIng]-(a:Ingredient) Where i.name = '"+ sys.argv[1] +"' and a.name = '"+ sys.argv[2] +"' RETURN c.name, c.link LIMIT 5"
#query = "Match(i:Ingredient)-[r:RecIng]-(c:Recipe)-[d:RecIng]-(a:Ingredient) Where i.name = 'onion' and a.name = 'tomato' RETURN c.name, c.link LIMIT 5"
result = cGraph.query(query)
result = result.data()

ret  = []
for temp in result:
    temp = str(temp).split("'")
    ret.append(temp[3])
    ret.append(temp[7])

ret_json = json.dumps(ret)

print(ret_json)
