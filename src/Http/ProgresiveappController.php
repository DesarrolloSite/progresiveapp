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
  ->select("empleados.id","empleados.created_at","empleados.nombre","empleados.cargo","informacion.inicio","informacion.fin","empleados.documento")->get();

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

 public function empleados(){
$from = date('2022-05-02');
$to = date('2022-05-10');

$dato = Informacion::whereBetween('inicio', [$from, $to])->count();
$fecha = Periodo::select('fecha')->orderBy('fecha', 'desc')->take(1)->get();


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
  
  return View('progresiveapp::nuevo-empleado');
 }

 public function loginnomina(){
  
  return View('progresiveapp::loginnomina');
 }

 public function infolaboral(){
  
  return View('progresiveapp::infolaboral');
 }

  public function configuracion(){
  
  return View('progresiveapp::configuracion');
 }

  public function procesos($id){
  $nomina = Nomina::where('id','=',$id)->get();

  return View('progresiveapp::proceso')->with('nomina', $nomina);
 }

 public function bancos(){
  $bancos = Banco::all();

  return View('progresiveapp::bancos')->with('bancos', $bancos);
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
   $empleado->banco = Input:: get ('val-banco');
   $empleado->tipocuenta = Input:: get ('val-tipcuenta');
   $empleado->numerocu = Input:: get ('val-cuenta');
   $empleado->save();
   return Redirect('gestion/empleados')->with('status', 'ok_create');
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
   $empleado->salud = Input:: get ('val-salud');
   $empleado->por_salud = Input:: get ('val-porcentajesalud');
   $empleado->pensiones = Input:: get ('val-pensiones');
   $empleado->por_pensiones = Input:: get ('val-porcentajepensiones');
   $empleado->arl = Input:: get ('val-arl');
   $empleado->por_arl = Input:: get ('val-porcentajearl');
   $empleado->caja = Input:: get ('val-caja');
   $empleado->cesantias = Input:: get ('val-cesantias');
   $empleado->empleado_id = Input:: get ('empleado-id');
   $empleado->save();
   return Redirect('gestion/empleados')->with('status', 'ok_create');
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
   $periodo->periodo = Input::get('val-descripcion');
   $periodo->fecha = Input::get('val-fecha');
   $periodo->save();
   return Redirect('gestion/periodos')->with('status', 'ok_create');
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

   

}
