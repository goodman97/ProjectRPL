<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Operator;
use App\Models\Labolatorium;

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
                'nama_operator' => $operator->nama_operator
            ]);
            return view('operator.dashboardoperator');
        } else {
            return back()->withErrors(['login' => 'Username atau Password salah.']);
        }
    }

    public function dashboard()
    {
        if (!session()->has('operator_id')) {
            return redirect('/login')->withErrors(['login' => 'Silakan login terlebih dahulu.']);
        }

        $operator = Operator::where('id_operator', session('operator_id'))->first();

        return view('operator.dashboardoperator', compact('operator'));
    }

    public function lihatjadwal()
    {
        /*if (!session()->has('operator_id')) {
            return redirect('/login')->withErrors(['login' => 'Silakan login terlebih dahulu.']);
        }*/

        $operator = Operator::where('id_operator', session('operator_id'))->first();

        return view('operator.lihatjadwal', compact('operator'));
    }

    public function accjadwal()
    {
        /*if (!session()->has('operator_id')) {
            return redirect('/login')->withErrors(['login' => 'Silakan login terlebih dahulu.']);
        }*/

        $operator = Operator::where('id_operator', session('operator_id'))->first();

        return view('operator.accjadwal', compact('operator'));
    }

    public function statusLab()
    {
        if (!session()->has('operator_id')) {
            return redirect('/login')->withErrors(['login' => 'Silakan login terlebih dahulu.']);
        }

        $operator = Operator::where('id_operator', session('operator_id'))->first();
        $labs = Labolatorium::all();

        return view('operator.infolab', compact('labs', 'operator'));
    }

    public function updateStatusLab(Request $request)
    {
        $request->validate([
            'id_lab' => 'required|exists:labolatorium,id_lab',
            'status' => 'required|in:Tersedia,Tidak tersedia'
        ]);

        $operator = Operator::where('id_operator', session('operator_id'))->first();
        $lab = Labolatorium::find($request->id_lab);
        $lab->status = $request->status;
        $lab->save();

        return redirect()->route('statuslab')->with('success', 'Status lab berhasil diperbarui.');
    }

    public function profile()
    {
        if (!session()->has('operator_id')) {
            return redirect('/login')->withErrors(['login' => 'Silakan login terlebih dahulu.']);
        }

        $operator = Operator::where('id_operator', session('operator_id'))->first();

        return view('operator.profile', compact('operator'));
    }

    public function editProfile()
    {
        if (!session()->has('operator_id')) return redirect('/login');
        $operator = Operator::where('id_operator', session('operator_id'))->first();
        return view('operator.editprofileoperator', compact('operator'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $operator = Operator::where('id_operator', session('operator_id'))->first();
        $operator->email = $request->email;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('foto_operator'), $filename);
            $operator->foto = $filename;
        }

        $operator->save();

        return redirect('/profile')->with('success', 'Profil berhasil diperbarui.');
    }
}
