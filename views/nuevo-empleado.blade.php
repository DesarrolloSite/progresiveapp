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
                                    <form class="form-valide" action="/gestion/nomina/crear-empleado" method="post">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="form-group row">
                                                    
                                                    <div class="col-lg-6">
                                                      <label class="col-lg-4 col-form-label" for="val-nombre">Nombre
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                        <input type="text" class="form-control" id="val-nombre" name="val-nombre" placeholder="Ingrese Nombre">
                                                    </div>
                                                     <div class="col-lg-6">
                                                      <label class="col-lg-4 col-form-label" for="val-apellido">Apellido
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                        <input type="text" class="form-control" id="val-apellido" name="val-apellido" placeholder="Ingrese Apellido">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    
                                                    <div class="col-lg-6">
                                                      <label class="col-lg-12 col-form-label" for="val-email">Correo Electrónico <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                        <input type="email" class="form-control" id="val-email" name="val-email" placeholder="Ingrese Correo Electrónico">
                                                    </div>
                                                    
                                                    <div class="col-lg-6">
                                                      <label class="col-lg-4 col-form-label" for="val-telefono">Teléfono
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                        <input type="text" class="form-control" id="val-telefono" name="val-telefono" placeholder="Ingrese Teléfono">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-lg-6">
                                                      <label class="col-lg-12 col-form-label" for="val-tipo">Tipo Documento
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                        <select class="form-control default-select" id="val-tipo" name="val-tipo">
                                                            <option value="" disabled selected>Seleccione una opción</option>
                                                            <option value="1">CC</option>
                                                            <option value="2">Cédula de Extranjeria</option>
                                                            <option value="3">Pasaporte</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-6">
                                                      <label class="col-lg-12 col-form-label" for="val-numero">Número Documento <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                        <input type="text" class="form-control" id="val-numero" name="val-numero" placeholder="Ingrese Número Documento">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    
                                                    <div class="col-lg-6">
                                                      <label class="col-lg-12 col-form-label" for="val-direccion">Dirección Residencia <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                        <input type="text" class="form-control" id="val-direccion" name="val-direccion" placeholder="Ingrese Dirección Residencia">
                                                    </div>
                                                    
                                                    <div class="col-lg-6">
                                                      <label class="col-lg-4 col-form-label" for="val-ciudad">Ciudad
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                        <input type="text" class="form-control" id="val-ciudad" name="val-ciudad" placeholder="Ingrese Ciudad">
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
                                                        <select class="form-control default-select" id="valtipo" name="valtipo">
                                                            <option value="" selected disabled>Seleccione una opción</option>
                                                            <option value="1">Efectivo</option>
                                                            <option value="2">Transferencia Bancaria</option>
                                                            <option value="3">Recarga</option>
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

                                                    <div class="col-lg-6" id="val-bancos">
                                                      <label class="col-lg-12 col-form-label" for="val-tipcuenta">Tipo Cuenta
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                        <select class="form-control default-select" id="val-tipcuenta" name="val-tipcuenta">
                                                            <option value="" selected disabled>Seleccione una opción</option>
                                                            <option value="1">Corriente</option>
                                                            <option value="2">Ahorros</option>
                                                        </select>
                                                    </div>

                                                    

                                                    
                                                    <div class="col-lg-6" id="val-bancosa">
                                                      <label class="col-lg-12 col-form-label" for="val-banco">Número de Cuenta
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                        <input type="text" class="form-control" id="val-cuenta" name="val-cuenta" placeholder="Choose a safe one..">
                                                    </div>
                                                </div>


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