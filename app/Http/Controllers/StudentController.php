<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\Rayon;
use App\Models\Student;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::with(['rayon','major','class'])->paginate(5);
        // dd($students);
        // dd($students);

        return view('students.index',compact('students'))
        ->with('i', (request()->input('page', 1) -1) * 1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rayons = Rayon::all();
        $class = StudentClass::all();
        $majors = Major::all();
        return view('students.create',compact('rayons', 'class', 'majors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'nis' => 'required',
            'nama' => 'required',
            'rayon_id' => 'required',
        ]);

        Student::create($request->all());
        return redirect()->route('students.index')
            ->with('success', 'Berhasil Menyimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('students.edit',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'nis' => 'required',
            'nama' => 'required',
            'rayon' => 'required',
        ]);

        $student->update($request->all());

        return redirect()->route('students.index')
        ->with('success', 'Berhasil Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        // dd($student);

        return redirect()->route('students.index')
        ->with('success', 'Berhasil Hapus');
    }
}
