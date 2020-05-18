<?php

$link = mysqli_connect("localhost", "root", "", "dbakademik");

$nim = $_POST['txtnim'];
$nama = $_POST['txtnama'];
$umur = $_POST['txtumur'];
$email = $_POST['email'];
$hp = $_POST['hp'];
$gender = $_POST['gender'];

 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt insert query execution
$sql = "INSERT INTO mahasiswa (Nim, Nama, Umur, email, hp, gender) VALUES ('$nim', '$nama', $umur, '$email','$hp', '$gender')";
if(mysqli_query($link, $sql)){
    echo "Records inserted successfully.";
    
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}


 
// Close connection
mysqli_close($link);
?>