<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exchange;
use App\exchange_grantees;
use App\Balance;
use DB;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function rpt_cargas_bip(){
    	$cargas_bip = Exchange::where('status', 'Procesado')->orderby('updated_at', 'DESC')->paginate(10);
    	return view('admin.report.cargas_bip')->with(compact('cargas_bip'));
    }

    public function excelCargasBip(){
    	Excel::create('Cargas BIP', function($excel){
    		$excel->sheet('Datos', function($sheet){
    			//Header
    			$sheet->row(2, ['ID', 'Usuario Beneficiado', 'Tarjeta Bip', 'Eco puntos', 'Pesos Chilenos', 'Fecha Carga']);
    			//Data
    			$cargas_bip = Exchange::where('status', 'Procesado')->orderby('updated_at', 'DESC')->get();
    			foreach($cargas_bip as $cargas){
    				$row = [];
    				$row[0] = $cargas->id;
    				$row[1] = $cargas->user->name;
    				$row[2] = $cargas->number_bip;
    				$row[3] = $cargas->quantity_eco;
    				$row[4] = $cargas->clp;
    				$row[5] = $cargas->updated_at;
    				$sheet->appendRow($row);
    			}
    		});
    	})->export('xls');
    }

    public function rpt_donaciones(){
    	$donaciones = exchange_grantees::where('status', 'Procesado')->orderby('updated_at', 'DESC')->paginate(10);
    	return view('admin.report.donaciones')->with(compact('donaciones'));
    }

    public function excelDonaciones(){
    	Excel::create('Donaciones', function($excel){
    		$excel->sheet('Datos', function($sheet){
    			//Header
    			$sheet->row(2, ['ID', 'Usuario Donante', 'Fundación', 'Eco puntos', 'Pesos Chilenos', 'Fecha Donación']);
    			//Data
    			$donaciones = exchange_grantees::where('status', 'Procesado')->orderby('updated_at', 'DESC')->get();
    			foreach($donaciones as $donacion){
    				$row = [];
    				$row[0] = $donacion->id;
    				$row[1] = $donacion->user->name;
    				$row[2] = $donacion->grantee->name;
    				$row[3] = $donacion->quantity_eco;
    				$row[4] = $donacion->clp;
    				$row[5] = $donacion->updated_at;
    				$sheet->appendRow($row);
    			}
    		});
    	})->export('xls');
    }

    public function rpt_saldoDisponible(){
    	$saldos_contable = Db::select('select users.name, sum(if(balances.movement_type_id = '."'1'".', balances.mount, 0)) as m1, sum(if(balances.movement_type_id = '."'2'".', balances.mount, 0)) as m2 from users, balances where users.id = balances.user_id and balances.status = '."'1'".' group by users.name');
        return view('admin.report.saldoDisponible')->with(compact('saldos_contable'));

    }

    public function excelSaldoDisponible(){
    	Excel::create('Saldo Contable por usuarios', function($excel){
    		$excel->sheet('Datos', function($sheet){
    			//Header
    			$sheet->row(2, ['Usuario', 'Entradas', 'Salidas', 'Saldo Contable (ECO)']);
    			//Data
    			$saldos_contable = Db::select('select users.name, sum(if(balances.movement_type_id = '."'1'".', balances.mount, 0)) as m1, sum(if(balances.movement_type_id = '."'2'".', balances.mount, 0)) as m2 from users, balances where users.id = balances.user_id and balances.status = '."'1'".' group by users.name');
    			foreach($saldos_contable as $total){
    				$row = [];
    				$row[0] = $total->name;
    				$row[1] = $total->m1;
    				$row[2] = $total->m2;
    				$row[3] = $total->m1 - $total->m2;
    				$sheet->appendRow($row);
    			}
    		});
    	})->export('xls');
    }

    public function usuariosRegistrados(){
        $resumen_usuarios_mes = DB::select('SELECT monthname(created_at) as mes, count(id) as cantidad from users where admin = '."'0'".' group by monthname(created_at) order by mes DESC');

        $resumen_usuarios_dia = DB::select('SELECT dayname(created_at) as dia, count(id) as cantidad from users where admin = '."'0'".' group by dayname(created_at), dayofweek(created_at) order by dayofweek(created_at)');

        $resumen_usuarios_hora = DB::select('SELECT hour(created_at) as hora, count(id) as cantidad from users where admin = '."'0'".' group by hour(created_at) order by hour(created_at)');



        return view('admin.report.usuariosRegistrados')->with(compact('resumen_usuarios_mes', 'resumen_usuarios_dia', 'resumen_usuarios_hora'));

    }

    public function canjesRegistrados(){
        $resumen_canjes_mes = DB::select('SELECT monthname(transaction_date) as mes, count(id) as cantidad from balances where movement_type_id = "2" group by monthname(transaction_date) order by monthname(transaction_date)');

        $resumen_canjes_dia = DB::select('SELECT dayname(transaction_date) as dia, count(id) as cantidad from balances where movement_type_id = "2" group by dayname(transaction_date), dayofweek(transaction_date) order by dayofweek(transaction_date)');

        $resumen_canjes_hora = DB::select('SELECT hour(transaction_date) as hora, count(id) as cantidad from balances where movement_type_id = "2" group by hour(transaction_date) order by hour(transaction_date)');



        return view('admin.report.canjesRegistrados')->with(compact('resumen_canjes_mes', 'resumen_canjes_dia', 'resumen_canjes_hora'));

    }


}
