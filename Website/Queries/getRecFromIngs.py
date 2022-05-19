#!/usr/bin/env python3
import json
from py2neo import Graph, Node 
import sys

cGraph = Graph("neo4j+s://101fd6b7.databases.neo4j.io", auth=('neo4j', "gB9F-fD2doYqInIcXR3DJZwnvvDWm-ZpgvOJ3BGCl54"))

ingList = sys.argv
resList = []
for ing in ingList:
    query = "match(n:Ingredient)-[c:RecIng]-(r:Recipe) Where n.name = '"+ ing+ "' Return r.name, r.link"
    temp = cGraph.query(query)
    res = temp.data()
    resList.append(res)

flatList = []
for subList in resList:
    for element in subList:
        if element not in flatList:
            flatList.append(element)
# flatList = [ for sublist in resList for element in sublist]
countList = []

for i in flatList:
    countList.append(flatList.count(i))

maxVal = max(countList)
retList = []

for i in range(len(countList)):
    if countList[i] == maxVal and flatList[i] not in retList:
        retList.append(flatList[i]['r.name'])
        retList.append(flatList[i]['r.link'])
        if len(retList) >= 20:
            break

retJson = json.dumps(retList)
print(retJson)
