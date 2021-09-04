<?php
// if(!empty($_POST['data'])){
//     $data = base64_decode($_POST['data']);
//     // print_r($data);
//     file_put_contents( "./upload/form_js_1.pdf", $data );
//     echo "success";
// } else {
//     echo "No Data Sent";
// }

$pass = "./upload/";

move_uploaded_file( $_FILES['pdf']['tmp_name'], $pass.$_POST['name'].'.pdf');

?>