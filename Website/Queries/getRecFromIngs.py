#!/usr/bin/env python3
import json
from py2neo import Graph, Node 
import sys

cGraph = Graph("neo4j+s://101fd6b7.databases.neo4j.io", auth=('neo4j', "gB9F-fD2doYqInIcXR3DJZwnvvDWm-ZpgvOJ3BGCl54"))

ingList = sys.argv[1]
# query = "match(i:Ingredient)-[r:RecIng]-(c:Recipe)-[l:RecIng]-(j:Ingredient) WHERE i.name in" +ingList +"and j.name in " +ingList +"RETURN c.name, c.link LIMIT 5"
# query = "match(n:Ingredient)-[c:RecIng]-(r:Recipe) Where n.name in ($ingList) Return r.name, r.link"
resList = []
ingList = ['onion', 'garlic']
for ing in ingList:
    query = "match(n:Ingredient)-[c:RecIng]-(r:Recipe) Where n.name = ", ing, " Return r.name, r.link"
    temp = cGraph.query(query)
    res = temp.data()
    resList.append(res)

flatList = [element for sublist in resList for element in sublist]


# temp = cGraph.query(query)
# res = temp.data()

# del temp
# ret  = []
# for temp in res:
#     temp = str(temp).split("'")
#     ret.append(temp[3])
#     ret.append(temp[7])
# ret_json = json.dumps(ret)

print(ret_json)
