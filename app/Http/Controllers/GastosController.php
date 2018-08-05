<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gasto;
use Carbon\Carbon;
class GastosController extends Controller
{
    //
    public function create(){

    	return view('gastos');
    }

    public function save(Request $request){

    	// return Gasto::create($request->all());

    	$gasto = new Gasto;
    	$gasto->name  = $request->get('name');
    	$gasto->cant  = $request->get('cant');
    	$gasto->punit  = $request->get('punit');
    	$gasto->total  = ($request->get('total') !== null ) ? $request->get('total') : ($request->get('cant') * $request->get('punit'));

    	$gasto->cdate  = ($request->get('cdate') !== null )  ? Carbon::parse($request->get('cdate')) : Carbon::now(new \DateTimeZone('America/Lima'));
    	$gasto->save();

    	return back()->with('flash','Tu publicacion ha sido creada');
    }

    public function list(){

        $gastos = Gasto::all();
        return view('gastos_detalle', compact('gastos'));
    }
}
