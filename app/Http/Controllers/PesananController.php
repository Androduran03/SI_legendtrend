<?php

namespace App\Http\Controllers;

use App\Models\pesanan;
use App\Models\barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang=barang::all()->first();
        return view('pesanan.index',[
            'title'=>'Pesanan',
            'pesanans'=>pesanan::where('user_id',auth::user()->id)->get(),
            'barang'=>$barang
                    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedata=$request->validate([
'jumlah_minta'=>'required'
        ]);
        $validatedata['user_id']=Auth::user()->id;
        $validatedata['jumlah_harga']=$request->jumlah_minta*$request->harga;
        pesanan::create($validatedata);
        Alert::success(session('success','Tambah Pesanan berhasil'));
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pesanan=pesanan::where('id',$id)->first();
        return view('pesanan.show',[
'title'=>'Detail Pesanan',
'pesanan'=>$pesanan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang=barang::all()->first();
        return view('pesanan.edit',[
            'title'=>'Edit Pesanan',
            'pesanan'=>pesanan::where('id',$id)->first(),
            'pesanans'=>pesanan::where('user_id',auth::user()->id)->get(),
            'barang'=>$barang
                    ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $pesanan=pesanan::where('id',$id)->first();
    
        $rules=[
            'jumlah_minta'=>'required'
           
                    ];
                    $validatedata=$request->validate($rules);
                    $validatedata['jumlah_harga']=$request->jumlah_minta*$request->harga;
                    $validatedata['user_id']=Auth::user()->id;
                    pesanan::where('id',$pesanan->id)->update($validatedata);
                    Alert::success(session('success','Pesanan terupdate'));
                    return redirect('/pesanan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pesanan=pesanan::where('id',$id)->first();
        $pesanan->delete();
        
        
        Alert::success(session('success','Hapus Pesanan Berhasil'));
                    return redirect('/pesanan');
    }
    public function uploadbukti(Request $request,$id){
        $pesanan=pesanan::where('id',$id)->first();
        $validatedata=$request->validate([
'bukti'=>'image|file|max:1024',
'alamat_lengkap'=>'required'
        ]);
        if($request->file('bukti')){
            $validatedata['bukti']=$request->file('bukti')->store('post-images');
        }
        $validatedata['user_id']=$pesanan->user_id;
        pesanan::where('id',$pesanan->id)->update($validatedata);
        Alert::success(session('success','Bukti telah Terkirim'));
        return redirect('/pesanan');
    }
}
