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
          <h4>Creación Periodos</h4>
         
          </div>
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Datos Periodos</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <form class="form-valide" action="/gestion/nomina/crear-periodo" method="post">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="form-group row">
                                                    
                                                    <div class="col-lg-6">
                                                      <label class="col-lg-12 col-form-label" for="val-descripcion">Descripción periodo
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                        <input type="text" class="form-control" id="val-descripcion" name="val-descripcion" placeholder="Ingrese Descripción">
                                                    </div>
                                                     <div class="col-lg-6">
                                                      <label class="col-lg-12 col-form-label" for="val-fecha">Fecha
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                        <input type="date" class="form-control" id="val-fecha" name="val-fecha" placeholder="Ingrese Fecha">
                                                    </div>
                                                </div>
                                                
                                                </div>


                                                <div class="form-group row">
                                                    <div class="col-lg-12 ml-auto">
                                                        <button type="submit" class="btn btn-primary btn-block">Crear Periodo</button>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            
                                        </div>

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