<?php
// qrcode.php
include 'config.php';

if (isset($_POST['data']) and !empty($_POST['data'])) {

    $data = $_POST['data'];
    $title = $_POST['title'];
    $codigo = $_POST['codigo'];

    $data = $data.'/'.$title.'/'.$codigo;

    list($type, $data) = explode(';', $data);
    list(, $data)      = explode(',', $data);

    $data = base64_decode($data);

    $filename = 'images/' . time() . '.png';

    $sql    = "INSERT INTO `user` (`image`,`dato`,`codigo`) VALUES ('$filename','$title','$codigo')";

    $excute = mysqli_query($conn,$sql);

    $data = file_put_contents($filename, $data);

    if ($data) {
        echo json_encode(
            [   'status' => 'success',
                'url'     =>$filename
            ]
        );
    }else{
        echo json_encode(
            [
                'status' => 'error',
                'message'     => 'Do not store in folder'
            ]
        );
    }
}
?>