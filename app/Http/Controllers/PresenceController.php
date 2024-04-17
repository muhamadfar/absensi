<?php

namespace App\Http\Controllers;

use App\Models\Presence;
use App\Models\Student;
use Illuminate\Http\Request;

class PresenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $presences = Presence::latest()->paginate(5);
        // dd($presences);

        return view('presence.index',compact('presences'))
        ->with('i', (request()->input('page', 1) -1) * 1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::all();
        return view('presence.create',compact('students'));
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
            'student_id' => 'required',
            'jam_masuk' => 'required',
            'jam_keluar' => 'required',
            'date' => 'required',
            'ket' => 'required'
        ]);

        Presence::create($request->all());
        return redirect()->route('presence.index')
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
        return view('presence.edit',compact('presence'));
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
            'nama' => 'required',
            'jam_masuk' => 'required',
            'jam_keluar' => 'required',
            'date' => 'required',
            'ket' => 'required'
        ]);
        $student->update($request->all());

        return redirect()->route('presence.index')
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

        return redirect()->route('presence.index')
        ->with('success', 'Berhasil Hapus');
    }
}
