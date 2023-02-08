<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outlet;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $outlet = Outlet::all();
        return view ('outlet.index', compact('outlet'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('outlet.create');
        //
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
            'nama_outlet' => ['required', 'string'],
            'alamat_outlet' => ['required'],
            'tlp_outlet' => ['required', 'numeric'],
       ]);
        try{
            $outlet= new Outlet();
            $outlet->nama_outlet = $request->nama_outlet;
            $outlet->alamat_outlet = $request->alamat_outlet;
            $outlet->tlp_outlet = $request->tlp_outlet;
            $outlet->save();
       }
        catch(\Exception $e ){return redirect()->back()->withErrors(['Outlet gagal disimpan']);
        }
         return redirect('outlet')->with('status','Outlet Berhasil ditambahkan');
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
    public function edit($id)
    {
        $outlet = Outlet::find($id);
        return view ('outlet.edit', compact('outlet'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_outlet' => ['required', 'string'],
            'alamat_outlet' => ['required'],
            'tlp_outlet' => ['required', 'numeric'],
       ]);
        try{
            $outlet= Outlet::find($id);
            $outlet->nama_outlet = $request->nama_outlet;
            $outlet->alamat_outlet = $request->alamat_outlet;
            $outlet->tlp_outlet = $request->tlp_outlet;
            $outlet->save();
       }
        catch(\Exception $e ){return redirect()->back()->withErrors(['Outlet gagal diubah']);
        }
         return redirect('outlet')->with('status','Outlet Berhasil diubah');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $outlet = Outlet::findOrFail($id);
            $outlet->delete();
       }
        catch(\Exception $e ){
            return redirect()->back()->withErrors(['Outlet gagal dihapus']);
       }
        return redirect()->back()->with('status','Outlet Berhasil dihapus');
   
    }
}
