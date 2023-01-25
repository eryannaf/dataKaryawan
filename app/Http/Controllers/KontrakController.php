<?php

namespace App\Http\Controllers;

use App\kontrak;
use Illuminate\Http\Request;

class KontrakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $kontrak = Kontrak::get();

        return apiResponse(200, 'success', 'List Kontrak', $data);
    }

    public function destroy($id) {
        try {

            DB::transaction(function () use ($id) {
              Kontrak::where('id', $id)->delete();

            });

            return apiResponse(202, 'success', 'Kontrak berhasil dihapus');
        } catch(Exception $e) {
            return apiResponse(400, 'error', 'error', $e);
        }
    }

    public function show($id) {
        $kontrak = $kontrak::where('id', $id)->first();

        $data = [
            $kontrak
        ];

        if($kontrak) {
            return apiResponse(200, 'success', 'data '.$kontrak->name, $data);
        }

        return Response::json(apiResponse(404, 'not found', 'Kontrak tidak ditemukan'), 404);
    }

    public function store(Request $request) {
        $rules = [
            'pegawai_id'     => 'required',
            'jabatan_id'     => 'required',
            'gaji' => 'required'
        ];

        $message = [
            'pegawai_id.required'        => 'Mohon isikan kontrak id pegawai',
            'jabatan_id.required'        => 'Mohon isikan kontrak id jabatan',
            'gaji.required'    => 'Mohon isikan kontrak gaji',

        ];

        $validator = Validator::make($request->all(), $rules, $message);



        if($validator->fails()) {
            return apiResponse(400, 'error', 'Data tidak lengkap ', $validator->errors());
        }

        try {

            DB::transaction(function () use ($request) {
                $kontrak = Kontrak::insertGetId([
                    'pegawai_id'     => $request->pegawai_id,
                    'jabatan_id'     => $request->jabatan_id,
                    'total_price' => $request->gaji,
                    'created_at' => date('Y-m-d H:i:s')
                ]);


            });

            return apiResponse(201, 'success', 'Kontrak berhasil ditambahkan');
        } catch(Exception $e) {
            return apiResponse(400, 'error', 'error', $e);
        }
    }


    public function update(Request $request, $id) {
      $rules = [
          'gaji'         => 'required',
      ];

      $message = [
          'gaji.required'        => 'Mohon isikan Gaji',
      ];

        $validator = Validator::make($request->all(), $rules, $message);

        if($validator->fails()) {
            return apiResponse(400, 'error', 'Data tidak lengkap ', $validator->errors());
        }

        try {
            DB::transaction(function () use ($request, $id) {
                Kontrak::where('id', $id)->update([
                    'gaji'  => $request->name,
                    'updated_at' => date('Y-m-d H:i:s')
                ]);


            });

            return apiResponse(202, 'success', 'Gaji berhasil dirubah');
        } catch(Exception $e) {
            return apiResponse(400, 'error', 'error', $e);
        }
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
     * @param  \App\kontrak  $kontrak
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\kontrak  $kontrak
     * @return \Illuminate\Http\Response
     */
    public function edit(kontrak $kontrak)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\kontrak  $kontrak
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\kontrak  $kontrak
     * @return \Illuminate\Http\Response
     */
}
