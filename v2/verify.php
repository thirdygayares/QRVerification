<?php

$server = "localhost";
    $dbusername ="root";
    $dbpassword ="";
    $dbname ="test1";

$conn = new mysqli($server, $dbusername, $dbpassword, $dbname);


if($conn->connect_error){
        die('Connection Failed : '.$conn->connection_error);
    }

$statusStud = "dsdsdsd";
if(isset($_POST['scanned'])){

    $text = $_POST['scanned'];
    $sql = "INSERT INTO mmuscanned(mmuscanned) VALUES ('$text')";
    if($conn->query($sql) === TRUE){
        echo "Successfully Inserted";
    }else{
        echo "Error: " .$sql . "<br>" . conn-> error;
    }


    $verify = "SELECT INTO mmuscanned(mmuscanned) VALUES ('$text')";


     $verify= $conn->query("SELECT name FROM audience WHERE name = '$text' ");
        if($verify->num_rows >=1 )
        {
          $statusStud =  "Welcome Heron!";
        }
        else
        {
          $statusStud =  "Invalid QR Code - not registered";
        }
      

    header("location: index.php");
}
$conn -> close();

?>