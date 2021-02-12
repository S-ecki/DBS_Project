This project is under work at the moment.

# Fitness Database - SQL_Project
 
In this project, I built a database of a chosen domain from scratch. <br/>
It was created for my class [Datenbanksysteme](https://ufind.univie.ac.at/de/course.html?lv=051031&semester=2020W) at the University of Vienna.

_The Project was split up into several parts:_

## Entity Relationship Diagram

ER-Diagrams help to visualize your ideas and lead you to possible flaws. </br>
I used [Chen-Notation](https://de.wikipedia.org/wiki/Chen-Notation) and [BeeUp](https://austria.omilab.org/psm/content/bee-up/info) to construct the diagram <sup>(but wouldn´t recommend it to anybody in hindsight)</sup>

I frequently came back to the diagram when I was stuck somewhere during the project. Genereally, I had it open most of the time (perhaps because I´m a visual type). </br>
Certainly, it was worth the time it took to create the ER-Diagram!

In addition, `Anforderungsanalyse.pdf` is a wordy explanation of the Entities, Relationships and Attributes of my database.


## Relational Schema

Further manifesting the ideas is the Relational Schema. </br>
It represents the tables, which will be later created using SQL. </br>
Specifically, it defines Primary Keys, Foreign Keys and sometimes key candidates for all the relations. </br>


## SQL Script on Oracle

In this step, I wrote Scripts to create, fill up and delete the tables defined previously. I used [Oracle SQL Developer](https://www.oracle.com/database/technologies/appdev/sqldeveloper-landing.html) to execute them on the server our University provided us with.

`create.sql` includes the _create tables_ statements with Primary/Foreign Key definitions and a handful of other constraints. To produce unique PK, I used either _generated as identity_ or a _sequence_ combined with a _trigger_. The script also uses a _procedure_ and multiple _views_. <br>
`drop.sql` deletes all previously created entities on the database, _cascading constraints_ to avoid dependencies. <br>
`someInserts.sql` was used to test out the tables with some sensible data. The actual volume data is going to be inserted during the next step.


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

_Note: The amount of tupels inserted is static in this program. However, it would be an easy extension to have a command line interface to pass parameters for the inserted amount on each table. Further randomization of the Primary Key attributes would be required, but that shouldn´t be a problem. My time is just very limited right now :(_


## PHP + Bootstrap


## What I´ve learnt
* The value of ER-Diagrams
* How to translate ER to Relational Schema and DDL
* SQL Syntax & Semantic
* Executing SQL on Oracle + debugging
* Database connection using Core Java
* Working with _java.sql_
* Error Handling on databases
* .html
* .php - databases
* .connecting website to database
* Working with Docker and its quirks
* .bootstrap
