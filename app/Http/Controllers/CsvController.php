<?php

namespace App\Http\Controllers;

use App\Models\StudentExam;
use Exception;

class CsvController extends Controller
{
    public function generateCsv($id)
    {
        try {
            $student_exams = StudentExam::where('exam_id', '=', $id)->get();
            $columns = array('AIS', 'Name', 'Surname', 'Points');

            $file = fopen('results.csv', 'w');
            fputcsv($file, $columns);

            foreach ($student_exams as $student_exam) {
                $row['AIS']  = $student_exam->ais;
                $row['Name']    = $student_exam->forename;
                $row['Surname']    = $student_exam->surname;
                //TODO: BODY SU NA TVRDO KED SA PRIDAJU DO DB TREBA ICH PRIDAT DO row['Points']
                $row['Points']  = 4;

                fputcsv($file, array($row['AIS'], $row['Name'], $row['Surname'], $row['Points']));
            }
            fclose($file);

            return view('csv.index');
        } catch (Exception $e) {
            return view('csv.error');
        }
    }

    public function downloadCsv()
    {
        $filename = 'results.csv';
        if (file_exists($filename)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header("Cache-Control: no-cache, must-revalidate");
            header("Expires: 0");
            header('Content-Disposition: attachment; filename="' . basename($filename) . '"');
            header('Content-Length: ' . filesize($filename));
            header('Pragma: public');

            flush();
            readfile($filename);
            die();
        }
    }
}
