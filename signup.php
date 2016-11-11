<?php

DEFINE ('DBUSER', ''); 
DEFINE ('DBPW', ''); 
DEFINE ('DBHOST', ''); 
DEFINE ('DBNAME', ''); 

$username = $_GET["username"];
$nama = $_GET['nama'];
$nim = $_GET['nim'];
$pass = $_GET['pass'];
$jns = $_GET['jns'];

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

$values = mysqli_query($dbc, "INSERT INTO login (username, password) VALUES ('".$username."','".$pass."') ");
$values2 = mysqli_query($dbc, "INSERT INTO mahasiswa (NIM,nama,username,jenis_akun) VALUES ('".$nim."','".$nama."','".$username."','".$jns."') ");

exit;
?>