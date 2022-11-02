<?php

require '../vendor/autoload.php';
require("../db/connection.php");
$read = read("SELECT * FROM tbl_buku");

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;

$i = 1;
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

foreach ($read as $data) {
    $sheet->setCellValue('A' . $i, $i);
    $sheet->setCellValue('B' . $i, $data['isbn']);
    $sheet->setCellValue('C' . $i, $data['judul']);
    $sheet->setCellValue('D' . $i, $data['penulis']);
    $sheet->setCellValue('E' . $i, $data['penerbit']);
    $sheet->setCellValue('F' . $i, $data['tahun_terbit']);
    $sheet->setCellValue('G' . $i, $data['halaman']);
    $i++;
}
$sheet->insertNewRowBefore(1, 1);
$sheet->setCellValue('A1', "No");
$sheet->setCellValue('B1', "ISBN");
$sheet->setCellValue('C1', "Judul");
$sheet->setCellValue('D1', "Penulis");
$sheet->setCellValue('E1', "Penerbit");
$sheet->setCellValue('F1', "Tahun terbit");
$sheet->setCellValue('G1', "Halaman");

$styleArray = [
    'borders' => [
        'allBorders' => [
            'borderStyle' => Border::BORDER_THIN,
            'color' => ['argb' => '0000FF'],
        ],
    ],
];

$sheet->getStyle('A1:G' . $i)->applyFromArray($styleArray);

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

$sheet->getStyle('A1:G1')->applyFromArray($styleArray);

//set auto width
foreach (range('A', 'G') as $columnId) {
    $sheet->getColumnDimension($columnId)->setAutoSize(true);
}


header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition:attachment;filename="data buku.xlsx"');
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
