@extends ('adminsite.nomina')


 @section('ContenidoSite-01')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"
        integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7"
        crossorigin="anonymous"></script>
<link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link href="/nomina/vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/nomina/vendor/chartist/css/chartist.min.css">
  <!-- Datatable -->
    <link href="/nomina/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="/nomina/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="/nomina/css/style.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">


<div class="content-body">


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
            <h2 class="text-black font-w600">Fondos de Compensaciones</h2>
            <p class="mb-0">Empleados registrados en la compañía</p>
          </div>
          <div>
            <a href="javascript:void(0)" class="btn btn-primary mr-3" data-toggle="modal" data-target="#addOrderModal">+Nuevo Fondo Compensaciones</a>
            
            <a href="index.html" class="btn btn-outline-primary"><i class="las la-calendar-plus scale5 mr-3"></i>Filter Date</a>
          </div>
        </div>
        <!-- Add Order -->
        <div class="modal fade" id="addOrderModal">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Agregar Fondo de Compensaciones</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="/gestion/nomina/crear-compensaciones" method="post">
                  <div class="form-group">
                    <label class="text-black" style="font-size: 16px;">Fondo Compensaciones</label>
                    <input type="text" name="val-compensaciones" class="form-control">
                  </div>
                  <div class="form-group">
                    <label class="text-black" style="font-size: 16px;">Identificador</label>
                    <input type="text" name="val-identificador" class="form-control">
                  </div>
                  
                    <div class="form-group">
                    <button type="submit" class="btn btn-primary">Crear Banco</button>
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
                    <th>Fondo Compensaciones</th>
                    <th>Identificador</th>
                    <th>Creación</th>
                    <th>Actualización</th>
                    <th>Acciones</th>
                    
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                @foreach($bancos as $bancos)
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
                    <td><span class="text-nowrap val-id">{{$bancos->id}}</span></td>
                    <td class="val-compensaciones">{{$bancos->compensaciones}}</td>
                    <td class="val-identificador">{{$bancos->identificador}}</td>
                    <td><span class="text-dark">{{$bancos->created_at}}</span></td>
                    <td>
                     <span class="text-dark">{{$bancos->updated_at}}</span>
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
                          <a class="dropdown-item" href="/gestion/ver-nominas/">Ver Nóminas</a>
                          <a data-toggle="modal" data-target="#modal1"  data-id="1" class="dropdown-item">Edit</a>
                          <a class="dropdown-item" href="/gestion/nomina/eliminar-compensaciones/{{$bancos->id}}">Delete</a>
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





<div class="modal fade" id="modal1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Modal titlesss</h4>
      </div>
      <form action="/gestion/nomina/editar-compensaciones" method="post">
      <div class="modal-body">
          <div class="form-group">
           <label class="text-black" style="font-size: 16px;">Banco</label>
           <input type="text" name="val-compensaciones" class="form-control val-compensaciones">
           </div>
           <div class="form-group">
           <label class="text-black" style="font-size: 16px;">Identificador</label>
           <input type="text" name="val-identificador" class="form-control val-identificador">
           <input type="hidden" name="val-id" class="form-control val-id">
           </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>


<script type="text/javascript">
    $(document).ready(function () {
        $('.modal').on('show.bs.modal', function (e) {
            let $this = $(e.relatedTarget);

            let parentTr = $this.closest('tr');
            let myRatingLimit = parentTr.find('.val-compensaciones').text();
            let myWeightedScore = parentTr.find('.val-identificador').text();
            let myWeightedScoreid = parentTr.find('.val-id').text();
            let target = $('#' + e.target.id);

            target.find('.val-compensaciones').val(myRatingLimit);
            target.find('.val-identificador').val(myWeightedScore);
            target.find('.val-id').val(myWeightedScoreid);
        });
    })
</script>






@stop

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


