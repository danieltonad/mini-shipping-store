<?php

class tools 
{
    // Number generator
  function genId($len,$sub)
    {
        
      

        $id = "";
        $i = 0;

        while ($i < $len) {
            $id .= mt_rand(0, 9);
            $i++;
        }

        $id = $id.$sub;

        return $id;
    }



    // Alphanumeric generator

    function genTransId($len)
    {
        $a = 'aBcDeFghIJ';
        $_a = 'AbCdEfGHjx';
        $b = 'klmnopQrpR';
        $_b = 'STUVwXYzZM';
        $l = '1234567890';
        #fucking id
        $id = "";
        $counter = 0;

        while ($counter < $len) {

            $id .= $b[mt_rand(0, 9)];
            $id .= $_a[mt_rand(0, 9)];
            $id .= $l[mt_rand(0, 9)];
            $id .= $a[mt_rand(0, 9)];
            $id .= $_b[mt_rand(0, 9)];
            # Checker
            if ($counter != $len - 1)
                $id .= '-';
            else { }

            $counter++;
        }

        // regroup id

        return $id;
    }



    // Zero function
    function Zero($no)
    {
        return '0.00';
    }

    // display accurate timeZone
    function accurate_date($timestamp, $dateFormat, $offset)
    {
        // convert js Offset to Sec
        $offset *= 60;

        // Set program time to GMT+00:00
        // $set = date_default_timezone_set('Africa/Accra');

        // Add user GMT
        $timestamp +=  $offset;

        return date($dateFormat, $timestamp);
    }
 
    function validateImage($name,$max_size=5){
        $max_size *=  (1024 * 1024);
        $size = $_FILES[$name]["size"];
        $file_tmp = $_FILES[$name]["tmp_name"];
        $check = @getimagesize($file_tmp);
            if($check && $max_size>=$size)
                return true;
            else{
                return false;
            }
    }
}



?>