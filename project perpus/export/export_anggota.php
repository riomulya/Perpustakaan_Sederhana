<?php

require '../vendor/autoload.php';
require("../db/connection.php");
$read = read("SELECT * FROM tbl_anggota");

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;

$i = 1;
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

foreach ($read as $data) {
    $sheet->setCellValue('A' . $i, $i);
    $sheet->setCellValue('B' . $i, (string)$data['id_anggota']);
    $sheet->setCellValue('C' . $i, $data['nama']);
    $sheet->setCellValue('D' . $i, $data['jenis_kelamin']);
    $sheet->setCellValue('E' . $i, $data['alamat']);
    $i++;
}
$sheet->insertNewRowBefore(1, 1);
$sheet->setCellValue('A1', "No");
$sheet->setCellValue('B1', "ID anggota");
$sheet->setCellValue('C1', "Nama");
$sheet->setCellValue('D1', "Jenis Kelamin");
$sheet->setCellValue('E1', "Alamat");


$styleArray = [
    'borders' => [
        'allBorders' => [
            'borderStyle' => Border::BORDER_THIN,
            'color' => ['argb' => '0000FF'],
        ],
    ],
];

$sheet->getStyle('A1:E' . $i)->applyFromArray($styleArray);

$styleArray = [
    'allignment' => [
        'horizontal' => Alignment::HORIZONTAL_CENTER,
    ],
    'borders' => [
        'bottom' => [
            'borderStyle' => Border::BORDER_MEDIUM,
            'color' => ['argb' => '0000FF'],
        ],
    ],
    'font' => [
        'bold' => true,
    ]
];

$sheet->getStyle('A1:E1')->applyFromArray($styleArray);

//set auto width
foreach (range('A', 'E') as $columnId) {
    $sheet->getColumnDimension($columnId)->setAutoSize(true);
}

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition:attachment;filename="data anggota.xlsx"');
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
