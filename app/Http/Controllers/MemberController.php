<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $member = Member::all();
        return view('member.index',compact('member'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('member.create');
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
            'nama_member' => ['required', 'string'],
            'alamat_member' => ['required'],
            'tlp_member' => ['required', 'numeric'],
            'jk_member' => ['required', 'string'],
       ]);
        try{
            $member = new Member();
            $member->nama_member = $request->nama_member;
            $member->alamat_member = $request->alamat_member;
            $member->tlp_member = $request->tlp_member;
            $member->jk_member = $request->jk_member;
            $member->save();
       }
        catch(\Exception $e ){return redirect()->back()->withErrors(['Member gagal disimpan']);
        }
         return redirect('member')->with('status','Member Berhasil ditambahkan');
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
        $member = Member::find($id);
        return view ('member.edit', compact('member'));
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
            'nama_member' => ['required', 'string'],
            'alamat_member' => ['required'],
            'tlp_member' => ['required', 'numeric'],
            'jk_member' => ['required', 'string'],
       ]);
        try{
            $member = Member::find($id);
            $member->nama_member = $request->nama_member;
            $member->alamat_member = $request->alamat_member;
            $member->tlp_member = $request->tlp_member;
            $member->jk_member = $request->jk_member;
            $member->save();
       }
        catch(\Exception $e ){return redirect()->back()->withErrors(['Member gagal diubah']);
        }
         return redirect('member')->with('status','Member Berhasil diubah');
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
            $member = Member::findOrFail($id);
            $member->delete();
       }
        catch(\Exception $e ){
            return redirect()->back()->withErrors(['Member gagal dihapus']);
       }
        return redirect()->back()->with('status','Member Berhasil dihapus');
        //
    }
}
