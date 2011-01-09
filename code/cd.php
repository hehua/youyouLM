
<?php
	$con = mysql_connect("localhost","root","");
	if (!$con) {
	  die('Could not connect: ' . mysql_error());
	  }
	
	// Create database
	$h = 'hehua';
	/*if (mysql_query("CREATE DATABASE $h",$con)) {
	  echo "Database created";
	  }
	else {
	  echo "Error creating database: " . mysql_error();
	  }*/
	
	// Create table in my_db database
	mysql_select_db("$h", $con);
	
	$sql1 = "CREATE TABLE eploy_list 
	(
		eid varchar(20) NOT NULL,
		name varchar(255) NOT NULL,
		password varchar(50) NOT NULL,
		phone varchar(255) NOT NULL,
		email varchar(255) NOT NULL,
		PRIMARY KEY(eid)
	)";
	
	
	$sql2 = "CREATE TABLE administrator 
	(
		ad_id varchar(20) NOT NULL,
		name varchar(50) NOT NULL,
		password varchar(50) NOT NULL,
		power int(1)  NOT NULL,
		PRIMARY KEY(ad_id)
	)";
	
	$sql3 = "CREATE TABLE valid_time 
	(
		eid varchar(20) NOT NULL,
		star TIME NOT NULL,
		end TIME NOT NULL,
		thedate DATE NOT NULL,
		PRIMARY KEY(eid,star,end,thedate),
		FOREIGN KEY (eid) REFERENCES eploy_list
	)";
	
	$sql4 = "CREATE TABLE publish_time 
	(
		eid varchar(20) NOT NULL,
		star TIME NOT NULL,
		end TIME NOT NULL,
		thedate DATE NOT NULL,
		PRIMARY KEY(star,end,thedate),
		FOREIGN KEY (eid) REFERENCES eploy_list
	)";
	
	$sql5 = "CREATE TABLE news
	(
		 ntitle varchar(255) NOT NULL,
		 ntime DATETIME NOT NULL,
		 ncontent TEXT NOT NULL, 
		 PRIMARY KEY(ntitle,ntime)	 
	)";
	
	$sql8 = "CREATE TABLE knows
	(
		 ntitle varchar(255) NOT NULL,
		 ntime DATETIME NOT NULL,
		 ncontent TEXT NOT NULL, 
		 PRIMARY KEY(ntitle,ntime)	 
	)";
	
	
	$sql6 = "CREATE TABLE inform
	(
		 ititle varchar(255) NOT NULL,
		 itime DATETIME NOT NULL,
		 icontent TEXT NOT NULL, 
		 eid varchar(20) NOT NULL,
		 readyes int(1) NOT NULL,
		 PRIMARY KEY(ititle,itime,eid),
		 FOREIGN KEY (eid) REFERENCES eploy_list	 
	)";
	
	
	$sql7 = "CREATE TABLE apply
	(
		 atitle varchar(255) NOT NULL,
		 atime DATETIME NOT NULL,
		 acontent TEXT NOT NULL, 
		 eid varchar(20) NOT NULL,
		 readyes int(1) NOT NULL,
		 PRIMARY KEY(atitle,atime,eid),
		 FOREIGN KEY (eid) REFERENCES eploy_list	 
	)";
	
	//mysql_query("INSERT INTO administrator VALUES ('hehua','hehua','hehua','hehua')");
	
	if ( mysql_query($sql8,$con) ){
		echo 'okkkk8';
	}
	
	
	
	
	
	mysql_close($con);
?>
