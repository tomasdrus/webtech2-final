<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Exam;
use App\Models\ExamQuestion;
use App\Models\StudentAnswer;
use App\Models\StudentAnswerPair;
use App\Models\StudentExam;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;

class AdminExamController extends Controller
{
    function index()
    {
        $exams = ['exams' => DB::table('exams')->get()->all()];
        $teacher = ['LoggedTeacherInfo' => Teacher::where('id', '=', session('LoggedTeacher'))->first()];

        return view('admin.exam.index')->with($teacher)->with($exams);
    }

    function create()
    {
        $questions = ['questions' => DB::table('questions')->get()->all()];
        $teacher = ['LoggedTeacherInfo' => Teacher::where('id', '=', session('LoggedTeacher'))->first()];

        return view('admin.exam.create')->with($teacher)->with($questions);
    }

    function save(Request $request)
    {
        $exam = new Exam();

        $request->validate([
            'name' => 'required',
            'token' => 'required',
            'length' => 'required',
        ]);

        $exam->name = $request->name;
        $exam->token = $request->token;
        $exam->length = $request->length;
        $exam->active = false;

        if ($exam->save()) {
            $questions = $request->questions;

            for ($i = 0; $i < count($questions); $i++) {
                $exam_question = new ExamQuestion();

                $exam_question->exam_id = $exam->id;
                $exam_question->question_id = $questions[$i];

                if (!$exam_question->save()) {
                    return redirect('admin/exam')->with('error', 'No exam added');
                }
            }
            return redirect('admin/exam')->with('success', 'New exam added');
        }
        return redirect('admin/exam')->with('error', 'No exam added');
    }

    function destroy($id)
    {
        $exam = Exam::find($id);
        if (!$exam) {
            return back()->with('error', 'Exam not found');
        }

        $examQuestionDestroy = ExamQuestion::where('exam_id', $id)->delete();
        $examDestroy = Exam::destroy($id);
        if (!$examDestroy || !$examQuestionDestroy) {
            return back()->with('error', 'Exam delete failed');
        }

        return back()->with('success', 'Exam was deleted');
    }

    function update($id)
    {
        $exam = Exam::find($id);
        if (!$exam)
            return back()->with('error', 'Exam not found');

        $exam->update(['active' => $exam->active == true ? false : true]);

        if (!$exam)
            return back()->with('error', 'Changing exam state faild');

        return back()->with('success', 'Exam state was changed');
    }

    function generatePdf($id)
    {
        $student_exams = StudentExam::where('exam_id', '=', $id)->get();

        $students_answers = array();
        $student_answers_pairs = array();
        foreach ($student_exams as $student_exam) {
            dump($student_exam->ais);
            $answers = StudentAnswer::where('student_exam_id', '=', $student_exam->id)->get();
            array_push($students_answers, $answers);
            $pair_answers = StudentAnswerPair::where('student_exam_id', '=', $student_exam->id)->get();
            array_push($student_answers_pairs, $pair_answers);
        }

        $pdf = PDF::loadView('pdf_view', $student_exams);

        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');
    }
}
