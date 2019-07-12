<?php
    $servername = "localhost";
    $username = "id10064942_gopal";
    $password = "Gopal#362";

    $conn = mysqli_connect($servername, $username,$password);
    mysqli_select_db($conn,"id10064942_crud_tsf");
    if(!$conn)
     echo "Not Connected" ; 
?>