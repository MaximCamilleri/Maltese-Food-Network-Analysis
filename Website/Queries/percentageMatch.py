#!/usr/bin/env python3
import json
from py2neo import Graph, Node 
import sys

cGraph = Graph("neo4j+s://101fd6b7.databases.neo4j.io", auth=('neo4j', "gB9F-fD2doYqInIcXR3DJZwnvvDWm-ZpgvOJ3BGCl54"))

query = "Match(n:Ingredient)-[i:IngPair]-(a:Ingredient) WHERE n.name = '" + sys.argv[1] + "' and a.name = '"+ sys.argv[2] +"' return i.comCompWeight"

result = cGraph.query(query)
result = result.data()

ret  = []

for temp in result:
    temp = str(temp).split("'")
    ret.append(int(float(temp[2][2:-2])*100))
    
ret_json = json.dumps(ret)

print(ret_json)

