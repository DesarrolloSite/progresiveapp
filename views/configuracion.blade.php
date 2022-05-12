@extends ('adminsite.nomina')

@section('cabecera')

@stop

 @section('ContenidoSite-01')
 

   <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
					<h4>Widget</h4>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Widget</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Statistics</a></li>
					</ol>
                </div>
                <!-- row -->
                <div class="row">
<div class="col-xl-4 col-xxl-6 col-lg-6 col-sm-6">
						<div class="widget-stat card bg-danger">
							<div class="card-body  p-4">
								<div class="media">
									<span class="mr-3">
										<i class="flaticon-381-calendar-1"></i>
									</span>
									<div class="media-body text-white text-right">
										<h4 class="mb-1 text-white"><b>Bancos</b></h4><br>
										<a href="/nomina/crear-banco" class="text-white">Crear</a><br>
										<a href="/nomina/bancos" class="text-white">Ver</a>
									</div>
								</div>
							</div>
						</div>
                    </div>
					<div class="col-xl-4 col-xxl-6 col-lg-6 col-sm-6">
						<div class="widget-stat card bg-success">
							<div class="card-body p-4">
								<div class="media">
									<span class="mr-3">
										<i class="flaticon-381-diamond"></i>
									</span>
									<div class="media-body text-white text-right">
										<h4 class="mb-1 text-white"><b>Fondo Salud</b></h4><br>
										<a href="" class="text-white">Crear</a><br>
										<a href="" class="text-white">Ver</a>
									</div>
								</div>
							</div>
						</div>
                    </div>
					<div class="col-xl-4 col-xxl-6 col-lg-6 col-sm-6">
						<div class="widget-stat card bg-info">
							<div class="card-body p-4">
								<div class="media">
									<span class="mr-3">
										<i class="flaticon-381-heart"></i>
									</span>
									<div class="media-body text-white text-right">
										<h4 class="mb-1 text-white"><b>Fondo Pensiones</b></h4><br>
										<a href="" class="text-white">Crear</a><br>
										<a href="" class="text-white">Ver</a>
									</div>
								</div>
							</div>
						</div>
                    </div>
					
	<div class="col-xl-4 col-xxl-6 col-lg-6 col-sm-6">
						<div class="widget-stat card bg-danger">
							<div class="card-body  p-4">
								<div class="media">
									<span class="mr-3">
										<i class="flaticon-381-calendar-1"></i>
									</span>
									<div class="media-body text-white text-right">
										<h4 class="mb-1 text-white"><b>ARL</b></h4><br>
										<a href="" class="text-white">Crear</a><br>
										<a href="" class="text-white">Ver</a>
									</div>
								</div>
							</div>
						</div>
                    </div>
					<div class="col-xl-4 col-xxl-6 col-lg-6 col-sm-6">
						<div class="widget-stat card bg-success">
							<div class="card-body p-4">
								<div class="media">
									<span class="mr-3">
										<i class="flaticon-381-diamond"></i>
									</span>
									<div class="media-body text-white text-right">
										<h4 class="mb-1 text-white"><b>Fondo Cesantias</b></h4><br>
										<a href="" class="text-white">Crear</a><br>
										<a href="" class="text-white">Ver</a>
									</div>
								</div>
							</div>
						</div>
                    </div>
					<div class="col-xl-4 col-xxl-6 col-lg-6 col-sm-6">
						<div class="widget-stat card bg-info">
							<div class="card-body p-4">
								<div class="media">
									<span class="mr-3">
										<i class="flaticon-381-heart"></i>
									</span>
									<div class="media-body text-white text-right">
										<h4 class="mb-1 text-white"><b>Caja Compensaciones<b></h4><br>
										<a href="" class="text-white">Crear </a><br>
										<a href="" class="text-white">Ver</a>
									</div>
								</div>
							</div>
						</div>
                    </div>				
                </div></div></div>
@end

@section('footer')
 
@stop