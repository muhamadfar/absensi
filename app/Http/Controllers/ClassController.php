<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $class= StudentClass::latest()->paginate(5);
        // dd($students);

        return view('student_class.index',compact('class'))
        ->with('i', (request()->input('page', 1) -1) * 1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student_class.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'class' => 'required'
           ]);

           StudentClass::create($request->all());
           return redirect()->route('student_class.index')
               ->with('success', 'Berhasil Menyimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(StudentClass $class)
    {
        $class->load('students');
        return view('student_class.show',compact('class'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentClass $class)
    {
        return view('student_class.edit',compact('class'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentClass $class)
    {
        $request->validate([
            'class' => 'required',
        ]);

        $class->update($request->all());

        return redirect()->route('student_class.index')
        ->with('success', 'Berhasil Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentClass $class)
    {
        $class->delete();
        // dd($student);

        return redirect()->route('student_class.index')
        ->with('success', 'Berhasil Hapus');
    }
}
