<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>021-Thunva Artkonghan</title>
    <style>
        body {
            background-image: url(https://static.thairath.co.th/media/dFQROr7oWzulq5Fa5K762bXRjF1hiCUmPbBdJ9h6NzgrWvzrSjdS66FZVYiWcBjUPkt.jpg);
        }
        </style>

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12"> <br>
                <h3><img src="./css/image/LOGOKaowtom.jpg" alt="LOGO" width="400" height="100">
<a href="index.php" class="btn btn-info float-end">กลับหน้าแรก</a>
                </h3> <br />
                <table id="PatientTable" class="display table table-striped  table-hover table-responsive table-bordered table-success table-striped">

                    <thead align="center">
                    <tr>
                            <th width="10%">รหัสอาหาร</th>
                            <th width="25%">ชื่ออาหาร</th>
                            <th width="10%">ราคา</th>
                            <th width="10%">ภาพ</th>
                            <th width="15%">เมนู</th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php
                        require 'connect.php';
                        $query = "SELECT * FROM food f,menu m WHERE m.Menu_ID = f.Menu_ID and f.Menu_ID = 3";
                        $stmt = $conn->prepare($query);
                        $stmt->execute();
                        $result = $stmt->fetchAll();
                        $stmt = $conn->prepare($query);

                        foreach ($result as $r) { ?>
                            <tr>
                                <td class="table-danger">
                                    <?= $r['Food_ID'] ?>
                                </td>
                                <td class="table-light">
                                    <?= $r['FoodName'] ?>
                                </td>
                                <td   class="table-warning">
                                    <?= $r['Price'] ?>
                                </td>
                                <td><img src="./css/image/<?= $r['Image'] ?>" width="150px" height="100" alt="image" onclick="enlargeImg()" id="img1"></td>
                                <td class="table-primary">
                                    <?= $r['Menu_Name'] ?>
                                </td>
                            
                                
                            </tr>
                        <?php }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#PatientTable').DataTable();
        });
    </script>
</body>

</html>