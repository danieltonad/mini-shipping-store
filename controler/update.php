<?php
require_once '../controler/config.php';

$_POST = json_decode(file_get_contents("php://input"), true);

 if(isset($_POST['data'])) {
     $id = $_POST['data'];

        if(!is_numeric($id)){
            echo "error"; exit();
        }
     
        $fetch = new controler();
        $check = $fetch->check("SELECT item_id FROM items WHERE item_id = '$id'");
        if($check) {
            echo $id;
        }
        else{
            echo "error";
        }
 }

if (isset($_POST['location'])) {
    $c_loc = $_POST['location'];
    $id = $_POST['data'];
    $fetch = new controler();
    $check = $fetch->insert("UPDATE items SET item_c_location ='$c_loc' WHERE item_id = '$id'");
    if ($check) {
        echo "200";
    } else {
        echo "404";
    }
}

if (isset($_POST['search'])) {
    $id = $_POST['search'];

    if(is_numeric($id)) {

    $fetch = new controler();
    $check = $fetch->check("SELECT item_id FROM items WHERE item_id = '$id'");
    if ($check) {
        echo "sucess";
    } else {
        echo "error";
    }
  }
  else{
      echo "error";
  }

}
?>