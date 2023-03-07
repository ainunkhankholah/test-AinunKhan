<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $surat = Surat::latest()->paginate(10);

        return view('surat.index', compact('surat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $surat = Surat::latest()->paginate(10);

        return view('surat.create', compact('surat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_surat' => 'required',
            'judul_surat' => 'required',
            'isi' => 'required'
        ]);
    
        $lastSurat = Surat::orderBy('id', 'DESC')->first();
        // dd($lastSurat);
    
        $no_surat = $validated['no_surat'].'/'.date('Ym').$lastSurat['/lastSurat'];
    
        if($lastSurat) {
            $lastNoSurat = $lastSurat->no_surat;
            $lastNoSuratArr = explode('/', $lastNoSurat);
            $lastNoUrut = end($lastNoSuratArr);
            $newNoUrut = sprintf("%04d", intval($lastNoUrut) + 1);
            $no_surat = str_replace($lastNoUrut, $newNoUrut, $lastNoSurat);
        }
    
        $validated['no_surat'] = $no_surat;
        
        Surat::create($validated);

        return redirect()->route('surat.index')->success('Successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Surat $surat)
    {
        return view('surat.edit', compact('surat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Surat $surat)
    {
        $validated = $request->validate([
            'judul_surat' => 'required',
            'isi' => 'required'
        ]);

        $surat->update($validated);

        return redirect()->route('surat.index')->success('Successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Surat $surat)
    {
        $surat->delete();

        return redirect()->route('surat.index')->success('Successfully deleted!');
    }
    public function status(Request $request)
    {
        if (!in_array($request->statusSurat, ["setuju", "tolak"])) return abort(404);
        $status = strtoupper($request->statusSurat);
        
        Surat::findOrFail($request->idSurat)->update([
            'status' => $status,
        ]);
        return redirect()->back()->success('Successfully updated!');
    }

}
