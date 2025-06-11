<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use APP\Model\Operator;
use App\Models\Labolatorium;
use Illuminate\Support\Facades\Hash;

class ControllerOperator extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $operator = Operator::where('username', $request->username)->first();

        if ($operator && $request->password == $operator->password) {
            session([
                'operator_id' => $operator->id, 
                'nama_operator' => $operator->nama_operator,
                'nis' => $operator->nis
            ]);
            return view('dashboardoperator');
        } else {
            return back()->withErrors(['login' => 'Username atau Password salah.']);
        }
    }

    public function dashboard()
    {
        if (!session()->has('operator_id')) {
            return redirect('/login')->withErrors(['login' => 'Silakan login terlebih dahulu.']);
        }

        return view('dashboardoperator');
    }

    public function lihatjadwal()
    {
        /*if (!session()->has('operator_id')) {
            return redirect('/login')->withErrors(['login' => 'Silakan login terlebih dahulu.']);
        }*/

        return view('lihatjadwal');
    }

    public function accjadwal()
    {
        /*if (!session()->has('operator_id')) {
            return redirect('/login')->withErrors(['login' => 'Silakan login terlebih dahulu.']);
        }*/

        return view('accjadwal');
    }

    public function statusLab()
    {
        if (!session()->has('operator_id')) {
            return redirect('/login')->withErrors(['login' => 'Silakan login terlebih dahulu.']);
        }

        $labs = Labolatorium::all();
        return view('infolab', compact('labs'));
    }

    public function updateStatusLab(Request $request)
    {
        $request->validate([
            'id_lab' => 'required|exists:labolatorium,id_lab',
            'status' => 'required|in:Tersedia,Tidak tersedia'
        ]);

        $lab = Labolatorium::find($request->id_lab);
        $lab->status = $request->status;
        $lab->save();

        return redirect()->route('statuslab')->with('success', 'Status lab berhasil diperbarui.');
    }

    public function infoakun()
    {
        /*if (!session()->has('operator_id')) {
            return redirect('/login')->withErrors(['login' => 'Silakan login terlebih dahulu.']);
        }*/

        return view('infoakun');
    }
}
