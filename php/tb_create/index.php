<?php

// server, DB parameters

$host = 'localhost';
$user = 'root';
$pass = '';
$mysqli = new mysqli($host, $user, $pass);
$db_name = 'theykilledkenny';
$create_db = "CREATE DATABASE " . $db_name;

// check server connection 

if ($mysqli→connect_errno) {
   printf("Connect failed: %s<br />", $mysqli→connect_error);
}
printf('Connected to Mysql successfully.<br /><hr>');

// check if DB exist
if ($mysqli->query($create_db) === TRUE) {
   printf("Database THEYKILLEDKENNY created successfully.<br /><hr>");
}
if ($mysqli→errno) {
   printf("Could not create database: %s<br /> <hr>", $mysqli→error);
}


// create a DB connection link
$link = mysqli_connect($host, $user, $pass, $db_name) or die(mysqli_error($link));


// create table USERS 
$query_users = "CREATE TABLE users (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(55) NOT NULL,
    phone_number VARCHAR(15) DEFAULT 'no number',
    password VARCHAR(60) NOT NULL,
    hash VARCHAR(50) NOT NULL,
    name VARCHAR(50) NOT NULL DEFAULT 'Missed',
    surname VARCHAR(50) NOT NULL DEFAULT 'Missed',
    photo VARCHAR(255) DEFAULT 'images/users/logo.jpg',
    registration_date DATE NOT NULL,
    active BOOLEAN NOT NULL DEFAULT '0',
    ban_reason VARCHAR(255) NOT NULL DEFAULT 'Type ban reason',
    banned BOOLEAN NOT NULL DEFAULT '0',
    status_id INT NOT NULL DEFAULT '2'
    )";

mysqli_query($link, $query_users) or die(mysqli_error($link));
echo 'table *users* has succesfully created <hr>';

// create table CUSTOMERS_REVIEWS 
$query_customers_reviews = "CREATE TABLE customers_reviews (
      review_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
      user_id INT NOT NULL,
      review VARCHAR(100) NOT NULL,
      grade INT NOT NULL,
      review_date DATE NOT NULL,
      review_status INT DEFAULT '2',   
      -- available statuses: 2 - waiting for review by admin, 1 - approved, 0 - rejected
      admin_comment VARCHAR(100) DEFAULT 'Thank you very much for your feedback! We really appriciate your taking time for this purpose!'
      )";

mysqli_query($link, $query_customers_reviews) or die(mysqli_error($link));
echo 'table *customers_reviews* has succesfully created <hr>';

// create table USERS_STATUSES
$query_users_statuses = "CREATE TABLE users_statuses (
   id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
   status VARCHAR(20) NOT NULL)";

mysqli_query($link, $query_users_statuses) or die(mysqli_error($link));
echo 'table *users_statuses* has succesfully created <hr>';

// create table PAGES 
$query_pages = "CREATE TABLE pages (
   id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
   name VARCHAR(50) NOT NULL)";

mysqli_query($link, $query_pages) or die(mysqli_error($link));
echo 'table *pages* has succesfully created <hr>';

// create table USERS_MESSAGES (query)
$query_users_messages = "CREATE TABLE users_messages (
   message_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
   user_id INT,
   email VARCHAR(55),
   name VARCHAR(50),
   message_text VARCHAR(200) NOT NULL,
   sending_date DATE NOT NULL,
   admin_response VARCHAR(200),
   message_status INT DEFAULT '0')";

mysqli_query($link, $query_users_messages) or die(mysqli_error($link));
echo 'table *users_messages* has succesfully created <hr>';

// create table ORDERS (query)


// create table PRODUCTS (query)

// create table ORDERS_STATUSES (query)

// create table USERS_FINANCIAL_INFO (query)







// set up password for admin account
$password = password_hash('root', PASSWORD_BCRYPT);
$hash = md5(rand(0, 1000));

//create admin account
mysqli_query($link, "INSERT INTO users (email, phone_number, password, hash, name, surname, 
registration_date, active, banned, status_id) VALUES ('admin@theykilledkenny.com', '+380994506556', '$password',
'$hash', 'Admin','Website', NOW(),0, 0, 1)") or die(mysqli_error($link));


// add users statuses to USERS_STATUSES
mysqli_query($link, "INSERT INTO users_statuses (status) VALUES ('admin'), ('customer'), ('illustrator')") or die(mysqli_error($link));

// add pages to PAGES
mysqli_query($link, "INSERT INTO pages (name) VALUES ('products'), ('get-order'),
('special-deals'), ('home'),('how-it-works'),('about-us'), ('error'), ('success'), ('login'),( 'logout'),
('register'), ('page-not-found'), ('profile'), ('reset'), ('policy-and-rules'), ('contact-form'), ('users-messages'),
 ('reset_password'), ('verify'),('list'), ('blog'), ('users-list'),('users-reviews'), ('profile-info'),
 ('profile-data'), ('activate'), ('forgot')") or die(mysqli_error($link));

// redirect to Home
header("Refresh:3; url='../../'");
echo 'redirecting to index.php...';
