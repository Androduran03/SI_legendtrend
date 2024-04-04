<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\dashboardProduk;
use Illuminate\Http\Request;
use App\Models\pesanan;
use App\Models\user;
class DashboardProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=user::where('id',Auth::user()->id)->first();
       
       return view('dashboard.produk.index',[
        'title'=>'Dashboard',
        'pesanans'=>pesanan::where('status',0)->get(),
        'user'=>$user
       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
     * @param  \App\Models\dashboardProduk  $dashboardProduk
     * @return \Illuminate\Http\Response
     */
    public function show(dashboardProduk $dashboardProduk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\dashboardProduk  $dashboardProduk
     * @return \Illuminate\Http\Response
     */
    public function edit(dashboardProduk $dashboardProduk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\dashboardProduk  $dashboardProduk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, dashboardProduk $dashboardProduk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\dashboardProduk  $dashboardProduk
     * @return \Illuminate\Http\Response
     */
    public function destroy(dashboardProduk $dashboardProduk)
    {
        //
    }
}
