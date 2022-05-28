<?php require_once '../controler/config.php'; ?>

<!-- security -->
<?php
if (!isset($_GET['tracker']))
    header("Location: ../admin");

// genue id
$fetch = new controler();
$id = $_GET['tracker'];
if (!$fetch->check("SELECT item_id FROM items WHERE item_id='$id'"))
    header("Location: ../admin");

$error = "";


// Update
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $c_loc = $_POST['location'];
    $desc = $_POST['desc'];
    $dest = $_POST['dest'];
    if (!empty($name) && !empty($c_loc) && !empty($desc) && !empty($dest)) {
        $update = $fetch->insert("UPDATE items SET item_name = '$name', item_c_location = '$c_loc', item_dest = '$dest', item_desc = '$desc' WHERE item_id = '$id'");
        if ($update)
            $error = "Item Updated sucessfully !! ";
        else
            $error = "Unable to Update Item !! ";
    } else {
        $error = "Unable to Update Item ";
    }
}

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

    <div class="container-fluid my-4 ">
        <div class="mx-auto" id="header">
            Edit Item
            <hr class="mx-auto">
        </div>

        <div class="col-xl-6 col-lg-6 col-md-8 col-sm-10 col-11 mx-auto">

            <!-- Fetch items -->
            <?php
            $fetch = new controler();

            $details = $fetch->getData("SELECT * FROM items WHERE item_id = '$id'");

            while ($row = $details->fetch_assoc()) {
                ?>

                <div id="formPanel">
                    <div class="row m-0 p-0 my-2">
                        <!-- item image -->
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mx-auto">
                            <div class="mx-auto mt-2">
                                <img src="<?php echo $row['item_image']; ?>" alt="item" srcset="" id="item-img">
                            </div>

                        </div>


                        <!-- item details -->
                        <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12 mx-auto">

                            <form action="" method="post">

                                <div class="mx-auto text-center" id="form">
                                    <label> <?php echo $row['item_id']; ?></label>
                                </div>

                                <div style="etter-spacing:1.2px; color: crimson; font-size: 1.1rem"> <?php echo $error; ?> </div>

                                <div class="" id="form">
                                    <label for="">Item name</label>
                                    <input type="text" name="name" value="<?php echo $row['item_name'] ?>" placeholder="item name" required>
                                </div>

                                <div class="mt-2" id="form">
                                    <label for="">Item description </label>
                                    <input type="text" name="desc" value="<?php echo $row['item_desc'] ?>" placeholder="item description" required>
                                </div>

                                <div class="mt-2" id="form">
                                    <label for="">current location </label>
                                    <input type="text" name="location" value="<?php echo $row['item_c_location'] ?>" placeholder="item current location" required>
                                </div>

                                <div class="mt-2" id="form">
                                    <label for="">Item destination</label>
                                    <input type="text" name="dest" value="<?php echo $row['item_dest'] ?>" placeholder="item destination" required>
                                </div>

                                <div class="mt-2" id="form">
                                    <button type="submit" id="alt-btn" name="update">Update</button>
                                </div>
                            <?php }  ?>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>



    <?php require_once '../plug/footer.php' ?>
</body>

</html>