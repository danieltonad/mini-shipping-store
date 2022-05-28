<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="googlebot">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--Bootstrap css -->
    <link rel="stylesheet" media="screen" href="./css/bootstrap.min.css">

    <!--Font-awesome -->
    <script src="./js/all.js"></script>

    <!--google-font-->
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">

    <!-- Font css -->
    <link rel="stylesheet" media="screen" href="./css/font.css">

    <!--index css-->
    <link rel="stylesheet" media="screen" href="./css/index.css">

    <!--Responsive css-->
    <link rel="stylesheet" media="screen" href="">

    <!-- ico png here  -->
    <link rel="shortcut icon" href="images/ico.png" type="image/x-icon">

    <!--  scripts  end  -->
</head>

<body>

    <!-- Header -->
    <?php require_once('plug/header.php') ?>

    <!-- search box -->
    <div class="col-xl-6 col-lg-6 col-md-8 col-sm-10 col-10 mx-auto mt-3">
        <div class="m-0 pt-3 pb-1" id="title">
            Track Item
        </div>
        <div id="per-input">
            <!-- error -->
            <div class="mx-auto mb-2" id="error"></div>
            <div id="searchBox" class="mx-auto">
                <input class="mx-auto" placeholder="Track item" type="text" name="" id="sBox">
            </div>

        </div>

        <div id="per-input">
            <button type="submit" id="searchBtn"> Search </button>
        </div>

    </div>


    <!-- search result -->






    <!-- FOOTER -->
    <div class="position-fixed w-100" style="bottom: 0;">
        <?php require_once 'plug/footer.php' ?>
    </div>


    <!-- include script  -->
    <script src="./js/jquery3-5-1.js"></script>

    <script src="./js/axios.js"></script>
    <script src="./js/jquery3-5-1.js"></script>
    <script src="./js/controler.js"></script>
</body>