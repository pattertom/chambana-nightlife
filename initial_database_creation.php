<?php
include "db.php";

dbConnect();

// create Drink table
echo('<br />Creating Drink table...<br />');
$response = mysql_query("CREATE TABLE IF NOT EXISTS drink (
  name varchar(50) NOT NULL,
  image_id int(11) NOT NULL default -1,
  description varchar(400),
  PRIMARY KEY (name)
)");

if (!$response)
    echo('Drink table failed: ' . mysql_error());

// create Bar table
echo('<br />Creating Bar table...<br />');
$response = mysql_query("CREATE TABLE IF NOT EXISTS bar (
  name varchar(50) NOT NULL,
  image_id int(11) NOT NULL default -1,
  description varchar(1000),
  address varchar(400),
  weburl varchar(100),
  PRIMARY KEY (name)
)");

if (!$response)
    echo('Bar table failed: ' . mysql_error());

// create Location table
// TODO: Add google map coordinates as a column
echo('<br />Creating Location table...<br />');
$response = mysql_query("CREATE TABLE IF NOT EXISTS location (
  address varchar(400) NOT NULL,
  type varchar(20) NOT NULL,
  PRIMARY KEY (address)
);");

if (!$response)
    echo('Location table failed: ' . mysql_error());

// create Event table
echo('<br />Creating Event table...<br />');
$response = mysql_query("CREATE TABLE IF NOT EXISTS event (
  id int(11) NOT NULL auto_increment,
  name varchar(50) NOT NULL,
  image_id int(11) NOT NULL default -1,
  price int(11) NOT NULL default 0,
  type varchar(20) NOT NULL,
  description varchar(400),
  date TIMESTAMP,
  address varchar(400),
  PRIMARY KEY (id)
);");

if (!$response)
    echo('Event table failed: ' . mysql_error());

// create user table
echo('<br />Creating User table...<br />');
$response = mysql_query("CREATE TABLE IF NOT EXISTS user (
  username varchar(100) NOT NULL,
  level int(11) NOT NULL default 0,
  hash varchar(136) NOT NULL default 0,
  email varchar(100) NOT NULL,
  signup_date TIMESTAMP default CURRENT_TIMESTAMP,
  PRIMARY KEY (username)
);");

if (!$response)
    echo('User table failed: ' . mysql_error());

// create Sells table
echo('<br />Creating Sells table...<br />');
$response = mysql_query("CREATE TABLE IF NOT EXISTS sells (
    drinkName varchar(50) NOT NULL,
    barName varchar(50) NOT NULL,
    price int(11) NOT NULL,
    PRIMARY KEY (drinkName, barName)
)");

if (!$response)
    echo('Sells table failed: ' . mysql_error());

/** TODO: Implement FK	
// Adding Foriegn key to Sells
echo('<br />Altering Sells table...<br />');
$response = mysql_query("ALTER TABLE Sells  
	ADD CONSTRAINT FK_Sells  
	FOREIGN KEY (drinkName) REFERENCES Drink(name)  
	FOREIGN KEY (barName) REFERENCES Bar(name) 
	ON UPDATE CASCADE 
	ON DELETE CASCADE; ");

if (!$response)
    echo('Alter Sells table failed: ' . mysql_error());	
**/


// create drink_review table
echo('<br />Creating drink_review table...<br />');
$response = mysql_query("CREATE TABLE IF NOT EXISTS drink_review (
    id int(11) NOT NULL auto_increment,
    user_name varchar(100) NOT NULL,
    drink_name varchar(50) NOT NULL,
    approved_by_admin tinyint(1) default 0,
	rating int(11),
	review_content varchar(500),
    ts TIMESTAMP default CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);");

if (!$response)
    echo('drink_review table failed: ' . mysql_error());

// create BarReview table
echo('<br />Creating BarReview table...<br />');
$response = mysql_query("CREATE TABLE IF NOT EXISTS barreview (
    id int(11) NOT NULL auto_increment,
    userName varchar(100) NOT NULL,
    barName varchar(50) NOT NULL,
    approvedByAdmin tinyint(1) default 0,
	rating int(11),
	reviewContent varchar(500),
    ts TIMESTAMP default CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);");

if (!$response)
    echo('BarReview table failed: ' . mysql_error());
	
	// create BarSpecial table
echo('<br />Creating barspecial table...<br />');
$response = mysql_query("CREATE TABLE IF NOT EXISTS barspecial (
    id int(11) NOT NULL auto_increment,
    barName varchar(100) NOT NULL,
    isWeekly tinyint(1) default 1,
	weeklyDay varchar(20),
	description varchar(500),
    dateSpecial TIMESTAMP default CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);");

if (!$response)
    echo('barspecial table failed: ' . mysql_error());
	
	// create EventReview table
echo('<br />Creating EventReview table...<br />');
$response = mysql_query("CREATE TABLE IF NOT EXISTS EventReview (
    id int(11) NOT NULL auto_increment,
    userName varchar(100) NOT NULL,
    eventID int(11) NOT NULL,
    approvedByAdmin tinyint(1) default 0,
	rating int(11),
	reviewContent varchar(500),
    ts TIMESTAMP default CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);");

if (!$response)
    echo('EventReview table failed: ' . mysql_error());
    
// create Image table
echo('<br />Creating Image table...<br />');
$response = mysql_query("CREATE TABLE IF NOT EXISTS image (
    image_id int(11) not null auto_increment,
    image_type varchar(25) not null default '',
    image MEDIUMblob not null,
    image_height varchar(25) not null default '',
    image_width varchar(25) not null default '',
    image_size varchar(25) not null default '',
    image_ctgy varchar(25) not null default '',
    image_name varchar(50) not null default '',
    PRIMARY KEY (image_id)
);");

if (!$response)
    echo('Image table failed: ' . mysql_error());
    
// create tag table
echo('<br />Creating tag table...<br />');
$response = mysql_query("CREATE TABLE IF NOT EXISTS tag (
    event_id int(11) not null default -1,
    tag_name varchar(50) not null default '',
    PRIMARY KEY (event_id, tag_name)
);");

if (!$response)
    echo('tag table failed: ' . mysql_error());

?>