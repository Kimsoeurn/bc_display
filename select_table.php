<?php
require_once "phpconfig.php";
require_once "time1.php";
require_once "core.php";

if ( isset($_POST) && !empty($_POST) ){
    $strSQL = "UPDATE table_detail SET status ='0' ";
    mysqli_query( $GLOBALS['db'], $strSQL ) or die ( "Can not insert data") . mysqli_error();

    $b = time ();
    $date2=date("Y-m-d",$b);
    $id = $_POST['table_num'] -1;
    $strSQL2 = "SELECT * FROM  table_config where bg_img ='GDC' LIMIT $id , 1  ";
    $row = sql_query($strSQL2);
    $table_name = $row['table_name'];
    $shoe = $row['shoe'];
    $bet_max = $row['bet_max'];
    $bet_min = $row['bet_min'];
    $tie_max = $row['tie_max'];
    $tie_min = $row['tie_min'];
    $pair_max = $row['pair_max'];
    $pair_min = $row['pair_min'];
    $strSQL = "INSERT INTO table_detail (table_no,shoe_no,bet_max,bet_min,tie_max,tie_min,pair_max,pair_min,round_date,status) 
                    VALUES ('$table_name','$shoe','$bet_max','$bet_min','$tie_max','$tie_min','$pair_max,'$pair_min','$date2','1')";
    mysqli_query( $GLOBALS['db'], $strSQL )or die ( "Can not insert data") . mysqli_error();
    $tb99 = $row['table_name'];
    $bet =$row['bet_max'];
    $shoe = $_POST['shoe'] ?? 1;
    header("Location:main.php?table_num=$tb99&bet_max=$bet&shoe=$shoe");
    exit();
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Baccarat Display Select Table</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="mylayout.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="main.css" type="text/css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <style type="text/css">
        body {
            font-family: 'Kanit', sans-serif !important;
        }
    </style>


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        html,
        body {
            height: 100%;
        }

        body {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            /*background-color: #f5f5f5;*/
            color: #ffffff !important;
        }

        .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
        }
        .form-signin .checkbox {
            font-weight: 400;
        }
        .form-signin .form-control {
            position: relative;
            box-sizing: border-box;
            height: auto;
            padding: 10px;
            font-size: 16px;
        }
        .form-signin .form-control:focus {
            z-index: 2;
        }
        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }
        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
</head>
<body class="text-center container">
    <table class="table table-striped bg-white">
        <caption class="text-white text-center" style="caption-side: top; font-size: 28px;">Select Table Option</caption>
        <thead>
        <tr>
            <th>NO</th>
            <th>BET MIN</th>
            <th>BET MAX</th>
            <th>PAIR MIN</th>
            <th>PAIR MAX</th>
            <th>TIE MIN</th>
            <th>TIE MAX</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i=0;
        $strSQL = "SELECT * FROM  table_config where bg_img ='GDC'  group by bet_min order by bet_min ";
        $objQuery = mysqli_query($GLOBALS['db'], $strSQL);
        while($objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC))
        {
        $i++;
        ?>
            <tr>
                <td><?= $i ?></td>
                <td><?= number_format($objResult['bet_min']) ?></td>
                <td><?= number_format($objResult['bet_max']) ?></td>
                <td><?= number_format($objResult['pair_min']) ?></td>
                <td><?= number_format($objResult['pair_max']) ?></td>
                <td><?= number_format($objResult['tie_min']) ?></td>
                <td><?= number_format($objResult['tie_max']) ?></td>
                <td>
                    <a href="#" class="btn btn-sm btn-primary">Select</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</body>
</html>