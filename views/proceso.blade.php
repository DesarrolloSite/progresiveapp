


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
                           <a href="javascript:void(0)" class="btn btn-primary mr-3" data-toggle="modal" data-target="#addOrderModal">+Nuevo Empleado</a>
            
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
                                         @foreach($nomina as $nominaw)
                                            <tr>
                                                <td class="center" style="border: 1px solid #cbcbcb">3</td>
                                                <td class="text-right" style="border: 1px solid #cbcbcb">Sueldo Base</td>
                                                <td class="text-right" style="border: 1px solid #cbcbcb">$ {{ number_format($nominaw->sueldo_base,0,",",".")}}</td>
                                                <td class="text-right" style="border: 1px solid #cbcbcb">-</td>
                                            </tr>
                                            <tr>
                                                <td class="center" style="border: 1px solid #cbcbcb">3</td>
                                                <td class="text-right" style="border: 1px solid #cbcbcb">Aporte Pensión</td>
                                                <td class="text-right" style="border: 1px solid #cbcbcb">-</td>
                                                <td class="text-right" style="border: 1px solid #cbcbcb">$ {{ number_format($nominaw->pension,0,",",".")}}</td>
                                            </tr>
                                            <tr>
                                                <td class="center" style="border: 1px solid #cbcbcb">3</td>
                                                <td class="text-right" style="border: 1px solid #cbcbcb">Aporte Salud</td>
                                                <td class="text-right" style="border: 1px solid #cbcbcb">-</td>
                                                <td class="text-right" style="border: 1px solid #cbcbcb">$ {{ number_format($nominaw->salud,0,",",".")}}</td>
                                            </tr>
                                            @if($nominaw->auxilio_transporte == 0)
                                            @else
                                            <tr>
                                                <td class="center" style="border: 1px solid #cbcbcb">3</td>
                                                <td class="text-right" style="border: 1px solid #cbcbcb">Auxilio Transporte</td>
                                                <td class="text-right" style="border: 1px solid #cbcbcb">$ {{number_format($nominaw->auxilio_transporte,0,",",".")}}</td>
                                                <td class="text-right" style="border: 1px solid #cbcbcb">-</td>
                                            </tr>
                                            @endif
                                            @foreach($novedad as $novedades)
                                            @if($novedades->id == $novedades->empleados_id)

                                            <tr>
                                                <td class="center" style="border: 1px solid #cbcbcb">{{$novedades->codigo}}</td>
                                                <td class="text-right" style="border: 1px solid #cbcbcb">{{$novedades->descripcion}}</td>
                                                <td class="text-right" style="border: 1px solid #cbcbcb">-</td>
                                                <td class="text-right" style="border: 1px solid #cbcbcb">$ {{number_format($novedades->valor,0,",",".")}}</td>
                                            </tr>
                                            @endif
                                            @endforeach
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
                                                    <td class="right" style="border: 1px solid #cbcbcb">$ {{ number_format($nominaw->sueldo_base+$nominaw->auxilio_transporte,0,",",".")}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="left" style="border: 1px solid #cbcbcb"><strong>Descuentos Totales</strong></td>
                                                    <td class="right" style="border: 1px solid #cbcbcb">$ {{ number_format($nominaw->pension+$nominaw->pension,0,",",".")}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="left" style="border: 1px solid #cbcbcb"><strong>Total</strong></td>
                                                    <td class="right" style="border: 1px solid #cbcbcb"><strong>$ 
                                                    {{ number_format($nominaw->sueldo_base+$nominaw->auxilio_transporte-$nominaw->pension-$nominaw->pension,0,",",".")}}
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
<!-- Add Order -->
        <div class="modal fade" id="addOrderModal">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Add Contact</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="/gestion/nomina/novedad" method="post">
                  <div class="form-group">
                    <label class="text-black font-w500" style="font-size:16px">Código Novedad</label>
                    <input type="text" class="form-control" name="codigo">
                  </div>
                  <div class="form-group">
                    <label class="text-black font-w500" style="font-size:16px">Descripción Novedad</label>
                    <input type="text" class="form-control" name="descripcion">
                  </div>
                   <div class="form-group">
                    <label class="text-black font-w500" style="font-size:16px">Valor</label>
                    <input type="text" class="form-control" name="valor">
                  </div>
                  @foreach($fecha as $fecha)
                  <div class="form-group">
                    <label class="text-black font-w500" style="font-size:16px">Periodo</label>
                    <input type="text" class="form-control" value="{{$fecha->codigo}}" name="periodo">
                  </div>
                  @endforeach
                   @foreach($nomina as $nomina)
                  <div class="form-group">
                    <label class="text-black font-w500" style="font-size:16px">Empelado</label>
                    <input type="text" value="{{$nomina->empleado_id}}" class="form-control" name="empleado">
                  </div>
                  @endforeach
                  @foreach($novedad as $novedad)
                  <div class="form-group">
                    <label class="text-black font-w500" style="font-size:16px">Proceso</label>
                    <input type="text" class="form-control" value="{{$novedades->proceso_id}}" name="proceso-id">
                  </div>
                  @endforeach
                  <div class="form-group">
                    <label class="text-black font-w500" style="font-size:16px">Tiempo</label>
                    <input type="text" class="form-control" name="tiempo">
                  </div>
                  <div class="form-group">
                    <label class="text-black font-w500" style="font-size:16px">Tipo</label>
                    <input type="text" class="form-control" name="tipo">
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">CREATE</button>
                  </div>
                </form>
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