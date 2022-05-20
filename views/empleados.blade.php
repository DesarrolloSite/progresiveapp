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

 @foreach($fecha as $fechas)
 @endforeach


        <div class="form-head d-flex mb-sm-4 mb-3">
          <div class="mr-auto">
            <h2 class="text-black font-w600">Empleados</h2>
            <p class="mb-0">Empleados registrados en la compañía</p>
          </div>
          <div>
            <a href="javascript:void(0)" class="btn btn-primary mr-3" data-toggle="modal" data-target="#addOrderModal">+Nuevo Empleado</a>
            <a href="/gestion/nuevo-empleado" class="btn btn-success mr-3">+Nuevo Empleado</a>
            <a href="index.html" class="btn btn-outline-primary"><i class="las la-calendar-plus scale5 mr-3"></i>Filter Date</a>
          </div>
        </div>
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
                <form>
                  <div class="form-group">
                    <label class="text-black font-w500">Patient Name</label>
                    <input type="text" class="form-control">
                  </div>
                  <div class="form-group">
                    <label class="text-black font-w500">Patient ID</label>
                    <input type="text" class="form-control">
                  </div>
                  <div class="form-group">
                    <label class="text-black font-w500">Disease</label>
                    <input type="text" class="form-control">
                  </div>
                  <div class="form-group">
                    <label class="text-black font-w500">Date Check In</label>
                    <input type="date" class="form-control">
                  </div>
                  <div class="form-group">
                    <button type="button" class="btn btn-primary">CREATE</button>
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
                    <th></th>
                    <th>ID</th>
                    <th>Creado</th>
                    <th>Nombre</th>
                    <th>Cargo</th>
                    <th>Estado</th>
                    <th>Liquidar</th>
                    <th>Documento</th>
                    
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($empleados as $empleados)
                  <tr>
                    <td>
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheckBox2" required="">
                        <label class="custom-control-label" for="customCheckBox2"></label>
                      </div>
                    </td>
                    <td>
                      <img src="images/users/11.png" alt="" width="43">
                    </td>
                    <td><span class="text-nowrap">{{$empleados->id}}</span></td>
                    <td>{{$empleados->created_at}}</td>
                    <td>{{$empleados->nombre}}</td>
                    <td><span class="text-dark">{{$empleados->cargo}}</span></td>
                    <td>
                      @if(is_null($empleados->inicio))
                      <a href="/gestion/informacion-laboral/{{$empleados->id}}" class="btn btn-secondary text-nowrap btn-xs light">En proceso</a>
                      @elseif($empleados->fin > 1)
                      <a href="javascript:void(0)" class="btn btn-danger text-nowrap btn-xs light">Retirado</a>
                      @else
                      <a href="javascript:void(0)" class="btn btn-success text-nowrap btn-xs light">Activo</a>
                      @endif
                    </td>
                    <td>
                    <form action="/gestion/generar-nomina" method="post">

                     <input type="text" value="{{$empleados->sueldo*$empleados->peridiocidad/30}}" class="form-control" name="val-sueldo" id="val-sueldo">
                     <input type="text" value="{{$empleados->sueldo*$empleados->peridiocidad/30*$empleados->por_salud/100}}" class="form-control" name="val-salud" id="val-salud">
                     <input type="text" value="{{$empleados->sueldo*$empleados->peridiocidad/30*$empleados->por_pensiones/100}}" name="val-pension" id="val-pension">
                     <input type="text" value="{{$empleados->empleado_id}}" class="form-control" name="val-empleado" id="val-empleado">
                     <input type="text" value="{{$empleados->valordif}}" class="form-control" name="val-valor" id="val-valor">

                     @foreach($novedad as $novedads)

                     @if($empleados->id == $novedads->empleados_id)
                     <div style="background: red;">
                     <input type="text" value="{{$fechas->codigo}}" class="form-control" name="periodo[]" id="val-periodo">
                     <input type="text" value="{{$novedads->id}}" class="form-control" name="novedad[]" id="val-valor">
                     <input type="text" value="{{$novedads->empleados_id}}" class="form-control" name="empleado[]" id="val-valor">
                     </div>
                     @else
                     @endif
                     @endforeach
                     @if($empleados->sueldo <= '2000000')
                     <input type="text" value="{{117172*$empleados->peridiocidad/30}}" class="form-control" name="val-auxilio" id="val-auxilio">
                     @else
                     <input type="text" value="0" class="form-control" name="val-auxilio" id="val-auxilio">
                     @endif
                       <input type="text" value="{{$fechas->codigo}}" class="form-control" name="val-periodo" id="val-periodo">
            


            
                      @if($empleados->complejo == $fechas->codigo)
                
                     <a class="btn btn-warning text-nowrap btn-xs" href="/nomina/proceso/{{$empleados->identificador}}">En Proceso</a>
                      @else
                      <button type="submit" class="btn btn-success text-nowrap btn-xs">Liquidars</button>
                      @endif
    
                
                     

                
                      
                    </form>
                    </td>
                    <td><span class="text-nowrap">{{$empleados->documento}}</span></td>
                    
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
                          <a class="dropdown-item" href="/gestion/ver-nominas/{{$empleados->empleados_id}}">Editar Información</a>
                          <a class="dropdown-item" href="/gestion/nomina/editar-empleado/{{$empleados->id}}">Editar Empleado</a>
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

