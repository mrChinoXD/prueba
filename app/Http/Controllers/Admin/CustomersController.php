<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Hash;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class CustomersController extends Controller{

    function __construct()
    {

    }
    public function index(Request $req){
        $data = User::orderBy('id','DESC')->where('role','customer')->get();
        return view('admin.customers.index',compact('data'));
    }
    public function create(){

        return view('admin.customers.create');
    }
    public function get($id){
        $user = User::find($id);
        return view('admin.customers.addBalance',compact('user'));
    }
    public function Add_Balance( Request $req,$id){
        $user = User::find($id);
        $user->balance = $req->balance;
        $user->save();
        Toastr::success('saldo agregado correctamente.','Success');
        return redirect()->route('admin.customers.index');
    }
    public function store(Request $req){

        $this->validate($req,[
            'name'      => 'required',
            'email'     => 'required|email|unique:users',
        ]);
        $pass = Hash::make('123456789');

        $user = new User();
        $user->name  = $req->name;
        $user->email = $req->email;
        $user->password = $pass;
        $user->role     = 'customers';
        $user->save();

        Toastr::success('Cliente Creado Correctamente.','Success');
        return redirect()->route('admin.customers.index');
    }
    public function updateProfile(Request $req){

        $user = User::findOrFail(Auth::id());

        $user->name     = $req->name;
        $user->subnameP = $req->subnameP;
        $user->subnameM = $req->subnameM;

        $user->save();
        Toastr::success('Perfil Actualizado Correctamente','Success');
        return redirect()->back();

    }
    public function updatePassword(Request $req)
    {
        $this->validate($req, [
            'old_password' => 'required',
            'password' => 'required|confirmed'
        ]);
        $hashedPassword = Auth::user()->password;
        if (Hash::check($req->old_password, $hashedPassword)) {
            if (!Hash::check($req->password, $hashedPassword)) {
                $user = User::find(Auth::id());
                $user->password = Hash::make($req->password);
                $user->save();
                Toastr::success('Cambio de contraseña realizado correctamente', 'Success');
                Auth::logout();
                return redirect()->back();
            } else {
                Toastr::error('La nueva contraseña es identica a la contraseña anterior', 'Error');
                return redirect()->back();
            }
        } else {
            Toastr::error('Ingrese la contraseña correcta', 'Error');
            return redirect()->back();
        }
    }
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        Toastr::success('usuario dado de baja :D', 'Success');
        return redirect()->back();
    }

}
