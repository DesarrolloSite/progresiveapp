@extends ('adminsite.nomina')

 @section('ContenidoSite-01')

@section('cabecera')
 <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
 <link href="/nomina/vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
 <!-- Datatable -->
 <link href="/nomina/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
@stop
<div class="content-body">
  
    
   
            <div class="container">
                <div class="page-titles">
          <h4>Información Laboral</h4>
         
          </div>
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Información Laboral </h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    @foreach($informacion as $informacion)
                                    <form class="form-valide" action="/gestion/nomina/editar-informacion/{{$informacion->id}}" method="post">
                                        <div class="row">
                                            <div class="col-xl-12">


                                                <div class="form-group row">
                                                    <div class="col-lg-6">
                                                      <label class="col-lg-12 col-form-label" for="val-tipocontrato">Tipo Contato
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                        {{ Form::select('val-tipocontrato',  [$informacion->tipo_contrato => $informacion->tipo_contrato,
                                                      '1' => 'Indefinido',
                                                      '2' => 'Término Fijo',
                                                      '3' => 'Obra Labor'], null, array('class' => 'form-control'),['class' => 'form-control default-select']) }}
                                                    </div>
                                                    <div class="col-lg-6">
                                                      <label class="col-lg-12 col-form-label" for="val-sueldo">Sueldo <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                        <input type="text" class="form-control" id="val-sueldo" name="val-sueldo" placeholder="Ingrese Sueldo del Empleado" value="{{$informacion->sueldo}}">
                                                    </div>
                                                </div>



                                                <div class="form-group row">
                                                    
                                                    <div class="col-lg-6">
                                                      <label class="col-lg-12 col-form-label" for="val-inicio">Inicio de Contrato
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                         <input type="date" class="form-control" placeholder="2017-06-04" name='val-inicio' id="val-inicio" value="{{$informacion->inicio}}">
                                                    </div>
                                                     <div class="col-lg-6">
                                                      <label class="col-lg-12 col-form-label" for="val-fin">Finalización de Contrato
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                         <input type="date" class="form-control" placeholder="2017-06-04" name="val-fin" id="val-fin" value="{{$informacion->fin}}">
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    
                                                    <div class="col-lg-6">
                                                      <label class="col-lg-12 col-form-label" for="val-tiposueldo">¿El sueldo del empelado es Integral? 
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                       

                                                      {{ Form::select('val-tiposueldo',  [$informacion->tipo_sueldo => $informacion->tipo_sueldo,
                                                      '1' => 'Si',
                                                      '2' => 'No'
                                                      ], null, array('class' => 'form-control'),['class' => 'form-control default-select']) }}
                                        
                                                    
                                                    </div>
                                        
                                                </div>
                                                

                                                  <div class="card-header">
                                                   <h4 class="card-title">Datos para Aportes de Seguridad Social y Parafiscales</h4>
                                                   </div>

                                                     <div class="form-group row">
                                                    
                                                    <div class="col-lg-12">
                                                      <label class="col-lg-12 col-form-label" for="val-tipocot">Tipo Cotizante
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                        
                                                          {{ Form::select('val-tipocot',  [$informacion->tipo_cotizante => $informacion->tipo_cotizante,
                                                      '1' => 'Independiente',
                                                      '2' => 'Dependiente'
                                                      ], null, array('class' => 'form-control'),['class' => 'form-control default-select']) }}
                                        
                                                    </div>
                                                    
                                                    

                                                    <div class="col-lg-6">
                                                      <label class="col-lg-12 col-form-label" for="val-salud">Fondo Salud
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                        <select class="form-control default-select" id="val-salud" name="val-salud">
                                                            <option value="{{$informacion->salud_id}}" selected>{{$informacion->salud}}</option>
                                                            @foreach($salud as $salud)
                                                            @if($informacion->salud_id == $salud->id)
                                                            @else
                                                            <option value="{{$salud->id}}">{{$salud->salud}}</option>
                                                            @endif
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    
                                                    <div class="col-lg-6" id="val-porcentajesalud">
                                                      <label class="col-lg-12 col-form-label" for="val-porcentajesalud">Porcentaje Fondo Salud
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                        {{ Form::select('val-porcentajesalud',  [$informacion->por_salud => $informacion->por_salud,
                                                      '4' => '4%'], null, array('class' => 'form-control'),['class' => 'form-control default-select']) }}
                                                    </div>                                                    
                                            

                                                        <div class="col-lg-6" id="val-bancos">
                                                      <label class="col-lg-12 col-form-label" for="val-pensiones">Fondo Pensiones
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                        <select class="form-control default-select" id="val-pensiones" name="val-pensiones">
                                                            <option value="{{$informacion->pensiones_id}}" selected>{{$informacion->pension}}</option>
                                                            @foreach($pensiones as $pensiones)
                                                            @if($informacion->pensiones_id == $pensiones->id)
                                                            @else
                                                            <option value="{{$pensiones->id}}">{{$pensiones->pension}}</option>
                                                            @endif
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    
                                                    <div class="col-lg-6" id="val-porcentajepensiones">
                                                      <label class="col-lg-12 col-form-label" for="val-porcentajepensiones">Porcentaje Fondo Pensiones
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                       
                                                         
                                                            {{ Form::select('val-porcentajepensiones',  [$informacion->por_pensiones => $informacion->por_pensiones,
                                                      '4' => '4%'], null, array('class' => 'form-control'),['class' => 'form-control default-select']) }}
                                                     
                                                    </div>  


                                                        <div class="col-lg-6" id="val-bancos">
                                                      <label class="col-lg-12 col-form-label" for="val-arl">ARL
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                        <select class="form-control default-select" id="val-arl" name="val-arl">
                                                            <option value="{{$informacion->arl_id}}" selected>{{$informacion->arl}}</option>
                                                            @foreach($arl as $arl)
                                                            @if($informacion->arl_id == $arl->id)
                                                            @else
                                                            <option value="{{$arl->id}}">{{$arl->arl}}</option>
                                                            @endif
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    
                                                    <div class="col-lg-6" id="val-bancos">
                                                      <label class="col-lg-12 col-form-label" for="val-porcentajearl">Porcentaje ARL
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                      {{ Form::select('val-porcentajearl',  [$informacion->por_arl => $informacion->por_arl,
                                                      '0.522' => '0.522% Riesgo I',
                                                      '1.044' => '1.044% Riesgo II',
                                                      '2.436' => '2.436% Riesgo III',
                                                      '4.350' => '4.350% Riesgo IV',
                                                      '6.960' => '6.960% Riesgo V'], null, array('class' => 'form-control'),['class' => 'form-control default-select']) }}
                                                        
                                                    </div>  


                                                        <div class="col-lg-6" id="val-bancos">
                                                      <label class="col-lg-12 col-form-label" for="val-caja">Caja de Compensación
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                        <select class="form-control default-select" id="val-caja" name="val-caja">
                                                            <option value="{{$informacion->caja_id}}" selected>{{$informacion->compensaciones}}</option>
                                                            @foreach($compensaciones as $compensaciones)
                                                            @if($informacion->caja_id == $compensaciones->id)
                                                            @else
                                                            <option value="{{$compensaciones->id}}">{{$compensaciones->compensaciones}}</option>
                                                            @endif
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    
                                                    <div class="col-lg-6" id="val-bancos">
                                                      <label class="col-lg-12 col-form-label" for="val-cesantias">Fondo de Cesantias
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                        <select class="form-control default-select" id="val-cesantias" name="val-cesantias">
                                                            <option value="{{$informacion->cesantias_id}}" selected>{{$informacion->cesantias}}</option>
                                                            @foreach($cesantias as $cesantias)
                                                            @if($cesantias->id == $informacion->cesantias_id)
                                                            @else
                                                            <option value="{{$cesantias->id}}">{{$cesantias->cesantias}}</option>
                                                            @endif
                                                            @endforeach
                                                        </select>
                                                    </div>  
                                                </div>
                                                    
                                                </div>
                                                 <input type="hidden" class="form-control" value="{{$informacion->empleado_id}}" name="empleado-id" id="empleado-id">

                                                <div class="form-group row">
                                                    <div class="col-lg-12 ml-auto">
                                                        <button type="submit" class="btn btn-primary btn-block">Actualizar Empleado</button>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            
                                        </div>


    
        
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
    <script src="/nomina/js/plugins-init/jquery.validate-inf-init.js"></script>


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