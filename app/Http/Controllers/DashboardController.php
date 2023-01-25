<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Yajra\DataTables\Facades\DataTables;

class DashboardController extends Controller
{
    public function index()
    {
        $user = DB::table('model_has_roles')
        ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
        ->join('users', 'users.id', '=', 'model_has_roles.model_id')
        ->where('roles.name','<>', 'Super Admin')->count();

        $pegawai = DB::table('pegawais')->count();
        //$produk = DB::table('inventaris')->count();

        return view('pages.dashboard', compact('pegawai'));
    }
}
