<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tabunganModel;

class tabunganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $historyTabungan = tabunganModel::count();
        $totalSetor = tabunganModel::where('tipe', 'setor')->sum('nominal');
        $totalTarik = tabunganModel::where('tipe', 'tarik')->sum('nominal');
        $saldo = $totalSetor - $totalTarik;


        return view('index', compact('saldo', 'historyTabungan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $totalSetor = tabunganModel::where('tipe', 'setor')->sum('nominal');
        $totalTarik = tabunganModel::where('tipe', 'tarik')->sum('nominal');
        $saldo = $totalSetor - $totalTarik;
        return view('create', compact('saldo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $request->validate([
        'tanggal' => 'required|date',
        'nominal' => 'required|numeric|min:500',
        'keterangan' => 'nullable',
    ]);

    tabunganModel::create([
        'tanggal' => $request->tanggal,
        'nominal' => $request->nominal,
        'keterangan' => $request->keterangan,
        'tipe'    => 'setor',
    ]);

    return redirect()->route('tabungan.index');
    }

    public function viewTarik(){
        $totalSetor = tabunganModel::where('tipe', 'setor')->sum('nominal');
        $totalTarik = tabunganModel::where('tipe', 'tarik')->sum('nominal');

        $saldo = $totalSetor - $totalTarik;
        return view('tarik', compact('saldo'));
    }

    public function tarikTabungan(Request $request){
        $request->validate([
            'tanggal'=> 'required|date',
            'nominal'=> 'required|numeric|min:500'
        ]);

        $totalSetor = tabunganModel::where('tipe', 'setor')->sum('nominal');
        $totalTarik = tabunganModel::where('tipe', 'tarik')->sum('nominal');
        $saldo = $totalSetor - $totalTarik;

        if($request->nominal > $saldo){
            echo('saldo kurang');
        } else{
            tabunganModel::create([
                'tanggal'=> $request->tanggal,
                'nominal'=> $request->nominal,
                'tipe' => 'tarik'
            ]);
            return redirect()->route('tabungan.index');
        }

    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
