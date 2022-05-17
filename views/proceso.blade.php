


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
                                @foreach($nomina as $nominas)
                                Nombre: {{$nominas->nombre}} {{$nominas->apellido}} <br>
                                Documento:  {{$nominas->documento}} 
                                @endforeach
                                <div class="table-responsive">
                                    <table class="table table-striped table-responsive-md">
                                        <thead>
                                            <tr>
                                                <th class="center" style="border: 1px solid #cbcbcb">Código</th>
                                                <th style="border: 1px solid #cbcbcb">Descripción</th>
                                                <th class="text-right" style="border: 1px solid #cbcbcb">Ingresos</th>
                                                <th class="text-right" style="border: 1px solid #cbcbcb">Descuento</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         @foreach($nomina as $nomina)
                                            <tr>
                                                <td class="center" style="border: 1px solid #cbcbcb">3</td>
                                                <td class="text-right" style="border: 1px solid #cbcbcb">Sueldo Base</td>
                                                <td class="text-right" style="border: 1px solid #cbcbcb">$ {{ number_format($nomina->sueldo_base,0,",",".")}}</td>
                                                <td class="text-right" style="border: 1px solid #cbcbcb">-</td>
                                            </tr>
                                            <tr>
                                                <td class="center" style="border: 1px solid #cbcbcb">3</td>
                                                <td class="text-right" style="border: 1px solid #cbcbcb">Aporte Pensión</td>
                                                <td class="text-right" style="border: 1px solid #cbcbcb">-</td>
                                                <td class="text-right" style="border: 1px solid #cbcbcb">$ {{ number_format($nomina->pension,0,",",".")}}</td>
                                            </tr>
                                            <tr>
                                                <td class="center" style="border: 1px solid #cbcbcb">3</td>
                                                <td class="text-right" style="border: 1px solid #cbcbcb">Aporte Salud</td>
                                                <td class="text-right" style="border: 1px solid #cbcbcb">-</td>
                                                <td class="text-right" style="border: 1px solid #cbcbcb">$ {{ number_format($nomina->salud,0,",",".")}}</td>
                                            </tr>
                                            @if($nomina->auxilio_transporte == 0)
                                            @else
                                            <tr>
                                                <td class="center" style="border: 1px solid #cbcbcb">3</td>
                                                <td class="text-right" style="border: 1px solid #cbcbcb">Auxilio Transporte</td>
                                                <td class="text-right" style="border: 1px solid #cbcbcb">$ {{number_format($nomina->auxilio_transporte,0,",",".")}}</td>
                                                <td class="text-right" style="border: 1px solid #cbcbcb">-</td>
                                            </tr>
                                            @endif
                                            
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-sm-5"> </div>
                                    <div class="col-lg-4 col-sm-5 ml-auto">
                                        <table class="table table-clear">
                                            <tbody>
                                                <tr>
                                                    <td class="left" style="border: 1px solid #cbcbcb"><strong>Ingresos Totales</strong></td>
                                                    <td class="right" style="border: 1px solid #cbcbcb">$ {{ number_format($nomina->sueldo_base+$nomina->auxilio_transporte,0,",",".")}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="left" style="border: 1px solid #cbcbcb"><strong>Descuentos Totales</strong></td>
                                                    <td class="right" style="border: 1px solid #cbcbcb">$ {{ number_format($nomina->pension+$nomina->pension,0,",",".")}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="left" style="border: 1px solid #cbcbcb"><strong>Total</strong></td>
                                                    <td class="right" style="border: 1px solid #cbcbcb"><strong>$ 
                                                    {{ number_format($nomina->sueldo_base+$nomina->auxilio_transporte-$nomina->pension-$nomina->pension,0,",",".")}}
                                                    </strong>
                                                        </td>
                                                </tr>
                                            </tbody>
                                            @endforeach
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