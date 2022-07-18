<?php

namespace App\Http\Controllers;

use App\Models\Anggaran;
use App\Models\Tor;
use App\Models\Unit;
use App\Models\Triwulan;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class PaguController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:pagu_show', ['only' => 'index']);
    }
    public function index()
    {
        $filtertahun = 0;
        $pagu = DB::table('pagu')->get();
        $unit = Unit::all();
        $unit2 = Unit::all();
        $tabeltahun = DB::table('tahun')->get();
        $tabelRole =  Role::all();
        return view(
            "pengaturan.pagu.index",
            compact('pagu', 'tabeltahun', 'filtertahun', 'unit', 'unit2', 'tabelRole')
        );
    }
    public function processAdd(Request $request)
    {
        $request->validate([]);

        $inserting = DB::table('pagu')->insert($request->except('_token'));
        if ($inserting) {
            return redirect()->back()->with("success", "Data berhasil ditambahkan");
        } else {
            return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
        }
    }

    public function processUpdate(Request $request, $id)
    {
        $request->validate([]);

        $process =  DB::table('pagu')->where('id', $id)->update($request->except('_token'));
        if ($process) {
            return redirect()->back()->with("success", "Data berhasil diperbarui");
        } else {
            return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
        }
    }

    public function delete($id)
    {
        $id = base64_decode($id);
        try {
            $process =  DB::table('pagu')->where('id', $id)->delete();
            if ($process) {
                return redirect()->back()->with("success", "Data berhasil dihapus");
            } else {
                return redirect()->back()->withErrors("Terjadi kesalahan saat menghapus data");
            }
        } catch (\Exception $e) {
            abort(404);
        }
    }
    public function filter_tahun(Request $request)
    {
        $filtertahun = $request->tahun;
        $unit = Unit::all();
        $unit2 = Unit::all();
        $tabeltahun = DB::table('tahun')->get();
        $tabelRole =  Role::all();
        if ($request->tahun == 0) {
            $pagu = DB::table('pagu')->get();
            redirect('/pagu');
        }
        if (!empty($request->tahun)) {
            $pagu = DB::table('pagu')->where('id_tahun', 'LIKE', $filtertahun . '%')->get();
        }
        return view(
            "pengaturan.pagu.index",
            [
                'pagu' => $pagu, 'tabeltahun' => $tabeltahun, 'filtertahun' => $filtertahun,
                'unit' => $unit, 'unit2' => $unit2, 'tabelRole' => $tabelRole
            ]
        );
    }
}