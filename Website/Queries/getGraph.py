#!/usr/bin/env python3
import json
from urllib.parse import SplitResult
from py2neo import Graph, Node 
import sys

def addNode(name, nodes):
    if(name not in nodes):
        nodes.append(name)

def addEdge(name1, name2, edges, nodes):

    name1Index = nodes.index(name1)
    name2Index = nodes.index(name2)

    tempEdge = [name2Index, name1Index]
    edges.append(json.dumps(tempEdge))


temp = sys.argv[1].replace("_", " ")


cGraph = Graph("neo4j+s://101fd6b7.databases.neo4j.io", auth=('neo4j', "gB9F-fD2doYqInIcXR3DJZwnvvDWm-ZpgvOJ3BGCl54"))

query = "MATCH (n)-[r:IngPair]-(b) WHERE n.name = '"+ temp +"' RETURN * ORDER BY r.comCompWeight LIMIT 9"



result = cGraph.query(query)
result = result.data()

nodes = []
edges = []

for i in result:
    splitResult = str(i).split("'")

    addNode(splitResult[5], nodes)
    addNode(splitResult[13], nodes)
    addEdge(splitResult[5], splitResult[13], edges, nodes)

data = [nodes, edges]

ret_json = json.dumps(data)

print(ret_json)