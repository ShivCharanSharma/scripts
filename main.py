import fnmatch
import os
import sys 
import csv

outputFileName="output_of_link.csv"
path="./"
if len(sys.argv)>1:
    path=sys.argv[1]

files=fnmatch.filter(os.listdir(path),"*.md")
heading=['File Name','Link']
with open(outputFileName,'w') as csvOutput:
    csvWriter=csv.writer(csvOutput)
    csvWriter.writerow(heading)
    for f in files:
        link="[f](Files/"+f[:-3]+".html)"
        csvWriter.writerow([f,link])


print(files)
