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
                                <h4 class="card-title">Información Laboral</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <form class="form-valide" action="/gestion/nomina/crear-informacion" method="post">
                                        <div class="row">
                                            <div class="col-xl-12">


                                                <div class="form-group row">
                                                    <div class="col-lg-6">
                                                      <label class="col-lg-12 col-form-label" for="val-tipocontrato">Tipo Contato
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                        <select class="form-control default-select" id="val-tipocontrato" name="val-tipocontrato">
                                                            <option value="" disabled selected>Seleccione una opción</option>
                                                            <option value="1">Indefinido</option>
                                                            <option value="2">Término Fijo</option>
                                                            <option value="3">Obra Labor</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-6">
                                                      <label class="col-lg-12 col-form-label" for="val-sueldo">Sueldo <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                        <input type="text" class="form-control" id="val-sueldo" name="val-sueldo" placeholder="Ingrese Sueldo del Empleado">
                                                    </div>
                                                </div>



                                                <div class="form-group row">
                                                    
                                                    <div class="col-lg-6">
                                                      <label class="col-lg-12 col-form-label" for="val-inicio">Inicio de Contrato
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                         <input type="date" class="form-control" placeholder="2017-06-04" name='val-inicio' id="val-inicio">
                                                    </div>
                                                     <div class="col-lg-6">
                                                      <label class="col-lg-12 col-form-label" for="val-fin">Finalización de Contrato
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                         <input type="date" class="form-control" placeholder="2017-06-04" name="val-fin" id="val-fin">
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    
                                                    <div class="col-lg-6">
                                                      <label class="col-lg-12 col-form-label" for="val-tiposueldo">¿El sueldo del empelado es Integral?
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                        <select class="form-control default-select" id="val-tiposueldo" name="val-tiposueldo">
                                                            <option value="" disabled selected>Seleccione una opción</option>
                                                            <option value="1">Si</option>
                                                            <option value="2">No</option>
                                        
                                                        </select>
                                                    </div>
                                        
                                                </div>
                                                

                                                  <div class="card-header">
                                                   <h4 class="card-title">Datos para Aportes de Seguridad Social y Parafiscales</h4>
                                                   </div>

                                                     <div class="form-group row">
                                                    
                                                    <div class="col-lg-6">
                                                      <label class="col-lg-12 col-form-label" for="val-tipocot">Tipo Cotizante
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                        <select class="form-control default-select" id="val-tipocot" name="val-tipocot">
                                                            <option value="" selected disabled>Seleccione una opción</option>
                                                            <option value="1">Independiente</option>
                                                            <option value="2">Dependiente</option>
                                                        </select>
                                                    </div>
                                                    
                                                    <div class="col-lg-6" id="val-bancose">
                                                      <label class="col-lg-12 col-form-label" for="val-banco">Banco
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                        <select class="form-control default-select" id="val-banco" name="val-banco">
                                                            <option value="" selected disabled>Seleccione una opción</option>
                                                            <option value="1">Bancolombia</option>
                                                            <option value="2">Davivienda</option>
                                                            <option value="3">Caja Social</option>
                                                            <option value="4">Banco Falabella</option>
                                                            <option value="5">Colpatria</option>
                                                            <option value="6">Banco Bogotá</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-lg-6">
                                                      <label class="col-lg-12 col-form-label" for="val-salud">Fondo Salud
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                        <select class="form-control default-select" id="val-salud" name="val-salud">
                                                            <option value="" selected disabled>Seleccione una opción</option>
                                                            <option value="1">Compensar</option>
                                                            <option value="2">Famisanar</option>
                                                            <option value="2">Sanitas</option>
                                                            <option value="2">Nueva EPS</option>
                                                            <option value="2">Sura</option>
                                                            <option value="2">Cruz Blanca</option>
                                                        </select>
                                                    </div>

                                                    
                                                    <div class="col-lg-6" id="val-porcentajesalud">
                                                      <label class="col-lg-12 col-form-label" for="val-porcentajesalud">Porcentaje Fondo Salud
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                        <select class="form-control default-select" id="val-porcentajesalud" name="val-porcentajesalud">
                                                            <option value="" selected disabled>Seleccione una opción</option>
                                                            <option value="4">4%</option>
                                                        </select>
                                                    </div>                                                    
                                                    

                                                        <div class="col-lg-6" id="val-bancos">
                                                      <label class="col-lg-12 col-form-label" for="val-pensiones">Fondo Pensiones
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                        <select class="form-control default-select" id="val-pensiones" name="val-pensiones">
                                                            <option value="" selected disabled>Seleccione una opción</option>
                                                            <option value="1">Colfondos</option>
                                                            <option value="2">Porvenir</option>
                                                            <option value="3">Colpensiones</option>
                                                            <option value="4">Protección</option>
                                                            <option value="5">Escandia</option>
                                                        </select>
                                                    </div>

                                                    
                                                    <div class="col-lg-6" id="val-porcentajepensiones">
                                                      <label class="col-lg-12 col-form-label" for="val-porcentajepensiones">Porcentaje Fondo Pensiones
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                        <select class="form-control default-select" id="val-porcentajepensiones" name="val-porcentajepensiones">
                                                            <option value="" selected disabled>Seleccione una opción</option>
                                                            <option value="4">4%</option>
                                                        </select>
                                                    </div>  


                                                        <div class="col-lg-6" id="val-bancos">
                                                      <label class="col-lg-12 col-form-label" for="val-arl">ARL
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                        <select class="form-control default-select" id="val-arl" name="val-arl">
                                                            <option value="" selected disabled>Seleccione una opción</option>
                                                            <option value="1">Positiva</option>
                                                            <option value="2">Colmena</option>
                                                            <option value="2">Mapfre</option>
                                                            <option value="2">La Equidad</option>
                                                            <option value="2">Seguros Bolivar</option>
                                                        </select>
                                                    </div>

                                                    
                                                    <div class="col-lg-6" id="val-bancos">
                                                      <label class="col-lg-12 col-form-label" for="val-porcentajearl">Porcentaje ARL
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                        <select class="form-control default-select" id="val-porcentajearl" name="val-porcentajearl">
                                                            <option value="" selected disabled>Seleccione una opción</option>
                                                            <option value="0.522">0.522% Riesgo I</option>
                                                            <option value="1.044">1.044% Riesgo II</option>
                                                            <option value="2.436">2.436% Riesgo III</option>
                                                            <option value="4.350">4.350% Riesgo IV</option>
                                                            <option value="6.960">6.960% V</option>
                                                        </select>
                                                    </div>  


                                                        <div class="col-lg-6" id="val-bancos">
                                                      <label class="col-lg-12 col-form-label" for="val-caja">Caja de Compensación
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                        <select class="form-control default-select" id="val-caja" name="val-caja">
                                                            <option value="" selected disabled>Seleccione una opción</option>
                                                            <option value="4">Compensar</option>
                                                            <option value="4">Colsubsidio</option>
                                                            <option value="4">Cafam</option>
                                                            <option value="4">Confandi</option>
                                                            <option value="4">Comfama</option>
                                                        </select>
                                                    </div>

                                                    
                                                    <div class="col-lg-6" id="val-bancos">
                                                      <label class="col-lg-12 col-form-label" for="val-cesantias">Fondo de Cesantias
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                        <select class="form-control default-select" id="val-cesantias" name="val-cesantias">
                                                            <option value="" selected disabled>Seleccione una opción</option>
                                                            <option value="2">2%</option>
                                                            <option value="4">4%</option>
                                                            <option value="6">6%</option>
                                                        </select>
                                                    </div>  
                                                </div>
                                                    
                                                </div>
                                                 <input type="hidden" class="form-control" value="{{Request::segment(3)}}" name="empleado-id" id="empleado-id">

                                                <div class="form-group row">
                                                    <div class="col-lg-12 ml-auto">
                                                        <button type="submit" class="btn btn-primary btn-block">Crear Empleado</button>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            
                                        </div>


    
         <input id="color" name="color" type="text"></input>
                                    </form>
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