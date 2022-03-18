#!/usr/bin/env python3
import json
from py2neo import Graph, Node 
import sys

cGraph = Graph("neo4j+s://101fd6b7.databases.neo4j.io", auth=('neo4j', "gB9F-fD2doYqInIcXR3DJZwnvvDWm-ZpgvOJ3BGCl54"))

query = "match(i:Ingredient)-[r:RecIng]-(c:Recipe) WHERE i.name ='"+ sys.argv[1] +"' RETURN c.name, c.link LIMIT 5"

result = cGraph.query(query)
result = result.data()

ret  = []
for temp in result:
    temp = str(temp).split("'")
    ret.append(temp[3])
    ret.append(temp[7])

ret_json = json.dumps(ret)

print(ret_json)
