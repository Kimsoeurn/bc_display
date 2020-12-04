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
        .container {
            width: 768px;
        }
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
</head>
<body class="container">
<form>
<div class="mx-auto text-center">
    <img src="images/LOGO_GDC.png" class="img-fluid mx-auto" width="180px" align="logo">
</div>
<fieldset>
    <legend class="text-center">Table Setting</legend>
</fieldset>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="table-number">Table Number</label>
        <input type="text" class="form-control" id="table-number" required value="T001" name="table_no">
    </div>
    <div class="form-group col-md-6">
        <label for="shoe-count">Shoe Count</label>
        <input type="number" class="form-control" id="shoe-count" required value="1" name="shoe_no">
    </div>
    <div class="form-group col-md-6">
        <label for="table-minimum">Table Minimum</label>
        <input type="number" class="form-control" id="table-minimum" required value="25" name="bet_min">
    </div>
    <div class="form-group col-md-6">
        <label for="table-maximum">Table Maximum</label>
        <input type="number" class="form-control" id="table-maximum" required value="4000" name="bet_max">
    </div>
    <div class="form-group col-md-6">
        <label for="tie-minimum">Tie Minimum</label>
        <input type="number" class="form-control" id="tie-minimum" required value="10" name="tie_min">
    </div>
    <div class="form-group col-md-6">
        <label for="tie-maximum">Tie Maximum</label>
        <input type="number" class="form-control" id="tie-maximum" required value="500" name="tie_max">
    </div>
    <div class="form-group col-md-6">
        <label for="pairs-minimum">Pairs Minimum</label>
        <input type="number" class="form-control" id="pairs-minimum" required value="10" name="pair_min">
    </div>
    <div class="form-group col-md-6">
        <label for="pairs-maximum">Pairs Maximum</label>
        <input type="number" class="form-control" id="pairs-maximum" required value="200" name="pair_max">
    </div>
    <div class="form-group col-md-12">
        <button class="btn btn-danger" type="reset">Reset</button>
        <button class="btn btn-success" type="submit" name="save">Save</button>
    </div>
</div>
</form>
</body>
</html>