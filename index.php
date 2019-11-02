<?php
require('libs/fpdf181/fpdf.php');
require("connection.php");

class Index
{
    public function GetData()
    {
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(40, 10, 'Hello World!');
        $pdf->Output();
    }

    public function getDatUser()
    {
        $connect = new Database;
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);

        $pdf->Cell(190, 7, 'Daftar pengguna yang aktif', 0, 1);
        $pdf->Ln();

        $heading = array(
            'id' => 'ID',
            'name' => 'Name',
            'address' => 'Address'
        );
        $header = mysqli_query($connect->getMySQL(), "SHOW columns FROM users");

        foreach ($header as $item) {
            $pdf->Cell(45, 10, $heading[$item['Field']], 1);
        }

        $rsl  = mysqli_query($connect->getMySQL(), "SELECT *  FROM users");

        foreach ($rsl as $row) {
            $pdf->Ln();
            foreach ($row as $column)
                $pdf->Cell(45, 10, $column, 1);
        }
        $pdf->Output();
    }
}

$index = new Index();

$index->getDatUser();
