<?php

namespace App\Http\Controllers;

use App\Models\rayon;
// use App\Models\Rayon as ModelsRayon;
// use App\Models\Student;
use Illuminate\Http\Request;

class RayonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rayons = rayon::latest()->paginate(5);
        // dd($students);

        return view('rayon.index',compact('rayons'))
        ->with('i', (request()->input('page', 1) -1) * 1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rayon.create');
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
         'rayon' => 'required'
        ]);

        Rayon::create($request->all());
        return redirect()->route('rayon.index')
            ->with('success', 'Berhasil Menyimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(rayon $rayon)
    {
        $rayon->load('students');
        return view('rayon.show',compact('rayon'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(rayon $rayon)
    {
        return view('rayon.edit',compact('rayon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, rayon $rayon)
    {

        $request->validate([
            'rayon' => 'required',
        ]);

        $rayon->update($request->all());

        return redirect()->route('rayon.index')
        ->with('success', 'Berhasil Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(rayon $rayon)
    {
        $rayon->delete();
        // dd($student);

        return redirect()->route('rayon.index')
        ->with('success', 'Berhasil Hapus');
    }
}
