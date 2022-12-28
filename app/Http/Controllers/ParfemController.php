<?php

namespace App\Http\Controllers;

use App\Http\Resources\ParfemResurs;
use App\Models\Parfem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ParfemController extends HandleController
{
    public function index()
    {
        $sve = Parfem::all();
        return $this->success(ParfemResurs::collection($sve), 'Vraceni su svi parfemi.');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'naziv' => 'required',
            'proizvodjacID' => 'required',
            'polID' => 'required',
            'cena' => 'required'
        ]);
        if($validator->fails()){
            return $this->error($validator->errors());
        }

        $parfem = Parfem::create($input);

        return $this->success(new ParfemResurs($parfem), 'Novi parfem je kreiran.');
    }


    public function show($id)
    {
        $parfem = Parfem::find($id);
        if (is_null($parfem)) {
            return $this->error('Parfem sa zadatim id-em ne postoji.');
        }
        return $this->success(new ParfemResurs($parfem), 'Parfem sa zadatim id-em je vracen.');
    }


    public function update(Request $request, $id)
    {
        $parfem = Parfem::find($id);
        if (is_null($parfem)) {
            return $this->error('Parfem sa zadatim id-em ne postoji.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'naziv' => 'required',
            'proizvodjacID' => 'required',
            'polID' => 'required',
            'cena' => 'required'
        ]);

        if($validator->fails()){
            return $this->error($validator->errors());
        }

        $parfem->naziv = $input['naziv'];
        $parfem->proizvodjacID = $input['proizvodjacID'];
        $parfem->polID = $input['polID'];
        $parfem->cena = $input['cena'];
        $parfem->save();

        return $this->success(new ParfemResurs($parfem), 'Parfem je azuriran.');
    }

    public function destroy($id)
    {
        $parfem = Parfem::find($id);
        if (is_null($parfem)) {
            return $this->error('Parfem sa zadatim id-em ne postoji.');
        }

        $parfem->delete();
        return $this->success([], 'Parfem je obrisan.');
    }
}
