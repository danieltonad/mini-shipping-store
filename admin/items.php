<?php require_once '../controler/config.php'; ?>

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
        <div class="mx-auto" id="header">
            All Items
            <hr class="mx-auto">
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead style="letter-spacing:1.2px; font-weight:300; background:#A0467E; color:white">
                    <th>Date</th>
                    <th>track id</th>
                    <th> item name</th>
                    <th colspan="2"> Destination</th>
                </thead>

                <?php
                $fetch = new controler();
                $count =   $fetch->check("SELECT item_id FROM items ORDER BY item_date");
                $details = $fetch->getData("SELECT * FROM items ORDER BY item_date DESC");

                if ($count) {
                    while ($row = $details->fetch_assoc()) {
                        ?>

                        <tbody class="table-bordered">

                            <tr>
                                <td> <?php echo $fetch->accurate_date($row['item_date'], 'M-Y h:i A', -60) ?> </td>
                                <td> <?php echo $row['item_id'] ?> </td>
                                <td> <?php echo $row['item_name'] ?> </td>
                                <td> <?php echo $row['item_desc'] ?> </td>
                                <td> <a href="edit?tracker=<?php echo $row['item_id'] ?>" id="ico"> <i class="fa fa-edit fa-1x "></i> edit </a> </td>
                            </tr>
                        <?php   }
                    $details->free();
                } else { ?>
                        <tr>
                            <td class="display-5 text-center" colspan="5"> No item Created </td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>



    <?php require_once '../plug/footer.php' ?>
</body>

</html>