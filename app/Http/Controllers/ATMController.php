<?php

namespace App\Http\Controllers;

use App\Models\Rekening;
use App\Models\User;
use Illuminate\Http\Request;

class ATMController extends Controller
{
    public function tarik_tunai(Request $request)
    {
        $data = $request->except('_token');
        $rekening = Rekening::where('id_user','=',$data['id_user'])->first();
        $saldo_awal = $rekening['nominal'];

        $rekening->update(array('nominal' => ($saldo_awal - $data['nominal'])));

        return response()->json([
            'status' => 200,
            'message' => 'Berhasil menarik uang',
            'data' => [
                'saldo_awal' => $saldo_awal,
                'saldo_sekarang' => $rekening['nominal']
            ]
            ]);
    }

    public function cek_saldo()
    {
        $saldo = Rekening::where('id_user','=',1)->first();
        return response()->json([
            'status' => 200,
            'message' => 'Berhasil mengecek saldo',
            'data' => $saldo['nominal'],
        ]);
    }

    public function pembayaran(Request $request)
    {
        $data = $request->except('_token');
        $rekening = Rekening::where('id_user','=',$data['id_user'])->first();
        $saldo_awal = $rekening['nominal'];

        $rekening->update(array('nominal' => ($saldo_awal - $data['nominal'])));

        return response()->json([
            'status' => 200,
            'message' => 'Berhasil menarik uang',
            'data' => [
                'jenis_pembayaran' => $data['jenis_pembayaran'],
                'saldo_awal' => $saldo_awal,
                'saldo_sekarang' => $rekening['nominal']
            ]
            ]);

    }

    public function transfer(Request $request)
    {
        $data = $request->except('_token');
        $pengirim = User::where('id','=',$data['id_pengirim'])->first();
        $penerima = User::where('id','=',$data['id_penerima'])->first();

        return response()->json([
            'status' => 200,
            'message' => 'Berhasil menarik uang',
            'data' => [
                'nama_pengirim' => $pengirim['nama'],
                'nama_penerima' => $penerima['nama'],
                'nominal' => $data['nominal'],
            ]
            ]);
    }
}
