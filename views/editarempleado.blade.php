@extends ('adminsite.nomina')

@section('cabecera')
 <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
 <link href="/nomina/vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
 <!-- Datatable -->
 <link href="/nomina/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
@stop

 @section('ContenidoSite-01')




<div class="content-body">
  
    
   
            <div class="container">
                <div class="page-titles">
          <h4>Creación Empleados</h4>
         
          </div>
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Datos Básicos</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                  @foreach($empleados as $empleados)
                                 
                                    <form class="form-valide" action="/gestion/nomina/updateempleado/{{$empleados->id}}" method="post">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="form-group row">
                                                    
                                                    <div class="col-lg-6">
                                                      <label class="col-lg-4 col-form-label" for="val-nombre">Nombre
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                        <input type="text" class="form-control" id="val-nombre" name="val-nombre" placeholder="Ingrese Nombre" value="{{$empleados->nombre}}">
                                                    </div>
                                                     <div class="col-lg-6">
                                                      <label class="col-lg-4 col-form-label" for="val-apellido">Apellido
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                        <input type="text" class="form-control" id="val-apellido" name="val-apellido" value="{{$empleados->apellido}}" placeholder="Ingrese Apellido">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    
                                                    <div class="col-lg-6">
                                                      <label class="col-lg-12 col-form-label" for="val-email">Correo Electrónico <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                        <input type="email" class="form-control" id="val-email" name="val-email" placeholder="Ingrese Correo Electrónico" value="{{$empleados->correo}}">
                                                    </div>
                                                    
                                                    <div class="col-lg-6">
                                                      <label class="col-lg-4 col-form-label" for="val-telefono">Teléfono
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                        <input type="text" class="form-control" id="val-telefono" name="val-telefono" placeholder="Ingrese Teléfono" value="{{$empleados->telefono}}">
                                                    </div>
                                                </div>
                                                
                                                 
                                                <div class="form-group row">
                                                    <div class="col-lg-6">
                                                      <label class="col-lg-12 col-form-label" for="val-tipo">Tipo Documento
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                      {{ Form::select('val-tipo',  [$empleados->tipodoc => $empleados->tipodoc,
                                                      '1' => 'C.C.',
                                                      '2' => 'Cédula de Extranjeria',
                                                      '3' => 'Pasaporte'], null, array('class' => 'form-control'),['class' => 'form-control default-select']) }}
                                                    </div>
                                                    <div class="col-lg-6">
                                                      <label class="col-lg-12 col-form-label" for="val-numero">Número Documento <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                        <input type="text" class="form-control" id="val-numero" name="val-numero" placeholder="Ingrese Número Documento" value="{{$empleados->documento}}">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    
                                                    <div class="col-lg-6">
                                                      <label class="col-lg-12 col-form-label" for="val-direccion">Dirección Residencia <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                        <input type="text" class="form-control" id="val-direccion" name="val-direccion" value="{{$empleados->direccion}}" placeholder="Ingrese Dirección Residencia">
                                                    </div>
                                                    
                                                    <div class="col-lg-6">
                                                      <label class="col-lg-4 col-form-label" for="val-ciudad">Ciudad
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                        <input type="text" class="form-control" id="val-ciudad" name="val-ciudad" placeholder="Ingrese Ciudad" value="{{$empleados->ciudad}}">
                                                    </div>
                                                </div>


                                                  <div class="card-header">
                                                   <h4 class="card-title">Datos Pago</h4>
                                                   </div>

                                                     <div class="form-group row">
                                                    
                                                    <div class="col-lg-6">
                                                      <label class="col-lg-12 col-form-label" for="valtipo">Tipo Pago
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                        {{ Form::select('valtipo',  [$empleados->tipago => $empleados->tipago,
                                                      '1' => 'Efectivo',
                                                      '2' => 'Transferencia Bancaria',
                                                      '3' => 'Recarga'], null, array('class' => 'form-control'),['class' => 'form-control default-select']) }}
                                                    </div>
                                                    
                                                    <div class="col-lg-6" id="val-bancose">
                                                      <label class="col-lg-12 col-form-label" for="val-banco">Banco
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                        <select class="form-control default-select" id="val-banco" name="val-banco">
                                                            <option value="{{$empleados->banco_id}}" selected>{{$empleados->banco}}</option>
                                                            @foreach($bancos as $bancos)
                                                            <option value="{{$bancos->id}}">{{$bancos->banco}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="col-lg-6" id="val-bancos">
                                                      <label class="col-lg-12 col-form-label" for="val-tipcuenta">Tipo Cuenta
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                       
                                                         {{ Form::select('val-tipcuenta',  [$empleados->tipocuenta => $empleados->tipocuenta,
                                                      '1' => 'Corriente',
                                                      '2' => 'Ahorros'], null, array('class' => 'form-control'),['class' => 'form-control default-select']) }}
                                                    </div>

                                                    

                                                    
                                                    <div class="col-lg-6" id="val-bancosa">
                                                      <label class="col-lg-12 col-form-label" for="val-banco">Número de Cuenta
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                        <input type="text" class="form-control" id="val-cuenta" name="val-cuenta" placeholder="Choose a safe one.." value="{{$empleados->numerocu}}">
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <div class="col-lg-12 ml-auto">
                                                        <button type="submit" class="btn btn-primary btn-block">Actualzar Empleado</button>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            
                                        </div>


    
         <input id="color" name="color" type="text"></input>
                                    </form>
@endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
@stop

@section('footer')
 <!-- Jquery Validation -->
    <script src="/nomina/vendor/jquery-validation/jquery.validate.min.js"></script>
    <!-- Form validate init -->
    <script src="/nomina/js/plugins-init/jquery.validate-init.js"></script>


     <script>
      let valtipo  = document.getElementById("valtipo")
      let cajaTexto = document.getElementById("val-bancos")
       let cajaTextoa = document.getElementById("val-bancosa")
        let cajaTextoe = document.getElementById("val-bancose")
      
      valtipo.addEventListener("change", () => {
        let eleccion = valtipo.options[valtipo.selectedIndex].text
        
        if(eleccion === "Transferencia Bancaria") {
          cajaTexto.style.display = "inline"
          cajaTextoa.style.display = "inline"
          cajaTextoe.style.display = "inline"
        } 
        else {
          cajaTexto.style.display = "none"
          cajaTextoa.style.display = "none"
          cajaTextoe.style.display = "none"
        }
      })
    </script>
@stop
