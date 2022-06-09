<?php
require_once "method_pengguna.php";
$pengguna = new Pengguna();

    $request_method=$_SERVER["REQUEST_METHOD"];
    switch ($request_method) {
        case 'GET':
            if(!empty($_GET["id"]))
            {
                $id=intval($_GET["id"]);
                $pengguna->get_customer1($id);
            }
            else
            {
                $pengguna->get_customer();
            }
            break;
            case 'POST':
                if(!empty($_GET["id"]))
                {   
                    $id=intval($_GET["id"]);
                    $pengguna->update_customer($id);
                }
            else
                {
                    $pengguna->daftar_customer();
                    // $wishlist->insert_pengguna();
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