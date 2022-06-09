<?php
require_once "method_mobil.php";
$mobil = new Mobil();

    $request_method=$_SERVER["REQUEST_METHOD"];
    switch ($request_method) {
        case 'GET':
            if(!empty($_GET["id"]))
            {
                $id=intval($_GET["id"]);
                $mobil->get_mobil1($id);
            }
            else
            {
                $mobil->get_mobil();
            }
            break;
            case 'POST':
                if(!empty($_GET["id"]))
                {   
                    $id=intval($_GET["id"]);
                    $mobil->update_mobil($id);
                }
            else
                {
                    $mobil->tambah_mobil();
                }
            break;
        case 'DELETE':
            $id=intval($_GET["id"]);
            $pengguna->hapus_pengguna($id);
            break;
        default:
// Invalid Request Method
    header("HTTP/1.0 405 Method Not Allowed");
        break;
    break;
}
?>