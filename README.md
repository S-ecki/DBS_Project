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


## Website with PHP + Bootstrap

This was, for sure, the most tricky part for me. We had to design a website that enables an user to execute [CRUD](https://en.wikipedia.org/wiki/Create,_read,_update_and_delete) operations on the database. To achieve this, I used HTML/CSS (Bootstrap) and PHP - _all 3 languages I have never used before_. To deploy it, a [Docker](https://www.docker.com/) Container was used. 

Starting off with the logic, I used [OCI8](https://www.php.net/manual/de/book.oci8.php) for PHP in my `DatabaseHelper.php` to implement all the needed methods on my database for the CRUD operations. <br>
An `index.php` files was created as the HomePage, housing general information, a _Sidebar_ & _Dropdown_ to navigate the site and a Diashow with related pictures. (see screenshot below) <br>
Every table that allows CRUD operation has an own page (`*index.php`) displaying them and the content of the table itself. (see exemplary screenshot below) <br>
For the rest of the tables, simple `show*.php` files were created to show off the content.

Styling of all the pages was done swiftly using [this](https://startbootstrap.com/template/simple-sidebar) free Bootstrap template. The simplicity of using Bootstrap is what surprised me the most during all of this project. The style was applied quickly with minimal knowledge of CSS and customization was a easy as it gets with the clear [docs](https://getbootstrap.com/docs/4.1/getting-started/introduction/) and some tutorial videos.

All in all, this was a very pleasureable experience for a first-time web development and I can´t remember ever learning this much in such a short amount of time!


## What I´ve learnt
* The value of ER-Diagrams
* How to translate ER to Relational Schema and DDL
* SQL Syntax & Semantic
* Executing SQL on Oracle + debugging
* Database connection using Core Java
* Working with _java.sql_
* Error Handling on databases
* Using HTML + CSS to create a basic website
* PHP with OCI8 to connect a website to a database
* Working with Docker and its quirks
* Applying a modern design using Bootstrap

`_screenshots?_`
