<?php

DEFINE ('DBUSER', ''); 
DEFINE ('DBPW', ''); 
DEFINE ('DBHOST', ''); 
DEFINE ('DBNAME', ''); 

$username = $_GET["username"]; 
$dbc = mysqli_connect(DBHOST,DBUSER,DBPW);
if (!$dbc) {
    die("Database connection failed: " . mysqli_error($dbc));
    exit();
}

$dbs = mysqli_select_db($dbc, DBNAME);
if (!$dbs) {
    die("Database selection failed: " . mysqli_error($dbc));
    exit(); 
}

$result = mysqli_query($dbc, "SHOW COLUMNS FROM login");
$numberOfRows = mysqli_num_rows($result);
if ($numberOfRows > 0) {

/* By changing Fred below to another specific persons name you can limit access to just the part of the database for that individual. You could eliminate WHERE recorder_id='Fred' all together if you want to give full access to everyone. */

$values = mysqli_query($dbc, "SELECT password FROM login WHERE username='".$username."'");
while ($rowr = mysqli_fetch_row($values)) {
 for ($j=0;$j<$numberOfRows;$j++) {
  $csv_output .= $rowr[$j]." ";
 }
 $csv_output .= "\n";
}
print $csv_output;
}
else{
 die("Username not found: " . mysqli_error($dbc));
 exit();
}
exit;
?>