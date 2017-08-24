#!/bin/bash

#adds a project to the website jpaoletti.com

echo "What would you like the directory name to be? (ex name/)"
read directory

echo "What is the name of the project?"
read name

echo "Give a Short Description(no newlines)"
read description

echo "Keywords for project? (space separated list)"
read keywords

echo "Programming languages used? (space separated list)"
read languages

#check for main.php
if [ $(ls $1 | grep main.php) != "main.php" ]
then
    echo "main.php was not found"
    exit
fi

#create and move directory
mkdir $directory
cp $1/* $directory
mv $directory projects/

sqlite3 dbs/projects_db \
        "insert into projects values( '$name', '$directory', date('now'), date('now'), '$description', '$keywords', '$languages' );"


