<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Add Food</title>
    <style>
        body{
    background-image: url('https://i.pinimg.com/originals/d8/9f/a3/d89fa383107571201d3b2673e4e9a51b.gif');
    background-size: cover;
    
    
    
    height: 100vh;
    padding:0;
    margin:0;
}
        </style>
    <style type="text/css">
        img {
            transition: fransform 0.25s ease;
        }

        img:hover {
            -webkit-transform: scale(1.5);
            transform: scale(1.5);
        }
    </style>
    <style>
div {
  width: 1300px;
  margin: auto;
  
}
</style>
</head>

<body>
    
    <?php
    
    require "connect.php";

    $sql_select = "SELECT * FROM  menu";
    $stmt_s = $conn->prepare($sql_select);
    $stmt_s->execute();

    if (isset($_POST["submit"])) {
        if (!empty($_POST['FoodName'])) {

            $uploadFile = $_FILES["Image"]["name"];
            $tmpFile = $_FILES["Image"]["tmp_name"];
            echo " upload file = " . $uploadFile;
            echo " tmp file = " . $tmpFile;

            $sql = "insert into food (FoodName, Price, Image, Menu_ID) values
            (:FoodName, :Price, :Image, :Menu_ID)";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":FoodName", $_POST["FoodName"]);
            $stmt->bindParam(":Price", $_POST["Price"]);
            $stmt->bindParam(":Image", $uploadFile);
            $stmt->bindParam(":Menu_ID", $_POST["Menu_ID"]);
            echo "image = " . $uploadFile;

            $fullpath = "./image/" . $uploadFile;
            echo " fullpath = " . $fullpath;
            move_uploaded_file($tmpFile, $fullpath);

            echo '
            <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
            ';

            try {
                if ($stmt->execute()) :
                    echo '
                    <script type="text/javascript">        
                        $(document).ready(function(){
                    
                            swal({
                                title: "Success!",
                                text: "Successfuly add food",
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
                    $message = "Fail to add new Food";
                endif;
            }catch (PDOException $e) {
                echo "Fail!" . $e;
            }
            $conn = null;
        }
    }
    ?>

    <div class="container">
        <div class="row" >
            <div class="col-md-4" style="background-color:#FFF2DC;" >
                     <h3>Form add Food</h3>
                <form action="addFood.php" method="POST" enctype="multipart/form-data">
                    <input type="text" placeholder="FoodName" name="FoodName" required>
                    <br><br>
                    <input type="number" placeholder="Price" name="Price" required>
                    <br><br>
                    <div>แนบรูป</div>
                    <input type="file" placeholder="Image" name="Image" required>
                    <br><br>
                    <label>เลือกประเภทอาหาร</label>
                    <select name="Menu_ID">
                        <?php
                            while ($drop = $stmt_s->fetch(PDO::FETCH_ASSOC)) :
                        ?>
                        <option value="<?php echo $drop["Menu_ID"]; ?>">
                                <?php echo $drop["Menu_Name"]; ?>
                        </option>
                        <?php endwhile; ?>
                    </select>
                    <br><br>
                    <input type="submit" value="Submit" name="submit">
                    <br><br>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#customerTable').DataTable();
        });
    </script>


</body>
</html>