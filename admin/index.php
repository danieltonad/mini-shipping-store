<?php
require_once '../controler/config.php';
$fetch = new controler();

$id = $fetch->getNoRow("SELECT * FROM items");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ShopNow</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--Bootstrap css -->
    <link rel="stylesheet" media="screen" href="../css/bootstrap.min.css">

    <!--Font-awesome -->
    <script src="./js/all.js"></script>

    <!--google-font-->
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">

    <!-- Font css -->
    <link rel="stylesheet" media="screen" href="../css/font.css">

    <!--index css-->
    <link rel="stylesheet" media="screen" href="../css/index.css">

    <!--Responsive css-->
    <link rel="stylesheet" media="screen" href="../css/indexResponsive.css">

    <!--404 css-->
    <link rel="stylesheet" media="screen" href="../css/admin.css">

    <!-- ico png here  -->
    <link rel="shortcut icon" href="images/ico.png" type="image/x-icon">

    <!--  scripts  end  -->
</head>

<body>
    <?php require_once('../plug/header.php') ?>

    <div class="container my-4 mx-auto">
        <div class="display-5" id="form">
            <label>Total Number Items (<?php echo $id; ?>)</label>
        </div>
        <div class="row m-0 mx-auto">

            <!-- Each Btn -->
            <div class="col-xl-4 col-lg-4 col-md-8 col-8 mx-auto my-2">
                <a href="new-item" id="btn">
                    Create Item
                </a>
            </div>

            <!-- Each Btn -->
            <div class="col-xl-4 col-lg-4 col-md-8 col-8 mx-auto my-2">
                <a href="#" onclick="popUpdate()" id="btn">
                    Update Item
                </a>
            </div>

            <!-- Each Btn -->
            <div class="col-xl-4 col-lg-4 col-md-8 col-8 mx-auto my-2">
                <a onclick="_Out()" href="items" id="btn">
                    View All Items
                </a>
            </div>
        </div>
    </div>

    <div id="update">
        <div class="col-xl-5 col-lg-6 col-md-6 col-sm-10 col-11 mx-auto">

            <div id="close" onclick="popOut()">&times;</div>
            <div class="container-fluid my-5">

                <div id="formPanel">

                    <div id="header" class="overide">
                        Update Item
                        <hr>
                    </div>

                    <!-- colect data -->
                    <div class="row" id="receive">
                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-10 col-11 mx-auto">
                            <div id="form">
                                <input type="text" name="" onkeyup="ErrHide()" id="track_id" placeholder="Enter track id">
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-8 col-8 mx-auto">
                            <button onclick="sendReq()" class="mx-auto" type="submit" id="alt-btn">view</button>
                        </div>
                    </div>

                    <!-- error -->
                    <div class="col-xl-6 col-lg-6 col-md-6 col col-9 mx-auto my-3" id="errorMsg">

                    </div>

                    <!-- update data -->
                    <div class="row my-3" id="send">

                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-10 col-11 mx-auto">
                            <div id="form">
                                <input type="text" name="" id="newLocation" placeholder="Enter New Location">
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-8 col-8 mx-auto">
                            <button onclick="updateReq()" class="mx-auto" type="submit" id="alt-btn">Update</button>
                        </div>
                    </div>




                </div>

            </div>

        </div>
    </div>



    <div class="position-fixed w-100" style="bottom: 0;">
        <?php require_once '../plug/footer.php' ?>
    </div>


    <script src="../js/axios.js"></script>
    <script src="../js/jquery3-5-1.js"></script>
    <script src="../js/controler.js"></script>

    <!-- get  time zone offset -->

</body>

</html>