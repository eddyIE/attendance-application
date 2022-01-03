<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use Redirect;
use DB;

class SubjectController extends Controller
{
    public function getAll()
    {
        //Trả về view
        $list = Subject::getAll();
        return view('other.subjects', compact('list'));
    }
    public function add()
    {
        return view('other.subjects');
    }
    public function addService(Request $request)
    {
        $subject = new Subject;
        $subject->name = $request->name;
        $subject->creditHour = $request->creditHour;
        $subject->addService();
        return Redirect::route("other.subjects");
    }
}