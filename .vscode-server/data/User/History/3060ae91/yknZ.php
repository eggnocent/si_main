<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Models\Siswa;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $siswa = Siswa::latest()->paginate(5);
        
        return view('siswa.index',compact('siswa'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('siswa.create');
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nis' => 'required',
            'nama' => 'required',
	    'gender' => 'required|in:F,M',
        'kelas' => 'required|in:X,XI,XII,XIII',
	    'rombel' => 'required|in:A,B',
        ]);        
        Siswa::create($request->all());
         
        return redirect()->route('siswa.index')
                        ->with('success','Siswa created successfully.');
    }
  
    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa): View
    {
        return view('siswa.show',compact('siswa'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa): View
    {
        return view('siswa.edit',compact('siswa'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa): RedirectResponse
    {
        $request->validate([
            'nis' => 'required',
            'nama' => 'required',
	    'gender' => 'required|in:F,M',
        'kelas' => 'required|in:X,XI,XII,XIII',
	    'rombel' => 'required|in:A,B',
        ]);
        
        $siswa->update($request->all());
        
        return redirect()->route('siswa.index')
                        ->with('success','Siswa updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa): RedirectResponse
    {
        $siswa->delete();
         
        return redirect()->route('siswa.index')
                        ->with('success','Siswa deleted successfully');
    }
}
