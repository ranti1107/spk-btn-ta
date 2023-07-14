<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Auth;


class UserController extends Controller
{
	function BerandaUserAdmin(){
		$data['list_user_admin'] = User::where('level',0)->get();
		return view('Admin.User.beranda-user-admin', $data);
	}

	function CreateUserAdmin(){
		return view('Admin.User.create-user-admin');
	}

	function storeUserAdmin(Request $request){

        $request->validate([
            'nama' => 'required|max:255',
            'username' => 'required|unique:users',
            'password' => 'required|min:5|max:255'
        ]);
            $user = new User;
            $user->level= 0;
            $user->nama= request('nama');
            $user->username= request('username');
            $user->email = request('email');
            $user->password= bcrypt(request('password'));
            $user-> save();

            return redirect('Admin/user-admin')->with('success', 'Pendaftaran Berhasil');
        

	}

    function editUserAdmin(User $user){
        $data['admin'] = $user;

        return view('Admin.User.edit-user-admin', $data);
    }

    function UpdateUserAdmin(User $user){

            $user->level= 0;
            $user->nama= request('nama');
            $user->username= request('username');
            $user->email = request('email');
            $user-> save();

            return redirect('Admin/user-admin')->with('success', 'Edit Data Admin Berhasil');
        

    }

    function Profil(User $user){
        $data['admin'] = Auth::user();

        return view('Admin.User.profil', $data);
    }

    function gantipasswordUserAdmin(User $user){
        $data['admin'] = Auth::user();

        return view('Admin.User.ganti-password-user-admin', $data);
    }

    public function simpanpassword(Request $request){
        $request->validate([
            'baru' => 'required|min:8|max:255'
        ]);

        $data = request()->all();

        if(request('lama')){
            if(request('lama')){
                $user = Auth::user();
                $check = Hash::check(request('lama'), $user->password);
                if($check){
                    if(request('baru') == request('konfirmasi')){

                        $user->password = bcrypt(request('baru'));
                        $user->save();

                        Auth::logout();
                        return redirect('spk-btn/login')->with('warning', 'Masukan Password Baru');

                    }else{
                        return back()->with('danger', 'Konfirmasi Password Tidak Sesuai');
                    }
            }else{
                return back()->with('danger', 'Password Lama Anda Salah');
            }
        }else{
            return back()->with('danger', 'Password Lama Kosong');
            }
        }
    }

    function BerandaUserKaryawan(){
        $data['list_user_karyawan'] = User::where('level',1)->get();
        return view('Admin.User.beranda-user-karyawan', $data);
    }

    function CreateUserKaryawan(){
        return view('Admin.User.create-user-karyawan');
    }

    function storeUserKaryawan(Request $request){

        $request->validate([
            'nama' => 'required|max:255',
            'username' => 'required|unique:users',
            'password' => 'required|min:5|max:255'
        ]);
            $user = new User;
            $user->level= 1;
            $user->nama= request('nama');
            $user->username= request('username');
            $user->email = request('email');
            $user->password= bcrypt(request('password'));
            $user-> save();

            return redirect('Admin/user-karyawan')->with('success', 'Pendaftaran Berhasil');
        

    }
}