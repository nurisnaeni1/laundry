<?php

namespace App\Http\Controllers;

use App\Models\outlet;
use Illuminate\Http\Request;
use App\Models\Paket;


class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paket = Paket::with('outlet')->get();
        return view ('paket.index', compact('paket')); 
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $outlet = Outlet::all();
        return view('paket.create', compact('outlet'));
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
            'jenis_paket' => ['required', 'string'],
            'nama_paket' => ['required'],
            'harga_paket' => ['required', 'numeric'],
       ]);
    //    dd($request);

        try{
            // dd($request->all());
            $paket= new Paket();
            $paket->id_outlet = $request->id_outlet;
            $paket->jenis_paket = $request->jenis_paket;
            $paket->nama_paket = $request->nama_paket;
            $paket->harga_paket = $request->harga_paket;
            $paket->save();
       }
        catch(\Exception $e ){return redirect()->back()->withErrors(['Paket gagal diubah']);
        }
         return redirect('paket')->with('status','Paket Berhasil diubah');
        //
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
        $paket = Paket::find($id);
        $outlet = Outlet::all();
        return view('paket.edit', compact('paket','outlet'));
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
            'jenis_paket' => ['required', 'string'],
            'nama_paket' => ['required'],
            'harga_paket' => ['required', 'numeric'],
       ]);
    //    dd($request);

        try{
            // dd($request->all());
            $paket= Paket::find($id);
            $paket->id_outlet = $request->id_outlet;
            $paket->jenis_paket = $request->jenis_paket;
            $paket->nama_paket = $request->nama_paket;
            $paket->harga_paket = $request->harga_paket;
            $paket->save();
       }
        catch(\Exception $e ){return redirect()->back()->withErrors(['Paket gagal diubah']);
        }
         return redirect('paket')->with('status','Paket Berhasil diubah');
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
            $paket = Paket::findOrFail($id);
            $paket->delete();
       }
        catch(\Exception $e ){
            return redirect()->back()->withErrors(['Paket gagal dihapus']);
       }
        return redirect()->back()->with('status','Paket Berhasil dihapus');
    }
}
