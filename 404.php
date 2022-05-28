<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ShopNow</title>
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
    <link rel="stylesheet" media="screen" href="./css/indexResponsive.css">

    <!--404 css-->
    <link rel="stylesheet" media="screen" href="./css/404.css">

    <!-- ico png here  -->
    <link rel="shortcut icon" href="images/ico.png" type="image/x-icon">

    <!--  scripts  end  -->
</head>

<body>
    <?php require_once('plug/header.php') ?>


    <div class=" mt-5 col-8 mx-auto">

        <div class=" my-5 mt-3 mx-auto w-100 text-center">
            <i style="color: #49808B !important;" class="fa fa-cog fa-spin fa-8x mx-auto">
            </i>
            <div class="text-lead" style="font-size: 2rem; color:#A0467E">
                Requested Page Not found
            </div>
        </div>
    </div>



    
    <div class="position-fixed w-100" style="bottom: 0;">
        <?php require_once 'plug/footer.php' ?>
    </div>
</body>

</html>