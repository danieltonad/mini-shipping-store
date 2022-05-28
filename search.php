<?php
require_once './controler/config.php';

if (!isset($_GET['tracker']))
    header('location: index');

$id = $_GET['tracker'];

if (!is_numeric($id))
    header('location: index');

$create = new controler;
if (!$create->check("SELECT item_id FROM items WHERE item_id = '$id'"))
    header('location: index');
?>

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


    <div class="container-fluid my-2 mb-5" id="searchResult">
        <div class="col-8 m-0 ml-3 p-3 mx-auto">
            <div class="mx-auto" id="title">
                Item Details
            </div>
        </div>

        <?php
        $fetch = $create->getData("SELECT * FROM items WHERE item_id = '$id'");

        while ($row = $fetch->fetch_assoc()) {

            ?>
            <div class="row m-0 p-0 my-2">
                <!-- item image -->
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-10 col-10 mx-auto">
                    <div class="mx-auto mt-2">
                        <?php
                        $ref = $row['item_image'];
                        $href = "";
                        $len = strlen($ref);
                        $i = 1;
                        while ($i < $len) {
                            $href .= $ref[$i];
                            $i++;
                        }
                        ?>
                        <img src="<?php echo './admin'.$href; ?>" alt="item" srcset="" id="item-img">
                    </div>

                </div>
                <!-- item details -->
                <div class="col-xl-5 col-lg-5 col-md-6 col-sm-10 col-10 mx-auto">

                    <div class="container my-3" id="item-info">



                        <div id="each-info">
                            <i class="fa fa-key fa-1x " id="icon"></i> Tracking code: <span id="info"> <?php echo $row['item_id']; ?> </span>
                        </div>

                        <div id="each-info">
                            <i class="fa fa-box fa-1x " id="icon"></i> Item : <span id="info"> <?php echo $row['item_name']; ?> </span>
                        </div>

                        <div id="each-info">
                            <i class="fa fa-tag fa-1x " id="icon"></i> Description: <span id="info"> <?php echo $row['item_desc']; ?> </span>
                        </div>

                        <div id="each-info">
                            <i class="fa fa-search-location fa-1x " id="icon"></i> Current Location: <span id="info"> <?php echo $row['item_c_location']; ?> </span>
                        </div>

                        <div id="each-info">
                            <i class="fa fa-location-arrow fa-1x " id="icon"></i> Destination: <span id="info"> <?php echo $row['item_desc']; ?> </span>
                        </div>
                    </div>

                <?php  }
            ?>
            </div>
        </div>

    </div>



    <?php require_once 'plug/footer.php' ?>
</body>

</html>