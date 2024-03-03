<?php

if (isset($_POST['Food_ID']) && isset($_POST['FoodName']) && isset($_POST['Price']) && isset($_POST['Menu_ID'])) {
    require 'connect.php';

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $FoodID = $_POST['Food_ID'];
    $FoodName = $_POST['FoodName'];
    $FoodPrice =  $_POST['Price'];
    $MenuID =  $_POST['Menu_ID'];

    echo 'Food_ID = ' . $FoodID;
    echo 'FoodName = ' . $FoodName;
    echo 'Price = ' . $FoodPrice;
    echo 'Menu_ID = ' . $MenuID;

    $sql = "UPDATE food SET FoodName = :FoodName, Price = :Price , Menu_ID = :Menu_ID WHERE Food_ID = :Food_ID";
    $stmt = $conn->prepare($sql);
    
    $stmt->bindParam(':FoodName', $_POST['FoodName']);
    $stmt->bindParam(':Price', $_POST['Price']);
    $stmt->bindParam(':Food_ID', $_POST['Food_ID']);
    $stmt->bindParam(":Menu_ID", $_POST["Menu_ID"]);

    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

    if ($stmt->execute()) {
        echo '
        <script type="text/javascript">
        
        $(document).ready(function(){
        
            swal({
                title: "Success!",
                text: "Successfuly update food ",
                type: "success",
                timer: 2500,
                showConfirmButton: false
              }, function(){
                    window.location.href = "admin.php";
              });
        });
        
        </script>
        ';
    }
    $conn = null;
}