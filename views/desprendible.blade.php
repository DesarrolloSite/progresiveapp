@extends ('adminsite.nomina')

@section('cabecera')
 <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
 <link href="/nomina/vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
 <!-- Datatable -->
 <link href="/nomina/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
@stop

 @section('ContenidoSite-01')

<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
					<h4>Invoice</h4>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Layout</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Blank</a></li>
					</ol>
                </div>
                <div class="container">
                    <div class="col-lg-12">

                        <div class="card">
                            
                            <div class="card-body">
                                
                                
                                <div class="contaier">
                                    <div class="col-lg-12 col-sm-5"> </div>
                                    <div class="col-lg-12 col-sm-5 ml-auto">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="text-center text-primary" style="font-size: 20px">Mi Salario
                                                        
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    @foreach($datos as $datosw)
                                                    <td class="text-center">${{number_format($datosw->sueldo,0,",",".")}}</td>
                                                    @endforeach
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-clear">
                                            <tbody>
                                                 <tr>
                                                    <td class="right">Concepto</td>
                                             <td class="right">Devengo</td>
                                                    <td class="right">Deducción</td>
                                                </tr>
                                                <tr>
                                                    <td class="right"></td>
                                                    <td class="left"><strong>Subtotal</strong></td>
                                                    <td class="right">$8.497,00</td>
                                                </tr>
                                                <tr>
                                                    <td class="right"></td>
                                                    <td class="left"><strong>Discount (20%)</strong></td>
                                                    <td class="right">$1,699,40</td>
                                                </tr>
                                                <tr>
                                                    <td class="right"></td>
                                                    <td class="left"><strong>Pensión</strong></td>
                                                            @foreach($datos as $datoss)
                                                    <td class="right">{{$datoss->sueldo*$datoss->por_pensiones/100}}</td>
                                                    @endforeach
                                                </tr>
                                                <tr>
                                                    <td class="right"></td>
                                                    <td class="left"><strong>Salud</strong></td>
                                                    <td class="right"><strong>
                                                    @foreach($datos as $datos)
                                                      {{$datos->sueldo*$datos->por_salud/100}}
                                                    @endforeach
                                                    </strong><br>
                                                        <strong></strong></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


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