<?php 

require_once "koneksi.php";

Class Pengguna{
    public function get_customer(){
        global $mysqli;
        $query = "SELECT * FROM customer";
        $data=array();
        $result=$mysqli->query($query);
        while($row=mysqli_fetch_object($result))
        {
            $data[]=$row;
        }
        $response=array(
            'status'=>1,
            'message'=>'Get Customer Berhasil',
            'data'=> $data
        );
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    
    public function get_customer1($id=0){
        global $mysqli;
        // $query="SELECT * FROM laptop";
        if($id !=0)
        {
            $query ="SELECT * FROM customer WHERE id_customer= ".$id." LIMIT 1";
        }
        $data=array();
        $result=$mysqli->query($query);
        while($row=mysqli_fetch_object($result))
        {
            $data[]=$row;
        }
        $response=array(
            'status' => 200,
            'message'=> "Get Customer Berhasil",
            'data' => $data
        );
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    public function daftar_customer()
    {
        global $mysqli;
        $arrcheckpost = array('id_customer' => '', 'nama_customer' => '','username' => '', 'password' => '', 'alamat_customer' => '', 'notlp_customer' => '');
        $hitung = count(array_intersect_key($_POST, $arrcheckpost));
            if($hitung == count($arrcheckpost)){
            $result = mysqli_query($mysqli, "INSERT INTO customer SET
            id_customer = '$_POST[id_customer]',
            nama_customer = '$_POST[nama_customer]',
            username = '$_POST[username]',
            password = '$_POST[password]',
            alamat_customer = '$_POST[alamat_customer]',
            notlp_customer = '$_POST[notlp_customer]'");
                if($result)
            {
                $response=array(
                'status' => 1,
                'message' =>'Customer Berhasil Ditambahkan'
                );
             }
            else
            {
                $response=array(
                'status' => 0,
                'message' =>'Customer Gagal Ditambahkan'
                );
            }
            }else{
                $response=array(
                'status' => 0,
                'message' =>'Parameter Tidak Sesuai'
                );
            }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    public function update_customer($id)
    {
        global $mysqli;
        $arrcheckpost = array('id_customer' => '', 'nama_customer' => '','username' => '', 'password' => '', 'alamat_customer' => '', 'notlp_customer' => '');
        $hitung = count(array_intersect_key($_POST, $arrcheckpost));
        if($hitung == count($arrcheckpost)){

            $result = mysqli_query($mysqli, "UPDATE customer SET
            id_customer = '$_POST[id_customer]',
            nama_customer = '$_POST[nama_customer]',
            username = '$_POST[username]',
            password = '$_POST[password]',
            alamat_customer = '$_POST[alamat_customer]',
            notlp_customer = '$_POST[notlp_customer]'
            WHERE id_customer='$id'");

    if($result)
    {
        $response=array(
        'status' => 1,
        'message' =>'Data Customer Berhasil Diperbaharui'
        );
    }
        else
    {
        $response=array(
        'status' => 0,
        'message' =>'Data Customer Gagal Diperbaharui'
        );
    }
    }else{
        $response=array(
        'status' => 0,
        'message' =>'Parameter Tidak Sesuai'
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
    }


    public function hapus_pengguna($id)
    {
        global $mysqli;
        $query="DELETE FROM customer WHERE id_customer=".$id;
        if(mysqli_query($mysqli, $query))
        {
            $response=array(
            'status' => 1,
            'message' =>'Pengguna Berhasil Dihapus'
            );
        }
        else
        {
            $response=array(
            'status' => 0,
            'message' =>'Pengguna  Gagal Dihapus'
            );
        }
    header('Content-Type: application/json');
    echo json_encode($response);
}
}

?>