<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use DB;

class ReporteController extends Controller
{
    public function generarPDF()
    {
        // Datos que deseas mostrar en el reporte
        $datos = [
            'titulo' => 'Reporte de Mantenimientos',
            'mantenimientos' => [
                ['id' => 1, 'descripcion' => 'Revisión de hardware', 'fecha' => '2025-01-01'],
                ['id' => 2, 'descripcion' => 'Limpieza interna', 'fecha' => '2025-01-02'],
            ],
        ];
        // Generar la vista para el PDF
        $pdf = Pdf::loadView('reporte.pdf', $datos);
        // Descargar el archivo PDF
        return $pdf->stream('reporte_mantenimientos.pdf');
    }
    public function mantenimientoImdividualPDF($id)
    {
        $mantenimiento = DB::table('mantenimientos')
            ->where('mantenimientos.id','=',$id)
            ->join('personal', 'personal.id', '=', 'mantenimientos.ma_personal')
            ->join('unidades', 'unidades.id', '=', 'personal.unidad_id')
            ->select('unidades.un_nombre','mantenimientos.id','mantenimientos.problema','mantenimientos.solucion','mantenimientos.fecha_hora','personal.pe_nombre','personal.pe_paterno','personal.pe_materno','personal.pe_cargo')
            ->get();
        $datos = [
            'titulo' => 'Reporte de Mantenimientos',
            'mantenimiento' => $mantenimiento
        ];
        $pdf = Pdf::loadView('mantenimiento.reporteIndividual', $datos);
        $pdf->setPaper('letter', 'portrait');
        return $pdf->stream('reporteIndividual.pdf');
    }
    public function ipunidadPDF($id)
    {
        $unidad = DB::table('unidades')
            ->where('unidades.id','=',$id)
            ->select('un_nombre')
            ->get();
        $computadoras = DB::table('computadoras')
            ->where('unidades.id','=',$id)
            ->join('personal', 'personal.id', '=', 'computadoras.personal_id')
            ->join('unidades', 'unidades.id', '=', 'personal.unidad_id')
            ->select('computadoras.co_nombre','computadoras.co_ip','personal.pe_cargo')
            ->get();
        $dispositivos = DB::table('dispositivos')
            ->where('unidades.id','=',$id)
            ->join('personal', 'personal.id', '=', 'dispositivos.di_personal_id')
            ->join('unidades', 'unidades.id', '=', 'personal.unidad_id')
            ->select('dispositivos.di_nombre','dispositivos.di_ip','personal.pe_cargo' )
            ->get();
        $pdf = Pdf::loadView('personal.reporteunidad',compact('unidad','computadoras','dispositivos') );
        $pdf->setPaper('letter', 'portrait');
        return $pdf->stream('reporte.pdf');
    }
    public function ipgeneralPDF()
    {
        $computadoras = DB::table('computadoras')
            ->select('computadoras.co_nombre','computadoras.co_ip','personal.pe_cargo','personal.unidad_id')
            ->join('personal', 'personal.id', '=', 'computadoras.personal_id')
            ->get();
        $unidades = DB::table('unidades')
            ->select('unidades.id','unidades.un_nombre')  
            ->get();
        $pdf = Pdf::loadView('personal.reportegeneral', compact('computadoras','unidades'))
        ->setPaper('a4', 'portrait');
        return $pdf->stream('reportegeneral.pdf');
    }

}
