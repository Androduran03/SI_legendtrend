<?php

namespace App\Http\Controllers; 
use Illuminate\Http\Request;
use App\Models\user;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
class RegisterController extends Controller
{
public function index(){
    return view('register.index',[
'title'=>'Register'
    ]);
}
public function store(Request $request){

    $validatedata=$request->validate([
        'name'=>'required|max:255',
        'phone'=>'required|max:15|min:8',
        'address'=>'required',
        'email'=>'required|email|unique:users',
        'password'=>'required|max:255|min:5'

    ]);
    $validatedata['password']=bcrypt($validatedata['password']);
user::create($validatedata);
return redirect('/')->with('success','Register Successfully!');
}
public function profil(){
return view('profil.index',[
'title'=>'Profil',
'profil'=>user::where('id',Auth::user()->id)->first()
]);
}
public function edit($id){
    
    return view('profil.edit',[
'title'=>'Edit Profil',
'profil'=>user::where('id',$id)->first()
    ]);
}
public function update(Request $request,$id){
    $profil=user::where('id',$id)->first();
    $rules=[
        'name'=>'required',
        'phone'=>'required',
        'address'=>'required',    
    ];
if($request->email!=$profil->email){
    $rules['email']='required|unique:users';
}
$validatedata=$request->validate($rules);
$validatedata['password']=auth::user()->password;
user::where('id',$profil->id)->update($validatedata);
Alert::success(session('success','Update Profil Berhasil'));
return redirect('/profil');

}
public function resetpassword(Request $request,$id){
    $profil=user::where('id',$id)->first();
$rules=[
'password'=>'required|max:255|min:5'

];
if($request->password!=$request->konfirmasi){
    Alert::error(session('error','Update password Filed!'));
    return back();
}
$validatedata=$request->validate($rules);
$validatedata['password']=bcrypt($validatedata['password']);
user::where('id',$profil->id)->update($validatedata);

Alert::success(session('success','Update Password Berhasil'));
return back();
}
}
