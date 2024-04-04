<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\user;
use App\Models\pesanan;
use App\Models\stok;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
$user=user::latest();
if(request('search')){
    $user->where('name','Like','%'.request('search').'%')->orwhere('email','like','%'.request('search').'%')->get();
}
       return view('admin.index',[
'title'=>'Distributor',
'users'=>$user->paginate(4)->withQueryString(),
       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function cari( Request $request ){
            $output="";
    $data=user::where('name','Like','%'.$request->search.'%')->orwhere('email','like','%'.$request->search.'%')->get();
    $no=1;
    foreach($data as $d){
        $output.=
        '<tr>
        <td>'.$no++.'</td>
        <td>'.$d->name.'</td>
        <td>'.$d->email.'</td>
        <td>'.'<a href="/admin/'.$d->id.'" class="btn btn-primary btn-sm">Detail</a>'.'</td>
        <td>'.'<a href="/admin/'.$d->id.'/delete" class="btn btn-danger btn-sm">Hapus</a>'.'</td>
        </tr>';
    }
    return response($output);
    }
    public function create()
    {
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
     $user=user::where('id',$id)->first();
        $pesanans=pesanan::where('user_id',$id)->get();
      return view('admin.stokdistributor',[
'title'=>'Pesanan Distributor',
'pesanans'=>$pesanans,
'user'=>$user
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=user::where('id',$id)->first();
        $pesanan=pesanan::where('user_id',$user->id)->first();
        if($pesanan){
        if($pesanan->bukti){
            storage::delete($pesanan->bukti);
        }
        $pesanan->delete();
    }
    $user->delete();
        Alert::success(session('success','Pesanan Di Hapus'));
        return back();
    }

    public function editstatus($id){
        $pesanan=pesanan::where('id',$id)->first();
        return view('admin.editstatus',[
'title'=>'Show',
'pesanan'=>$pesanan
        ]);
    }
    public function updatestatus(Request $request,$id){
        $pesanan=pesanan::where('id',$id)->first();
        $rules=[
            'jumlah_minta'=>'required',
            'jumlah_harga'=>'required',
            'status'=>'required'
        ];
        $validatedata=$request->validate($rules);
        $validatedata['user_id']=$pesanan->user_id;
       pesanan::where('id',$pesanan->id)->update($validatedata);
       Alert::success(session('success','Pesanan Di terimah'));
       return redirect('/admin');
    }
    public function laporan(){
        return view('admin.laporan',[
'title'=>'Laporan',
'pesanans'=>pesanan::latest()->where('status',1)->get()
        ]);
    }
    public function cetaklaporan(){
        return view('admin.cetaklaporan',[
'title'=>'Laporan',
'pesanans'=>pesanan::latest()->where('status',1)->get()
        ]);
    }
    public function pesananbaru(){
        return view('admin.stokdistributor',[
    'title'=>'Pesanan Baru',
    'pesanans'=>pesanan::latest()->where('status',0)->get(),
    'user'=>auth::user()->name
        ]);
    }
}
