<?php

require_once('pages-gallery-connectdb.php');

            $target_dir = "../public/assets/images/gallery/";
            $target_file = $target_dir . $_FILES['file_name']['name'];
            $msg = '';

            srand((float)microtime() * 10000000);
            $str = 'abcdefghijklmnopqrstuvwxyz0123456789'; //string ที่เป็นไปได้ที่จะใช้ในการ random ซึ่งสามารถเพิ่มลดได้ตามความต้องการ
            $passw = str_shuffle($str);
            $str_result = "";  //สตริงว่างสำหรับจะรับค่าจากการ random
            $str_result .= substr($passw, 1, 20); //ต่อ string จาก substring ที่ได้จากการ random ตำแหน่ง ทีละ 1 ตัว 
            //จนกว่าจะครบตรามความยาวที่ส่งมา

              $file_name = explode(".", $_FILES['file_name']['name']);
              $allowed_ext = array("jpg", "jpeg", "png", "gif");
              $new_name = $str_result . '.' . $file_name[1];
              $sourcePath = $_FILES['file_name']['tmp_name'];
              //echo  $dir = $_GET['dir'];
              $target_file = '../public/assets/images/gallery/' . $new_name;

            if (move_uploaded_file($_FILES['file_name']['tmp_name'], $target_file)) 
            {
              //$date_n = date('Y-m-d');
              //$hour = date('H:i:s');
                  $sql = "INSERT INTO files (file_name, uploaded_on) VALUES ('" . $new_name . "', NOW())";
                  $insert = mysqli_query($conn, $sql);
s              //mysql_query($insert);
            } else
             {
              $msg = 'Error while uploading.';
            }
            echo $msg;
exit;
?>

<?php
/*$target_dir = "../public/assets/images/gallery/";
$target_file = $target_dir.$_FILES['file']['name'];*/
// $msg = '';

// srand((double)microtime()*10000000);
// $str = 'abcdefghijklmnopqrstuvwxyz0123456789'; //string ที่เป็นไปได้ที่จะใช้ในการ random ซึ่งสามารถเพิ่มลดได้ตามความต้องการ
// $passw = str_shuffle($str);
// $str_result = "";  //สตริงว่างสำหรับจะรับค่าจากการ random
// $str_result .= substr($passw ,1,20); //ต่อ string จาก substring ที่ได้จากการ random ตำแหน่ง ทีละ 1 ตัว 
//                            //จนกว่าจะครบตรามความยาวที่ส่งมา
//   echo  $count = count($_FILES['file']['name']);
//     for($i=1;$i<$count;$i++){
//       $file_name = explode(".", $_FILES['file']['name'][$i]);  
//       $allowed_ext = array("jpg", "jpeg", "png", "gif");  
//            $new_name = $str_result . '.' . $file_name[1];  
//            $sourcePath = $_FILES['file']['tmp_name'][$i];  
// //echo  $dir = $_GET['dir'];
//            $target_file = '../public/assets/images/gallery/'.$new_name;  



//       if(move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_file)){ 
//       //$date_n = date('Y-m-d');
//       //$hour = date('H:i:s');
//       $sql = "INSERT INTO files (file_name, uploaded_on) VALUES ('".$new_name."', NOW())"; 
//       $insert = mysqli_query($conn, $sql);
//           // header('location: pages-galler.php'
//       }
//     }

// echo $msg;
// exit;
?>