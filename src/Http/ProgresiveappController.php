<?php

namespace DigitalsiteSaaS\Progresiveapp\Http;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Input;
use Madzipper;
use File;
use Auth;
use Storage;
use Illuminate\Support\Str;
use DigitalsiteSaaS\Progresiveapp\Webapp;
use Excel;
use GuzzleHttp\Client;
use DigitalsiteSaaS\Pagina\Seo;
use DigitalsiteSaaS\Progresiveapp\Empleado;
use DigitalsiteSaaS\Progresiveapp\Nomina;
use DigitalsiteSaaS\Progresiveapp\Informacion;
use DigitalsiteSaaS\Progresiveapp\Banco;
use DigitalsiteSaaS\Progresiveapp\Periodo;
use DigitalsiteSaaS\Progresiveapp\Salud;
use DigitalsiteSaaS\Progresiveapp\Pension;
use DigitalsiteSaaS\Progresiveapp\Arl;
use DigitalsiteSaaS\Progresiveapp\Cesantia;
use DigitalsiteSaaS\Progresiveapp\Compensacion;
use DateTime;
use DateInterval;
use DatePeriod;

class ProgresiveappController extends Controller
{

    protected $tenantName = null;

 public function __construct(){
  $this->middleware('auth');

  $hostname = app(\Hyn\Tenancy\Environment::class)->hostname();
        if ($hostname){
            $fqdn = $hostname->fqdn;
            $this->tenantName = explode(".", $fqdn)[0];
        }
 }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        if(!$this->tenantName){
     $webapp = Webapp::find(1);
     }else{ 
     $webapp = \DigitalsiteSaaS\Progresiveapp\Tenant\Webapp::find(1);
     }
     return view('progresiveapp::creawebapp')->with('webapp', $webapp)->with('status', 'ok_update');
    }


     public function update(){
     $input = Input::all();
     if(!$this->tenantName){
     $updateapp = Webapp::find(1);
     $webapp = Webapp::find(1);
     }else{
     $updateapp = \DigitalsiteSaaS\Progresiveapp\Tenant\Webapp::find(1);  
     $webapp = \DigitalsiteSaaS\Progresiveapp\Tenant\Webapp::find(1);
     }
     $updateapp->name = Input::get('name');
     $updateapp->short_name = Input::get('short_name');
     $updateapp->start_url = Input::get('start_url');
     $updateapp->background_color = Input::get('background_color');
     $updateapp->theme_color = Input::get('theme_color');
     $updateapp->display = Input::get('display');
     $updateapp->orientation = Input::get('orientation');
     $updateapp->status_bar = Input::get('status_bar');
     $updateapp->icons = Input::get('icons');
     $updateapp->categories = Input::get('categories');
     $updateapp->save();
     return Redirect('gestion/progresiveapp')->with('webapp', $webapp)->with('status', 'ok_update');
}


 public function nomina(){
if(!$this->tenantName){
  $empleados = Empleado::leftjoin('informacion','empleados.id','=','informacion.empleado_id')
  ->select("empleados.id","empleados.created_at","empleados.nombre","empleados.cargo","informacion.inicio","informacion.fin","empleados.documento","informacion.empleado_id")->get();

 }else{
   $empleados = \DigitalsiteSaaS\Progresiveapp\Tenant\Empleado::leftjoin('informacion','empleados.id','=','informacion.empleado_id')->get();
 }
  
  return View('progresiveapp::nomina')->with('empleados', $empleados);
 }



 public function vernominas(){
if(!$this->tenantName){
  $empleados = Empleado::leftjoin('informacion','empleados.id','=','informacion.empleado_id')
  ->select("empleados.id","empleados.created_at","empleados.nombre","empleados.cargo","informacion.inicio","informacion.fin","empleados.documento")->get();

 }else{
   $empleados = \DigitalsiteSaaS\Progresiveapp\Tenant\Empleado::leftjoin('informacion','empleados.id','=','informacion.empleado_id')->get();
 }
  
  return View('progresiveapp::vernominas')->with('empleados', $empleados);
 }


public function dashboard(){
 $empleados = Empleado::count();
 dd($empleados);
  return View('progresiveapp::dashboard');
 }


 public function empleados(){
$from = date('2022-05-02');
$to = date('2022-05-10');

$dato = Informacion::whereBetween('inicio', [$from, $to])->count();
$fecha = Periodo::select('codigo')->orderBy('codigo', 'desc')->take(1)->get();

if(!$this->tenantName){
$empleados = Empleado::leftjoin('informacion','empleados.id','=','informacion.empleado_id')
 ->leftjoin('nominas','empleados.id','=', 'nominas.empleado_id')
 ->select(DB::raw('max(nominas.periodo_nom) as complejo'),DB::raw('max(nominas.id) as identificador'),"empleados.id","empleados.created_at","empleados.nombre","empleados.cargo","informacion.inicio","informacion.fin","empleados.documento","informacion.sueldo","informacion.por_salud","informacion.por_pensiones","empleados.tipo_nomina","nominas.periodo_nom","informacion.peridiocidad","informacion.empleado_id","nominas.id")

 ->groupBy('empleados.documento')

  ->get();

 }else{
   $empleados = \DigitalsiteSaaS\Progresiveapp\Tenant\Empleado::leftjoin('informacion','empleados.id','=','informacion.empleado_id')->get();
 }

  return View('progresiveapp::empleados')->with('empleados', $empleados)->with('fecha', $fecha);
 }


public function empleadonuevo(){
  $bancos = Banco::all();
  return View('progresiveapp::nuevo-empleado')->with('bancos', $bancos);
 }

 public function loginnomina(){
  
  return View('progresiveapp::loginnomina');
 }

 public function infolaboral(){
  $pensiones = Pension::all();
  $salud = Salud::all();
  $arl = Arl::all();
  $cesantias = Cesantia::all();
  $compensaciones = Compensacion::all();
  return View('progresiveapp::infolaboral')->with('pensiones', $pensiones)->with('salud', $salud)->with('arl', $arl)->with('cesantias', $cesantias)->with('compensaciones', $compensaciones);
 }

  public function configuracion(){
  
  return View('progresiveapp::configuracion');
 }

  public function procesos($id){
  $nomina = Nomina::where('id','=',$id)->get();

  return View('progresiveapp::proceso')->with('nomina', $nomina);
 }



 public function desprendible($id){
  $datos = Empleado::leftjoin('informacion','empleados.id','=','informacion.empleado_id')->where('empleados.id','=',$id)->get();

  return View('progresiveapp::desprendible')->with('datos', $datos);
 }

 public function periodos(){
  

  return View('progresiveapp::periodos');
 }


public function crearempleado(){
  date_default_timezone_set('America/Bogota');
   if(!$this->tenantName){
   $empleado = new Empleado;
   }else{
   $empleado = new \DigitalsiteSaaS\Progresiveapp\Tenant\Empelado;
   }
   $empleado->nombre = Input::get('val-nombre');
   $empleado->apellido = Input::get('val-apellido');
   $empleado->correo = Input::get('val-email');
   $empleado->telefono = Input::get('val-telefono');
   $empleado->tipodoc = Input:: get ('val-tipo');
   $empleado->documento = Input:: get ('val-numero');
   $empleado->direccion = Input:: get ('val-direccion');
   $empleado->ciudad = Input:: get ('val-ciudad');
   $empleado->tipago = Input:: get ('valtipo');
   $empleado->banco_id = Input:: get ('val-banco');
   $empleado->tipocuenta = Input:: get ('val-tipcuenta');
   $empleado->numerocu = Input:: get ('val-cuenta');
   $empleado->save();
   return Redirect('gestion/empleados')->with('status', 'ok_create');
 }

public function editarempleado($id){
  $empleados = Empleado::leftjoin('bancos','bancos.id','=','empleados.banco_id')->where('empleados.id','=',$id)->get();
  $datos = Empleado::leftjoin('bancos','bancos.id','=','empleados.banco_id')->where('empleados.id','=',$id)->get();

  $bancos = Banco::all();
  return View('progresiveapp::editarempleado')->with('empleados', $empleados)->with('bancos', $bancos);
 }

 public function editarinformacion($id){
  $informacion = Informacion::leftjoin('entidades_pension','entidades_pension.id','=','informacion.pensiones_id')
  ->leftjoin('entidades_arl','entidades_arl.id','=','informacion.arl_id')
  ->leftjoin('entidades_cesantias','entidades_cesantias.id','=','informacion.cesantias_id')
  ->leftjoin('entidades_compensaciones','entidades_compensaciones.id','=','informacion.caja_id')
  ->leftjoin('entidades_salud','entidades_salud.id','=','informacion.salud_id')
  ->select('informacion.tipo_contrato','informacion.sueldo','informacion.inicio','informacion.fin','informacion.tipo_sueldo','informacion.tipo_cotizante','entidades_salud.salud','informacion.por_salud','entidades_pension.pension','informacion.por_pensiones','entidades_arl.arl','informacion.por_arl','entidades_compensaciones.compensaciones','entidades_cesantias.cesantias','informacion.id','informacion.salud_id','informacion.pensiones_id','informacion.empleado_id','informacion.arl_id','informacion.caja_id','informacion.cesantias_id')
  ->where('informacion.empleado_id','=',$id)->get();

  $pensiones = Pension::all();
  $salud = Salud::all();
  $arl = Arl::all();
  $cesantias = Cesantia::all();
  $compensaciones = Compensacion::all();
  $bancos = Banco::all();
  return View('progresiveapp::editarinformacion')->with('informacion', $informacion)->with('bancos', $bancos)->with('pensiones', $pensiones)->with('salud', $salud)->with('arl', $arl)->with('cesantias', $cesantias)->with('compensaciones', $compensaciones);
 }






public function crearinformacion(){
  date_default_timezone_set('America/Bogota');
   if(!$this->tenantName){
   $empleado = new Informacion;
   }else{
   $empleado = new \DigitalsiteSaaS\Calendario\Tenant\Informacion;
   }
   $empleado->tipo_contrato = Input::get('val-tipocontrato');
   $empleado->sueldo = Input::get('val-sueldo');
   $empleado->inicio = Input::get('val-inicio');
   $empleado->fin = Input::get('val-fin');
   $empleado->tipo_sueldo = Input:: get ('val-tiposueldo');
   $empleado->tipo_cotizante = Input:: get ('val-tipocot');
   $empleado->salud_id = Input:: get ('val-salud');
   $empleado->por_salud = Input:: get ('val-porcentajesalud');
   $empleado->pensiones_id = Input:: get ('val-pensiones');
   $empleado->por_pensiones = Input:: get ('val-porcentajepensiones');
   $empleado->arl_id = Input:: get ('val-arl');
   $empleado->por_arl = Input:: get ('val-porcentajearl');
   $empleado->caja_id = Input:: get ('val-caja');
   $empleado->cesantias_id = Input:: get ('val-cesantias');
   $empleado->empleado_id = Input:: get ('empleado-id');
   $empleado->save();
   return Redirect('gestion/empleados')->with('status', 'ok_create');
 }





 public function updateempleado($id){
  $input = Input::all();
  if(!$this->tenantName){
   $empleado = Empleado::find($id);
   }else{
   $empleado = \DigitalsiteSaaS\Pagina\Tenant\Empleado::find($id);
   }
   $empleado->nombre = Input::get('val-nombre');
   $empleado->apellido = Input::get('val-apellido');
   $empleado->correo = Input::get('val-email');
   $empleado->telefono = Input::get('val-telefono');
   $empleado->tipodoc = Input::get('val-tipo');
   $empleado->documento = Input::get('val-numero');
   $empleado->direccion = Input::get('val-direccion');
   $empleado->ciudad = Input::get('val-ciudad');
   $empleado->tipago = Input::get('valtipo');
   $empleado->banco_id = Input::get('val-banco');
   $empleado->tipocuenta = Input::get('val-tipcuenta');
   $empleado->numerocu = Input::get('val-cuenta');
   $empleado->save();
   return Redirect('gestion/empleados')->with('status', 'ok_update');
 }


 public function updateinformacion($id){
  $input = Input::all();
  if(!$this->tenantName){
   $empleado = Informacion::find($id);
   }else{
   $empleado = \DigitalsiteSaaS\Pagina\Tenant\Informacion::find($id);
   }
   $empleado->tipo_contrato = Input::get('val-tipocontrato');
   $empleado->sueldo = Input::get('val-sueldo');
   $empleado->inicio = Input::get('val-inicio');
   $empleado->fin = Input::get('val-fin');
   $empleado->tipo_sueldo = Input:: get ('val-tiposueldo');
   $empleado->tipo_cotizante = Input:: get ('val-tipocot');
   $empleado->salud_id = Input:: get ('val-salud');
   $empleado->por_salud = Input:: get ('val-porcentajesalud');
   $empleado->pensiones_id = Input:: get ('val-pensiones');
   $empleado->por_pensiones = Input:: get ('val-porcentajepensiones');
   $empleado->arl_id = Input::get('val-arl');
   $empleado->por_arl = Input::get('val-porcentajearl');
   $empleado->caja_id = Input::get('val-caja');
   $empleado->cesantias_id = Input::get('val-cesantias');
   $empleado->empleado_id = Input::get('empleado-id');
   $empleado->save();
   return Redirect('gestion/empleados')->with('status', 'ok_update');
 }




 public function generarnomina(){
  date_default_timezone_set('America/Bogota');
   if(!$this->tenantName){
   $nomina = new Nomina;
   }else{
   $nomina = new \DigitalsiteSaaS\Calendario\Tenant\Nomina;
   }
   $nomina->periodo_nom = Input::get('val-periodo');
   $nomina->sueldo_base = Input::get('val-sueldo');
   $nomina->salud = Input::get('val-salud');
   $nomina->pension = Input::get('val-pension');
   $nomina->empleado_id = Input::get('val-empleado');
   $nomina->auxilio_transporte = Input::get('val-auxilio');
   $nomina->save();
   return Redirect('gestion/empleados')->with('status', 'ok_create');
 }

 public function crearperiodo(){
  date_default_timezone_set('America/Bogota');
   if(!$this->tenantName){
   $periodo = new Periodo;
   }else{
   $periodo = new \DigitalsiteSaaS\Calendario\Tenant\Periodo;
   }
   $periodo->periodo = Input::get('val-periodo');
   $periodo->mes = Input::get('val-mes');
   $periodo->ano = Input::get('val-ano'); 
   $periodo->codigo = $periodo->periodo.'_'.$periodo->mes.'_'.$periodo->ano; 
   $periodo->save();
   return Redirect('gestion/periodos')->with('status', 'ok_create');
 }

 public function bancos(){
  $bancos = Banco::all();

  return View('progresiveapp::bancos')->with('bancos', $bancos);
 }

 public function crearbanco(){
  date_default_timezone_set('America/Bogota');
   if(!$this->tenantName){
   $bancos = new Banco;
   }else{
   $bancos = new \DigitalsiteSaaS\Calendario\Tenant\Banco;
   }
   $bancos->banco = Input::get('val-banco');
   $bancos->identificador = Input::get('val-identificador');
   $bancos->save();
   return Redirect('nomina/bancos')->with('status', 'ok_create');
 }


 public function editarbanco(){
  $id = Input::get('val-id');
  if(!$this->tenantName){
  $bancos = Banco::find($id);
  }else{
  $bancos = \DigitalsiteSaaS\Pagina\Tenant\Banco::find($id);
  }
  $bancos->banco = Input::get('val-banco');
  $bancos->identificador = Input::get('val-identificador');
  $bancos->save();
   return Redirect('nomina/bancos')->with('status', 'ok_update');
 }

  public function eliminarbanco($id){
        $bancos = Banco::find($id);
        $bancos->delete();
        
        return Redirect('nomina/bancos')->with('status', 'ok_delete');
    }

   public function salud(){
  $bancos = Salud::all();

  return View('progresiveapp::salud')->with('bancos', $bancos);
 }

 public function crearsalud(){
  date_default_timezone_set('America/Bogota');
   if(!$this->tenantName){
   $bancos = new Salud;
   }else{
   $bancos = new \DigitalsiteSaaS\Calendario\Tenant\Salud;
   }
   $bancos->salud = Input::get('val-salud');
   $bancos->identificador = Input::get('val-identificador');
   $bancos->save();
   return Redirect('nomina/salud')->with('status', 'ok_create');
 }


 public function editarsalud(){
  $id = Input::get('val-id');
  if(!$this->tenantName){
  $bancos = Salud::find($id);
  }else{
  $bancos = \DigitalsiteSaaS\Pagina\Tenant\Salud::find($id);
  }
  $bancos->salud = Input::get('val-salud');
  $bancos->identificador = Input::get('val-identificador');
  $bancos->save();
   return Redirect('nomina/salud')->with('status', 'ok_update');
 }

  public function eliminarsalud($id){
        $bancos = Salud::find($id);
        $bancos->delete();
        
        return Redirect('nomina/salud')->with('status', 'ok_delete');
    }


    public function pensiones(){
  $bancos = Pension::all();

  return View('progresiveapp::pensiones')->with('bancos', $bancos);
 }

 public function crearpensiones(){
  date_default_timezone_set('America/Bogota');
   if(!$this->tenantName){
   $bancos = new Pension;
   }else{
   $bancos = new \DigitalsiteSaaS\Calendario\Tenant\Pension;
   }
   $bancos->pension = Input::get('val-pension');
   $bancos->identificador = Input::get('val-identificador');
   $bancos->save();
   return Redirect('nomina/pensiones')->with('status', 'ok_create');
 }


 public function editarpensiones(){
  $id = Input::get('val-id');
  if(!$this->tenantName){
  $bancos = Pension::find($id);
  }else{
  $bancos = \DigitalsiteSaaS\Pagina\Tenant\Pension::find($id);
  }
  $bancos->pension = Input::get('val-pension');
  $bancos->identificador = Input::get('val-identificador');
  $bancos->save();
   return Redirect('nomina/pensiones')->with('status', 'ok_update');
 }

  public function eliminarpensiones($id){
        $bancos = Pension::find($id);
        $bancos->delete();
        
        return Redirect('nomina/pensiones')->with('status', 'ok_delete');
    }


     public function arl(){
  $bancos = Arl::all();

  return View('progresiveapp::arl')->with('bancos', $bancos);
 }

 public function creararl(){
  date_default_timezone_set('America/Bogota');
   if(!$this->tenantName){
   $bancos = new Arl;
   }else{
   $bancos = new \DigitalsiteSaaS\Calendario\Tenant\Arl;
   }
   $bancos->arl = Input::get('val-arl');
   $bancos->identificador = Input::get('val-identificador');
   $bancos->save();
   return Redirect('nomina/arl')->with('status', 'ok_create');
 }


 public function editararl(){
  $id = Input::get('val-id');
  if(!$this->tenantName){
  $bancos = Arl::find($id);
  }else{
  $bancos = \DigitalsiteSaaS\Pagina\Tenant\Arl::find($id);
  }
  $bancos->arl = Input::get('val-arl');
  $bancos->identificador = Input::get('val-identificador');
  $bancos->save();
   return Redirect('nomina/arl')->with('status', 'ok_update');
 }

  public function eliminararl($id){
        $bancos = Arl::find($id);
        $bancos->delete();
        
        return Redirect('nomina/arl')->with('status', 'ok_delete');
    }

public function cesantias(){
  $bancos = Cesantia::all();

  return View('progresiveapp::cesantias')->with('bancos', $bancos);
 }

 public function crearcesantias(){
  date_default_timezone_set('America/Bogota');
   if(!$this->tenantName){
   $bancos = new Cesantia;
   }else{
   $bancos = new \DigitalsiteSaaS\Calendario\Tenant\Cesantia;
   }
   $bancos->cesantias = Input::get('val-cesantias');
   $bancos->identificador = Input::get('val-identificador');
   $bancos->save();
   return Redirect('nomina/cesantias')->with('status', 'ok_create');
 }


 public function editarcesantias(){
  $id = Input::get('val-id');
  if(!$this->tenantName){
  $bancos = Cesantia::find($id);
  }else{
  $bancos = \DigitalsiteSaaS\Pagina\Tenant\Cesantia::find($id);
  }
  $bancos->cesantias = Input::get('val-cesantias');
  $bancos->identificador = Input::get('val-identificador');
  $bancos->save();
   return Redirect('nomina/cesantias')->with('status', 'ok_update');
 }

  public function eliminarcesantias($id){
        $bancos = Cesantia::find($id);
        $bancos->delete();
        
        return Redirect('nomina/cesantias')->with('status', 'ok_delete');
    }




public function compensaciones(){
  $bancos = Compensacion::all();

  return View('progresiveapp::compensaciones')->with('bancos', $bancos);
 }

 public function crearcompensaciones(){
  date_default_timezone_set('America/Bogota');
   if(!$this->tenantName){
   $bancos = new Compensacion;
   }else{
   $bancos = new \DigitalsiteSaaS\Calendario\Tenant\Compensacion;
   }
   $bancos->compensaciones = Input::get('val-compensaciones');
   $bancos->identificador = Input::get('val-identificador');
   $bancos->save();
   return Redirect('nomina/compensaciones')->with('status', 'ok_create');
 }


 public function editarcompensaciones(){
  $id = Input::get('val-id');
  if(!$this->tenantName){
  $bancos = Compensacion::find($id);
  }else{
  $bancos = \DigitalsiteSaaS\Pagina\Tenant\Compensacion::find($id);
  }
  $bancos->compensaciones = Input::get('val-compensaciones');
  $bancos->identificador = Input::get('val-identificador');
  $bancos->save();
   return Redirect('nomina/compensaciones')->with('status', 'ok_update');
 }

  public function eliminarcompensaciones($id){
        $bancos = Compensacion::find($id);
        $bancos->delete();
        
        return Redirect('nomina/compensaciones')->with('status', 'ok_delete');
    }


}
