<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gasto;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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

    public function getDetailbyDate(Request $request){

        // var_dump($request->get('sdate'));
        $total = 0;
        $gastod = DB::table('gastos')->where([
            ['cdate', '=', $request->get('sdate') ]])->get();

        foreach ($gastod as $key => $value) {
            $total += $value->total;
        }

        $chart1 = \Chart::title([
        'text' => 'Gastos 2018',
        ])
        ->chart([
            'type'     => 'pie', // pie , columnt ect
            'renderTo' => 'chart1', // render the chart into your div with id
        ])
        ->subtitle([
            'text' => 'Gastos',
        ])
        ->colors([
            '#0c2959'
        ])
        ->xaxis([
            'categories' => [
                'Alex Turner',
                'Julian Casablancas',
                'Bambang Pamungkas',
                'Mbah Surip',
            ],
            'labels'     => [
                'rotation'  => 15,
                'align'     => 'top',
                'formatter' => 'startJs:function(){return this.value + " (Footbal Player)"}:endJs', 
                // use 'startJs:yourjavasscripthere:endJs'
            ],
        ])
        ->yaxis([
            'text' => 'This Y Axis',
        ])
        ->legend([
            'layout'        => 'vertikal',
            'align'         => 'right',
            'verticalAlign' => 'middle',
        ])
        ->series(
            [
                [
                    'name'  => $request->get('sdate'),
                    'data'  => [$total],
                    // 'color' => '#0c2959',
                ],
            ]
        )
        ->display();


       
        // $users = User::where('votes', '>', 100)->simplePaginate(15);

        return view('gastos_detalle_2', compact('gastod','chart1'));
        // return $gastod;


    }
}
