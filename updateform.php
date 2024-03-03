<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Update Food </title>
    <style>
        body {
            background-image: url(https://th.bing.com/th/id/OIG2.rM9eahUyewa_hA4bYMAR?w=1024&h=1024&rs=1&pid=ImgDetMain);
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
    require 'connect.php';

    $sql_select = 'SELECT * From food ORDER BY Food_ID';
    $stmt_s = $conn->prepare($sql_select);
    $stmt_s->execute();
    //echo "Food_ID = ".$_GET['Food_ID'];

    if (isset($_GET['Food_ID'])) {
        $sql_select_customer = 'SELECT * FROM food  WHERE Food_ID=?';
        $stmt = $conn->prepare($sql_select_customer);
        $stmt->execute([$_GET['Food_ID']]);
        //echo "get = ".$_GET['Food_ID'];
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    }

?>
<?php   $sql_d = "SELECT * FROM  menu  " ;
    $stmt_d = $conn->prepare($sql_d);
    $stmt_d->execute();?>
    
<div class="container">
      <div class="row">
        <div class="col-md-4"> <br>
          <h3>ฟอร์มแก้ไขข้อมูลอาหาร</h3>
          <form action="update.php" method="POST">
           <input type="hidden" name="Food_ID" value="<?= $result['Food_ID'];?>">
            
                <label for="name" class="col-sm-2 col-form-label"> ชื่อ:  </label>
              
                <input type="text" name="FoodName" class="form-control" required value="<?php echo $result["FoodName"]; ?>">           
           
            
                <label for="name" class="col-sm-2 col-form-label"> ราคา :  </label>
             
                <input type="number" name="Price" class="form-control" required value="<?php echo $result["Price"] ?>">
                
                <label>เลือกประเภทอาหาร</label>
                    <select name="Menu_ID">
                        <?php
                            while ($drop = $stmt_d->fetch(PDO::FETCH_ASSOC)) :
                        ?>
                        <option value="<?php echo $drop["Menu_ID"]; ?>">
                                <?php echo $drop["Menu_Name"]; ?>
                        </option>
                        <?php endwhile; ?>
                    </select>
          
            <br> <button type="submit" class="btn btn-primary">แก้ไขข้อมูล</button>
          </form>
        </div>
      </div>
    </div>

  </body>
</html>