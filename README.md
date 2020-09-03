# PHP-CRUD-Example
This is a super simple web app which showcases CRUD functionality with PHP and MySQL. To run, download code, and start up a web server which has PHP and MySQL. You will need to create a database called crud, and you can edit the username and password in the code.

Alternatively, you can run the following queries in MySQL to set up the database:
```
CREATE DATABASE crud;
```

```
CREATE TABLE data(
     name VARCHAR(30)
     location VARCHAR(30)
     PRIMARY KEY (id)
);
```
<p align="center">
  <img src="https://i.imgur.com/9KCKy7Q.png">
</p>

This showcases CRUD operations by allowing users to type in their name and location, and update, delete, and save entries.
