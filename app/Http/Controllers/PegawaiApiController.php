<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PegawaiApiController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::get();

        return apiResponse(200, 'success', 'List Pegawai', $data);
    }

    public function destroy($id) {
        try {

            DB::transaction(function () use ($id) {
              Pegawai::where('id', $id)->delete();

            });

            return apiResponse(202, 'success', 'Pegawai berhasil dihapus');
        } catch(Exception $e) {
            return apiResponse(400, 'error', 'error', $e);
        }
    }

    public function show($id) {
        $pegawai = $pegawai::where('id', $id)->first();

        $data = [
            $pegawai
        ];

        if($pegawai) {
            return apiResponse(200, 'success', 'data '.$pegawai->name, $data);
        }

        return Response::json(apiResponse(404, 'not found', 'Pegawai tidak ditemukan'), 404);
    }

    public function store(Request $request) {
        $rules = [
            'name'     => 'required',
            'nip'     => 'required',
            'phone'     => 'required',
            'address'     => 'required',
            'jabatan'     => 'required'
        ];

        $message = [
            'name.required'        => 'Mohon isikan nama pegawai',
            'nip.required'        => 'Mohon isikan nip pegawai',
            'phone.required'        => 'Mohon isikan nomor telepon pegawai',
            'address.required'        => 'Mohon isikan alamat pegawai',
            'jabatan.required'    => 'Mohon isikan jabatan pegawai'

        ];

        $validator = Validator::make($request->all(), $rules, $message);



        if($validator->fails()) {
            return apiResponse(400, 'error', 'Data tidak lengkap ', $validator->errors());
        }

        try {

            DB::transaction(function () use ($request) {
                $pegawai = Pegawai::insertGetId([
                    'name'     => $request->name,
                    'nip'     => $request->nip,
                    'phone'     => $request->phone,
                    'address'     => $request->address,
                    'jabatan'     => $request->jabatan,
                    'created_at' => date('Y-m-d H:i:s')
                ]);


            });

            return apiResponse(201, 'success', 'Pegawai berhasil ditambahkan');
        } catch(Exception $e) {
            return apiResponse(400, 'error', 'error', $e);
        }
    }


    public function update(Request $request, $id) {
      $rules = [
          'name'         => 'required',
          'nip'         => 'required',
          'phone'         => 'required',
          'address'         => 'required',
          'jabatan'         => 'required',
      ];

      $message = [
            'name.required'        => 'Mohon isikan nama pegawai',
            'nip.required'        => 'Mohon isikan nip pegawai',
            'phone.required'        => 'Mohon isikan nomor telepon pegawai',
            'address.required'        => 'Mohon isikan alamat pegawai',
            'jabatan.required'    => 'Mohon isikan jabatan pegawai'
      ];

        $validator = Validator::make($request->all(), $rules, $message);

        if($validator->fails()) {
            return apiResponse(400, 'error', 'Data tidak lengkap ', $validator->errors());
        }

        try {
            DB::transaction(function () use ($request, $id) {
                Pegawai::where('id', $id)->update([
                    'name'     => $request->name,
                    'nip'     => $request->nip,
                    'phone'     => $request->phone,
                    'address'     => $request->address,
                    'jabatan'     => $request->jabatan,
                    'created_at' => date('Y-m-d H:i:s')
                ]);
            });

            return apiResponse(202, 'success', 'Pegawai berhasil diubah');
        } catch(Exception $e) {
            return apiResponse(400, 'error', 'error', $e);
        }
    }
}
