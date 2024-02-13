<?php
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Spreadsheet_PHP {

    // Fungsi untuk membuat spreadsheet baru
    public function createSpreadsheet() {
        $spreadsheet = new Spreadsheet();
        return $spreadsheet;
    }

    // Fungsi untuk mengatur header dan mengirim file sebagai download
    public function saveExcel($spreadsheet, $filename = 'export.xlsx') {
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'. $filename .'"');
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }
}
