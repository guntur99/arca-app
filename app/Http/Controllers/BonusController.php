<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class BonusController extends Controller
{
    public function __construct()
    {
        $this->now = Carbon::now();
    }

    public function form(){
        return view('form');
    }

    public function list(){

        // Query Builder
        $buruh = \DB::table('buruh')->orderBy('created_at','desc')->get();

        return view('list', [
            'buruh' => $buruh,
        ]);
    }

    public function update(Request $req){

        $inputs = $req->except('id');
        try {
            \DB::table('buruh')
                ->where('id', $req->id)
                ->update($inputs);

            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollBack();
            \Log::error('Error : '.$e->getMessage().' File : '.$e->getFile().' ('.$e->getLine().') -- Request : '.json_encode($data_buruh));
            return response()->json('Error', 500);
        }

        return response()->json('Success', 200);
    }

    public function delete($id){

        try {
            \DB::table('buruh')
                ->where('id', $id)
                ->delete();

            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollBack();
            \Log::error('Error : '.$e->getMessage().' File : '.$e->getFile().' ('.$e->getLine().') -- Request : '.json_encode($data_buruh));
            return response()->json('Error', 500);
        }

        return response()->json('Success', 200);
    }

    public function detail($id){

        // Query Builder
        $detail_buruh = \DB::table('buruh')->where('id', $id)->get();
        // dd($detail_buruh);

        return $detail_buruh;
    }

    public function store(Request $req){

        $inputs = $req->all();
        $data_buruh = [];
        foreach (\json_decode($inputs['data_buruh']) as $data) {
            $data_buruh[] = [
                'nama'           => $data->nama_buruh,
                'bonus'          => $data->bonus_buruh,
                'bonus_persen'   => $data->bonus_persen,
                'total_bonus'    => $data->total_bonus,
                'created_at'     => $this->now->toDateTimeString()
            ];
        }

        \DB::beginTransaction();
        try {
            foreach ($data_buruh as $data) {
                \DB::table('buruh')
                    ->insert($data);
            }
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollBack();
            \Log::error('Error : '.$e->getMessage().' File : '.$e->getFile().' ('.$e->getLine().') -- Request : '.json_encode($data_buruh));
            return response()->json('Error', 500);
        }

        return response()->json('Success', 200);
    }
}
