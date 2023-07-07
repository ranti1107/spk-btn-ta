<?php 

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class AuthController extends Controller
{
	function showLogin(){
		return view('auth.login');
	}

	function LoginProcess(Request $request){
		request()->validate(['username' => 'required','password' => 'required']);
		
		$kredensil = $request->only('username', 'password');
		if (Auth::attempt($kredensil)){
			$user = Auth::user();
			if($user->level == '0'){
				return redirect()->intended('Admin/beranda')->with('success', 'Selamat Datang Admin');
			} elseif($user->level == '1'){
				return redirect()->intended('spk-btn/beranda')->with('success', 'Selamat Datang Di SPK Pemberian KPR Bank BTN');
			}
		}
		return redirect('spk-btn/login')->with('danger', 'Silahkan Cek Email dan Password Anda');
	}


	function logout(Request $request){
		$request->session()->flush();
		Auth::logout();
		return redirect('spk-btn/login')->with('warning', 'Terima Kasih Telah Berkunjung');
	}

}