<!DOCTYPE html>
<html lang="en">
<head>
<style>
        body{
    background-image: url('https://i.pinimg.com/originals/cc/a9/3f/cca93fc05528b1cd7e25c931273f6994.gif');
    background-size: cover;
    
    
    
    height: 100vh;
    padding:0;
    margin:0;
}
        </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>021-Thunva Artkonghan</title>
    <nav id="home"> 
        <div class="container">
        <div class="row">
            <div class="col-md-12"> <br>
      <ul><h1>ประเภทอาหาร</h1> 
      
       <a href="food.php" class="btn btn-success">ข้าวต้ม</a>
        <a href="food2.php" class="btn btn-warning">กับข้าว</a>
        <a href="Drink.php"class="btn btn-danger">เครื่องดื่ม</a>
    <h2>ระบบหลังบ้าน</h2>
    <a href="admin.php" class="btn btn-primary">แก้ไขข้อมูล</a>
      
</ul>
    </nav>
</div></div><div>
</head>
<body>
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#PatientTable').DataTable();
        });
    </script>
</body>
</html>