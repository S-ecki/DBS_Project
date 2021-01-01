# Fitness Database - SQL_Project
 
In this project, I built a database of a chosen domain from scratch. <br/>
It was created for my class [Datenbanksysteme](https://ufind.univie.ac.at/de/course.html?lv=051031&semester=2020W) at the University of Vienna.

_The Project was split up into several parts:_

## Entity Relationship Diagram


## Relational Schema


## SQL Script on Oracle


## Java + JDBC

The aim of this part is to fill up the database with multiple thousand entries. </br>
It was a requirement of our class to set up the connection and insert the data with Core Java + JDBC (no framework). </br>
I used the [DBeaver](https://dbeaver.com/docs/wiki/)-Extension for Eclipse to smooth out the experience as much as possible.

[Mockaroo](https://www.mockaroo.com/) helped me to get sensible (yet varying) input data. I created _.csv_ files for each entity-table. </br>
Those _.csv_ files are read using my `CSVHelper` class. </br>
_Note: for ease of use, all parameters are read and stay as Strings until they are passed into the SQL insert statement._

`DatabaseHelper` sets up the connection and communicates with the database. It provides all the essential function, namely _Inserts_, _Deletes_, _Selects_ and _Counts_. 

`RandomHelper` wraps are _java.util.Random_ to have convenient access to random integers and booleans.

`Launcher` contains <sup>(you guessed it)</sup> the _main_ method. It fills all the tables with the data provided and additionally keeps track of all the foreign keys needed to dynamically create relationships between the entities.</br>
_Note: Further comments to understand the code are provided inside the file._

_Note: The amount of tupels inserted is static in this program. However, it would be an easy extension to have a command line interface to pass parameters for the inserted amount on each table. Further randomization of the Primary Key attributes would be required, but that shouldn´t be problem. My time is just very limited right now :(_

## PHP + Bootstrap


## What I´ve learnt
* 
* Database connection using Core Java
* Working with _java.sql_
* Using _.csv_ files in Java 
* Error Handling on databases
* 
