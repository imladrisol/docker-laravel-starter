<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubjectRequest;
use App\Models\Category;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index(){

        $subjects = Subject::query()->orderBy('id', 'desc')->paginate(Subject::SUBJECTS_PER_PAGE);
        $title = "Subjects";

        return view('subjects.index', compact('subjects', 'title'));
    }

    public function create(){
        $title = "Create New Subject";
        $categories = Category::all();
        return view('subjects.new', compact('title', 'categories'));
    }

    public function store(Request $request){
        $attrs = $request->validate((new SubjectRequest)->rules());
        Subject::create($attrs);
        $msg = 'Subject has been created';

        return redirect(route('subjects.index'))->with('success', $msg);
    }

    public function show($id){
        $subject = Subject::findOrFail($id);
        $title = "Edit subject '{$subject->title}'";
        $categories = Category::all();
        return view('subjects.edit', compact('subject', 'title', 'categories'));
    }

    public function update(Request $request, $subject){
        $subject = Subject::findOrFail($subject);
        $attrs = $request->validate((new SubjectRequest)->rules());
        $subject->update($attrs);
        $msg = 'Subject "'. $subject->title .'" has been changed';
        return redirect(route('subjects.index'))->with('success', $msg);
    }

    public function destroy($id){
        Subject::findOrFail($id)->delete();
        $msg = 'Subject id:' . $id . ' has been deleted';
        return redirect(route('subjects.index'))->with('success', $msg);
    }

    /*public function getQuestions($id){
        $subject = Subject::findOrFail($id);
        $title = "Manage questions for '".$subject->name."' subject (Category: ".$subject->category->name.") ".$subject->duration." min ";
        $answers = [1, 2, 3, 4];
        $questions = Question::all();
        return view('subject.questions', compact('subject', 'title', 'answers', 'questions'));
    }*/
}
