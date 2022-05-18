@extends ('adminsite.nomina')


 @section('ContenidoSite-01')

<link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link href="/nomina/vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/nomina/vendor/chartist/css/chartist.min.css">
  <!-- Datatable -->
    <link href="/nomina/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="/nomina/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="/nomina/css/style.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">


<div class="content-body">

            <!-- row -->
      <div class="container-fluid">


        <?php $status=Session::get('status'); ?>
  @if($status=='ok_create')
    <div class="alert alert-success solid alert-square "><strong>¡Usuario</strong> registrado con éxito!</div>
  @endif

  @if($status=='ok_delete')
   <div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Tipo De Evento Eliminado Con Éxito</strong> CMS...
   </div>
  @endif

  @if($status=='ok_update')
   <div class="alert alert-warning">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Tipo De Evento Actualizado Con Éxito</strong> CMS...
   </div>
  @endif




        <div class="form-head d-flex mb-sm-4 mb-3">
          <div class="mr-auto">
            <h2 class="text-black font-w600">Novedades</h2>
            <p class="mb-0">Novedades registradas a empleados</p>
          </div>
          <div>
            <a href="javascript:void(0)" class="btn btn-primary mr-3" data-toggle="modal" data-target="#addOrderModal">Crear Novedad</a>
           
          </div>
        </div>
        <!-- Add Order -->
        <div class="modal fade" id="addOrderModal">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Crear Novedad</h5>
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
                  <div class="form-group">
                    <label class="text-black font-w500" style="font-size:16px">Tiempo</label>
                    <input type="text" class="form-control" name="tiempo">
                  </div>
                   <div class="form-group">
                    <label class="text-black font-w500" style="font-size:16px">Empleado</label>
                  <select class="form-control default-select" id="empleado" name="empleado">
                    <option value="" disabled selected>Seleccione una opción</option>
                    @foreach($empleados as $empleados)
                    <option value="{{$empleados->id}}">{{$empleados->nombre}} {{$empleados->apellido}} - {{$empleados->documento}}</option>
                    @endforeach
                   </select>
                  </div>
                  <div class="form-group">
                    <label class="text-black font-w500" style="font-size:16px">Tipo</label>
                    <select class="form-control default-select" id="tipo" name="tipo">
                    <option value="" disabled selected>Seleccione una opción</option>
                    <option value="1">Ingreso</option>
                    <option value="2">Descuento</option>
                   </select>
                  </div>
                  
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">CREATE</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="table-responsive card-table">
              <table id="example5" class="display dataTablesCard table-responsive-xl">
                <thead>
                  <tr>
                    <th>
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="checkAll" required="">
                        <label class="custom-control-label" for="checkAll"></label>
                      </div>
                    </th>
                    <th>Periodo</th>
                    <th>ID</th>
                    <th>Empleado</th>
                    <th>Valor</th>
                    <th>Tiempo</th>
                    <th>Tipo Novedad</th>
                    <th>Descripción</th>
                
                    
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($datos as $datos)
                  <tr>
                    <td>
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheckBox2" required="">
                        <label class="custom-control-label" for="customCheckBox2"></label>
                      </div>
                    </td>
                    <td>
                      {{$datos->periodo}}
                    </td>
                    <td><span class="text-nowrap">{{$datos->documento}}</span></td>
                    <td>{{$datos->nombre}} {{$datos->apellido}}</td>
                    <td>$ {{ number_format($datos->valor,0,",",".")}}</td>
                    <td><span class="">{{$datos->tiempo}}</span></td>
                    <td>
                     @if($datos->tipo == 1)
                      <a class="btn btn-success text-nowrap btn-xs light">Ingreso</a>
                     @else
                     <a class="btn btn-danger text-nowrap btn-xs light">Descuento</a>
                     @endif
                    </td>
                    <td>
                     {{ Str::limit($datos->descripcion, 20) }} 
                    </td>
             
                    
                    <td>
                      <div class="dropdown ml-auto text-right">
                        <div class="btn-link" data-toggle="dropdown">
                          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11Z" stroke="#2E2E2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18Z" stroke="#2E2E2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4Z" stroke="#2E2E2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                          </svg>
                        </div>
                        <div class="dropdown-menu dropdown-menu-right">
                          <a class="dropdown-item" href="/gestion/ver-nominas/">Editar Información</a>
                          <a class="dropdown-item" href="/gestion/nomina/editar-empleado">Editar Empleado</a>
                          <a class="dropdown-item" href="#">Delete</a>
                        </div>
                      </div>
                    </td>                       
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
            </div>
        </div>

   

  @section('footer')



    <!-- Datatable -->
    <script src="/nomina/vendor/datatables/js/jquery.dataTables.min.js"></script>
  <script>
    (function($) {
      var table = $('#example5').DataTable({
        searching: false,
        paging:true,
        select: false,
        //info: false,         
        lengthChange:false 
        
      });
      $('#example tbody').on('click', 'tr', function () {
        var data = table.row( this ).data();
        
      });
    })(jQuery);
  </script>

@stop
@stop

