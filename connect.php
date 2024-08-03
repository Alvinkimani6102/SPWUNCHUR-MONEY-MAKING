<?php
$Username=$_POST['Username'];
$Email=$_POST['Email'];
$Password=$_POST['Password'];

$conn = new mysqli('localhost','root','Registration');
if($conn->connect_errno){
    die('connection failed:'.$conn->connect_error);

}
 else{
    $stm=$conn->prepare("insert into registration(Username,Email,Password) values(?,?,?)");
    $stmt->bind_param("sss",$Username,$Email,$Password);
    $stmt->execute();
    echo "registration successfully";
    $stmt->close();
    $conn->close();

 }
?>