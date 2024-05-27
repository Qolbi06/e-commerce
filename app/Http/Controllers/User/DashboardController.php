<?php

namespace App\Http\Controllers\User;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    //
    public function index(){
        $userTransaction = Transaction::where('user_id', auth()->user()->id)->get();
        $pending = $userTransaction->where('status', 'PENDING')->count();
        $settlement = $userTransaction->where('status', 'settlement')->count();
        $expired = $userTransaction->where('status', 'expired')->count();
        $success = $userTransaction->where('status', 'success')->count();

        return view('pages.user.index', compact('pending', 'settlement', 'expired', 'success'));

    }

    public function updatePassword(){
        return view('pages.user.updatePassword');
    }

    public function changePassword(Request $request){
        $this->validate($request, [
            'current_password' => 'required',
            'password' => 'required|min:6',
            'confrimation_password' => 'required'
        ]);
        
        
        try {
            $currentPassword = Hash::check(
                $request->current_password, auth()->user()->password
            );

            if ($currentPassword) {
                if($request->password == $request->confrimation_password){
                    $user = auth()->user();

                    $user->password = Hash::make($request->password);
                    $user->save();

                    return redirect()->route('user.dashboard')->with('success', 'Password has been change');
                }else {
                    return redirect()->route('user.updatePassword')->with('error', 'Password does not match');
                } 
            }else {
                return redirect()->route('user.updatePassword')->with('error', 'current Password does not match');
            }
        } catch (\Exception $e) {
            return redirect()->route('user.updatePasswordx')->with('error', 'error!');
        }
    }
}