<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\StudentExam;
use App\Models\StudentAnswer;
use App\Models\StudentAnswerPair;
use Illuminate\Routing\Controller;

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
                $score = StudentAnswer::where('student_exam_id', $student_exam->id)->where('rightness', true)->count();
                $score += StudentAnswerPair::where('student_exam_id', $student_exam->id)->where('rightness', true)->count();

                $row['AIS'] = $student_exam->ais;
                $row['Name'] = $student_exam->forename;
                $row['Surname'] = $student_exam->surname;
                $row['Points'] = $score;

                fputcsv($file, array($row['AIS'], $row['Name'], $row['Surname'], $row['Points']));
            }
            fclose($file);
            $this->downloadCsv();

            return view('admin.exam');
        } catch (Exception $e) {
            return view('admin.exam');
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
            //die();
        }
    }
}
