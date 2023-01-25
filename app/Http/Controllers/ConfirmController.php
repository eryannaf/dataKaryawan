<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Yajra\DataTables\Facades\DataTables;

class ConfirmController extends Controller
{
    public function index()
    {
        $members = DB::table('members')->get();
        $confirm = DB::table('confirm')->get();

        $data = [
            'members'    => $members,
            'confirm' => $confirm,
            'script'     => 'components.scripts.confirm'
        ];

        return view('pages.confirm', $data);
    }

    public function show($id) {
        if(is_numeric($id))
        {
            $data = DB::table('confirm')->where('id', $id)->first();



            return Response::json($data);
        }

        $data = DB::table('confirm')
            ->select(['confirm.*'])
        ->orderBy('confirm.id', 'desc');

        return DataTables::of($data)
        ->editColumn('image', function($row){
            $data = array('image' => $row->image);

            return view('components.images.images', $data);
        })
            ->addColumn(
                'action',
                function($row) {
                    $data = [
                        'id' => $row->id
                    ];

                    return view('components.buttons.confirm', $data);
                }
            )



            ->addIndexColumn()
            ->make(true);
    }

    public function store(Request $request)
    {
        if($request->member_id == NULL) {
            $json = [
                'msg'       => 'Mohon masukan Member',
                'status'    => false
            ];
        }  elseif($request->keterangan == NULL) {
            $json = [
                'msg'       => 'Mohon masukan keterangan',
                'status'    => false
            ];
        }elseif($request->file('image') == NULL) {
            $json = [
                'msg'       => 'Mohon masukan gambar',
                'status'    => false
            ];
        }   else {
            try{
                if($request->file('image'))
            {
                $post_image = $request->file('image');
                $extension  = $post_image->getClientOriginalExtension();
                $featuredImageName  = date('YmdHis').'.'.$extension;
                $destination = base_path('public/assets/image/');
                $post_image->move($destination, $featuredImageName);
                //dd($featuredImageName);
            } else { $featuredImageName = "";}

                DB::transaction(function() use($request,$featuredImageName) {
                    DB::table('confirm')->insert([
                        'created_at' => date('Y-m-d H:i:s'),
                        'member_id' => $request->member_id,
                        'image' => $featuredImageName,
                        'keterangan' => $request->keterangan,

                        // 'image' => $request->image,
                    ]);
                });

                $json = [
                    'msg' => 'Confirm berhasil ditambahkan',
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
        // dd($id);
        if($request->member_id == NULL) {
            $json = [
                'msg'       => 'Mohon masukan Member',
                'status'    => false
            ];
        } elseif($request->keterangan == NULL) {
            $json = [
                'msg'       => 'Mohon masukan keterangan',
                'status'    => false
            ];
        }     else {
            try{
                DB::transaction(function() use($request, $id) {
                    DB::table('confirm')->where('id', $id)->update([
                        'created_at' => date('Y-m-d H:i:s'),
                        'member_id' => $request->member_id,
                        'keterangan' => $request->keterangan,
                        'image' => $request->image,

                    ]);
                });

                $json = [
                    'msg' => 'Confirm berhasil diubah',
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

    public function updateStatus($id)
    {
        $data = DB::table('confirm')->where('id', $id)->first();
        $dataStatus = $data->status;


            if($dataStatus == 'Lunas'){
                $dataStatus = 'Belum Lunas';
            } else {
                $dataStatus = 'Lunas';
            }

            try{

                DB::transaction(function() use($id, $dataStatus) {
                    DB::table('confirm')->where('id', $id)->update([
                        'updated_at' => date('Y-m-d H:i:s'),
                        'status'=> $dataStatus,
                    ]);
                });

                $json = [
                    'msg' => 'Pembayaran berhasil disunting',
                    'status' => true
                ];
            } catch(Exception $e) {
                $json = [
                    'msg'       => 'error',
                    'status'    => false,
                    'e'         => $e,
                    'line'      => $e->getLine(),
                    'message'   => $e->getMessage(),
                ];
            }

        return Response::json($json);
    }

    public function destroy($id)
    {
        try{
            DB::transaction(function() use($id){
                DB::table('confirm')->where('id', $id)->delete();
            });

            $json = [
                'msg' => 'Confirm berhasil dihapus',
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

}
