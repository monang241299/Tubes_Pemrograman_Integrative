<?php 

require_once "koneksi.php";

Class Mobil{
    public function get_mobil(){
        global $mysqli;
        $query = "SELECT * FROM mobil";
        $data=array();
        $result=$mysqli->query($query);
        while($row=mysqli_fetch_object($result))
        {
            $data[]=$row;
        }
        $response=array(
            'status'=>1,
            'message'=>'Get Mobil Berhasil',
            'data'=> $data
        );
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    
    public function get_mobil1($id=0){
        global $mysqli;
        // $query="SELECT * FROM laptop";
        if($id !=0)
        {
            $query ="SELECT * FROM mobil WHERE id_mobil= ".$id." LIMIT 1";
        }
        $data=array();
        $result=$mysqli->query($query);
        while($row=mysqli_fetch_object($result))
        {
            $data[]=$row;
        }
        $response=array(
            'status' => 200,
            'message'=> "Get Mobil Berhasil",
            'data' => $data
        );
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    public function tambah_mobil()
        {
        global $mysqli;
        $arrcheckpost = array('id_mobil' => '', 'plat_mobil' => '', 'merk_mobil' => '','nama_mobil' => '', 'tahun_mobil' => '','warna_mobil'=>'','harga_mobil'=>'');
        $hitung = count(array_intersect_key($_POST, $arrcheckpost));
            if($hitung == count($arrcheckpost)){
                $result = mysqli_query($mysqli, "INSERT INTO mobil SET
                id_mobil= '$_POST[id_mobil]',
                plat_mobil = '$_POST[plat_mobil]',
                merk_mobil = '$_POST[merk_mobil]',
                nama_mobil = '$_POST[nama_mobil]',
                tahun_mobil = '$_POST[tahun_mobil]',
                warna_mobil = '$_POST[warna_mobil]',
                harga_mobil = '$_POST[harga_mobil]'");
                    if($result)
                {
                    $response=array(
                    'status' => 1,
                    'message' =>'Data Mobil Berhasil Ditambahkan'
                    );
                }
            else
                {
                    $response=array(
                    'status' => 0,
                    'message' =>'Data Mobil Gagal Ditambahkan'
                );
                }
            }else
                {
                    $response=array(
                    'status' => 0,
                    'message' =>'Parameter Tidak Sesuai'
                    );
                }
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    public function update_mobil($id)
    {
        global $mysqli;
        $arrcheckpost = array('id_mobil' => '', 'plat_mobil' => '', 'merk_mobil' => '','nama_mobil' => '', 'tahun_mobil' => '','warna_mobil'=>'','harga_mobil'=>'');
        $hitung = count(array_intersect_key($_POST, $arrcheckpost));
            if($hitung == count($arrcheckpost)){
            $result = mysqli_query($mysqli, "UPDATE mobil SET
            id_mobil= '$_POST[id_mobil]',
            plat_mobil = '$_POST[plat_mobil]',
            merk_mobil = '$_POST[merk_mobil]',
            nama_mobil = '$_POST[nama_mobil]',
            tahun_mobil = '$_POST[tahun_mobil]',
            warna_mobil = '$_POST[warna_mobil]',
            harga_mobil = '$_POST[harga_mobil]'");
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