<?php

require('connect.php');


$sql = "DELETE FROM food WHERE Food_ID = :Food_ID";
$stml = $conn->prepare($sql);
$stml->bindParam(':Food_ID', $_GET["Food_ID"]);
 echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
    
if($stml->execute()) :
    
        $message = "Successfully delete food".$_GET['Food_ID'].".";
           echo '
        <script type="text/javascript">
        $(document).ready(function(){

            swal({
                title: "Success!",
                text: "Successfuly delete food",
                type: "success",
                timer: 2500,
                showConfirmButton: false
            }, function(){
                    window.location.href = "admin.php";
            });
        });
        </script>
        ';


else :
    $message = "Fail to delete food information.";
endif;
$conn = null;



?>