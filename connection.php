<?php

class Database
{
    var $dbhost = "localhost";
    var $username = "root";
    var $password = "DIDIKprabowo_1995";
    var $dbname = "export_pdf";

    function getMySQL()
    {
        $con = mysqli_connect(
            $this->dbhost,
            $this->username,
            $this->password,
            $this->dbname
        ) or die("Gagal konek dengan error : " . mysqli_connect_error());

        if (mysqli_connect_errno()) {
            return "tidak dapat konek ke database MySQL";
        } else {
            return $con;
        }
    }
}
