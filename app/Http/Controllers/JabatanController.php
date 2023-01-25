<?php

namespace App\Http\Controllers;

use App\jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $data = [
            'script' => 'components.scripts.jabatan'
        ];

        return view('pages.jabatan', $data);
    }

    public function show($id) {
        if(is_numeric($id))
        {
            $data = DB::table('pegawais')->where('id', $id)->first();

            return Response::json($data);
        }

        $data = DB::table('pegawais')
            ->select(['pegawais.*'])
        ->orderBy('pegawais.id', 'desc');

        return DataTables::of($data)
            ->addColumn(
                'action',
                function($row) {
                    $data = [
                        'id' => $row->id
                    ];

                    return view('components.buttons.pegawai', $data);
                }
            )
            ->addIndexColumn()
            ->make(true);
    }

    public function store(Request $request)
    {
        $result = DB::table('pegawais')->where('phone', $request->phone)->count();
        if($request->name == NULL) {
            $json = [
                'msg'       => 'Mohon masukan nama pegawai',
                'status'    => false
            ];
        } elseif(!$request->nip) {
            $json = [
                'msg'       => 'Mohon masukan nip pegawai',
                'status'    => false
            ];
        }
        elseif($request->phone == NULL || $result > 0) {
            if($request->phone == NULL){
                $json = [
                    'msg'       => 'Mohon masukan nomor telepon pegawai',
                    'status'    => false
                ];
            }else{
                $json = [
                    'msg'       => 'Nomor Telepon ini telah digunakan',
                    'status'    => false
                ];
            }
        }elseif(!$request->address) {
            $json = [
                'msg'       => 'Mohon masukan alamat pegawai',
                'status'    => false
            ];
        } elseif(!$request->jabatan) {
            $json = [
                'msg'       => 'Mohon masukan jabatan pegawai',
                'status'    => false
            ];
        }
        else {
            try{
                DB::transaction(function() use($request) {
                    DB::table('pegawais')->insert([
                        'created_at' => date('Y-m-d H:i:s'),
                        'name' => $request->name,
                        'nip' => $request->nip,
                        'phone' => $request->phone,
                        'address' => $request->address,
                        'jabatan' => $request->jabatan
                    ]);
                });

                $json = [
                    'msg' => 'Pegawai berhasil ditambahkan',
                    'status' => true
                ];
            } catch(Exception $e) {
                $json = [
                    'msg'       => 'error',
                    'status'    => false,
                    'e'         => $e
                ];
            }
        }

        return Response::json($json);
    }

    public function update(Request $request, $id)
    {
        $new = DB::table('pegawais')
            ->where('phone', $request->phone)
            ->where('id', '<>', $id)
            ->count();

        if($request->name == NULL) {
            $json = [
                'msg'       => 'Mohon masukan nama pegawai',
                'status'    => false
            ];
        } elseif(!$request->nip) {
            $json = [
                'msg'       => 'Mohon masukan nip pegawai',
                'status'    => false
            ];
        } elseif($request->phone == NULL || $new > 0 ) {
            if($request->phone == NULL){
                $json = [
                    'msg'       => 'Mohon masukan nomor telepon pegawai',
                    'status'    => false
                ];
            } else{
                $json = [
                    'msg'       => 'Nomor Telepon ini telah digunakan',
                    'status'    => false
                ];
            }
        } elseif(!$request->address) {
            $json = [
                'msg'       => 'Mohon masukan alamat pegawai',
                'status'    => false
            ];
        } elseif(!$request->jabatan) {
            $json = [
                'msg'       => 'Mohon masukan alamat pegawai',
                'status'    => false
            ];
        }
         else {
            try{
                DB::transaction(function() use($request, $id) {
                    DB::table('pegawais')->where('id', $id)->update([
                        'updated_at' => date('Y-m-d H:i:s'),
                        'name' => $request->name,
                        'nip' => $request->nip,
                        'phone' => $request->phone,
                        'address' => $request->address,
                        'jabatan' => $request->jabatan
                    ]);
                });

                $json = [
                    'msg' => 'Pegawai berhasil disunting',
                    'status' => true
                ];
            } catch(Exception $e) {
                $json = [
                    'msg'       => 'error',
                    'status'    => false,
                    'e'         => $e
                ];
            }
        }

        return Response::json($json);
    }

    public function destroy($id)
    {
        try{
            DB::transaction(function() use($id){
                DB::table('pegawais')->where('id', $id)->delete();
            });

            $json = [
                'msg' => 'Pegawai berhasil dihapus',
                'status' => true
            ];
        } catch(Exception $e){
            $json = [
                'msg' => 'error',
                'status' => false,
                'e' => $e,
            ];
        };

        return Response::json($json);
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

    /**
     * Display the specified resource.
     *
     * @param  \App\jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
}
