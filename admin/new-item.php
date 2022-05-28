<?php require_once '../controler/config.php'; ?>

<!-- new item -->
<?php
$error = "";
$name;
$desc;
$c_loc;
$dest;
if (isset($_POST['create'])) {
    $create = new  controler;
    $name = $_POST['item-name'];
    $desc = $_POST['description'];
    $c_loc = $_POST['c_location'];
    $dest = $_POST['destination'];
    $date = time();
    $id = $create->uniqueId('0', 10, 'items', 'item_id');

    $image = $create->validateImage('item-img', 10);

    if ($image) {
        // File 
        $dir = "./items-image/";
        $path = $dir . basename($id . '.jpg');
        $img_tmp = $_FILES['item-img']['tmp_name'];

        if (!empty($name) && !empty($desc) && !empty($dest)) {
            //move file
            $do = move_uploaded_file($img_tmp, $path);
            if ($do && !$create->check("SELECT item_id FROM items WHERE item_name = '$name' AND item_desc = '$desc' ")) {
                // save details
                $insert = $create->insert("INSERT INTO items(item_id,item_name,item_desc,item_c_location,item_dest,item_image,item_date) 
                VALUES('$id','$name','$desc','$c_loc','$dest','$path','$date')");


                if ($insert && $do) {
                    $error = "Item sucessfully created <br> Track Code : $id";
                    unset($name, $c_loc, $desc, $date, $dest);
                } else {
                    $error = "Unable to create item";
                    var_dump($insert);
                }
            } else {
                $error = "Unable to create item";
            }
        } else {
            $error = "Unable to create item <br> Fill requested details";
        }
    } else {
        $error = "Unable to create item <br> Ivalid Image Detected";
    }
    unset($create);
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

    <div class="container my-4">

        <div class="mx-auto my-2" id="header">
            Create Item
            <hr class="mx-auto">
        </div>

        <div class="m-0 mx-auto p-3 col-xl-6 col-lg-6 col-md-8 col-sm-9 col-11" id="formPanel">

            <form action="" method="post" enctype="multipart/form-data">
                <div style="etter-spacing:1.2px; color: crimson; font-size: 1.1rem"> <?php echo $error; ?> </div>

                <div class=" mx-auto px-auto" id="form">


                    <label>
                        Item name:
                    </label>
                    <input type="text" name="item-name" value="<?php if (!empty($name)) echo $name; ?>" id="item-name" placeholder="required *" required>

                </div>

                <div class="mx-auto px-auto" id="form">

                    <label>
                        Description:
                    </label>
                    <textarea name="description" rows="2" id="item-name" placeholder="required *" required>
                                <?php if (!empty($desc)) echo $desc; ?>
                        </textarea>

                </div>

                <div class="mx-auto px-auto" id="form">

                    <label>
                        Current Location:
                    </label>
                    <input type="text" name="c_location" value="<?php if (!empty($c_loc)) echo $c_loc; ?>" id="item-name" placeholder="(optional)">


                </div>


                <div class="mx-auto px-auto" id="form">

                    <label>
                        Destination:
                    </label>
                    <input type="text" name="destination" value="<?php if (!empty($dest)) echo $dest; ?>" id="item-name" placeholder="required *" required>


                </div>


                <div class="mx-auto px-auto" id="form">

                    <label>
                        Item Image
                    </label>

                    <label for="item-img" id="import">
                        <i style="color: #1A2B70;" class="fa fa-upload fa-1x mr-3"></i>
                        <span>Select Image</span>
                    </label>
                    <input type="file" name="item-img" id="item-img" onchange="validateImage()" required>


                </div>

                <div class="mx-auto px-auto" id="form">
                    <button type="submit" name="create" id="btn"> submit </button>
                </div>

            </form>


        </div>
    </div>



    <?php require_once '../plug/footer.php' ?>
    <script src="../js/axios.js"></script>
    <script src="../js/jquery3-5-1.js"></script>
    <script src="../js/controler.js"></script>
</body>

</html>