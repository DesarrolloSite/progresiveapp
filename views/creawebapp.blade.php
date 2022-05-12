@extends ('adminsite.layout')

    @section('cabecera')
    @parent
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>  

    @stop

@section('ContenidoSite-01')
 

<div class="container">
  <div class="row">
                            <div class="col-md-12">
                                <!-- Basic Form Elements Block -->
                                <div class="block">
                                    <!-- Basic Form Elements Title -->
                                    <div class="block-title">
                                        <div class="block-options pull-right">
                                            
                                        </div>
                                        <h2><strong>Configuración App </strong> Progresiva</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                    
                                    <!-- Basic Form Elements Content -->
                                     {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/progresiveapp/update'))) }}

                                       
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Nombre App</label>
                                            <div class="col-md-9">
                                                {{Form::text('name', $webapp->name, array('class' => 'form-control','placeholder'=>'Ingrese titulo'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Nombre Corto App</label>
                                            <div class="col-md-9">
                                                {{Form::text('short_name', $webapp->short_name, array('class' => 'form-control','placeholder'=>'Ingrese titulo'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Url Inicio</label>
                                            <div class="col-md-9">
                                                 {{Form::text('start_url', $webapp->start_url, array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Color Fondo</label>
                                            <div class="col-md-9">
                                                 {{Form::text('background_color', $webapp->background_color, array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Color del Tema</label>
                                            <div class="col-md-9">
                                                 {{Form::text('theme_color', $webapp->theme_color, array('class' => 'form-control','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Display</label>
                                            <div class="col-md-9">
                                                 {{Form::text('display', $webapp->display, array('class' => 'form-control','placeholder'=>'Ingrese URL'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Orientación App</label>
                                            <div class="col-md-9">
                                                 {{Form::text('orientation', $webapp->orientation, array('class' => 'form-control','placeholder'=>'Ingrese URL'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Estado</label>
                                            <div class="col-md-9">
                                                 {{Form::text('status_bar', $webapp->status_bar, array('class' => 'form-control','placeholder'=>'Ingrese URL'))}}
                                            </div>
                                        </div>

                                        
                                        <div class="form-group">
                                         <label class="col-md-3 control-label" for="example-password-input">Iconos</label>
                                          <div class="col-md-9">
                                           <div class="input-group">
                                            <input type="text" id="image_label" class="form-control" name="FilePath" placeholder="Seleccionar imagen" aria-label="Image" aria-describedby="button-image">
                                            <span class="input-group-btn"><button class="btn btn-primary" type="button" id="button-image">Seleccionar imagen</button></span>
                                           </div>
                                          </div>
                                        </div>

                                      <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Categorias</label>
                                            <div class="col-md-9">
                                                 {{Form::text('categories', $webapp->categories, array('class' => 'form-control','placeholder'=>'Ingrese URL'))}}
                                            </div>
                                        </div>
                                        

                                  

                                        <div class="form-group form-actions">
                                            <div class="col-md-9 col-md-offset-3">
                                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Crear</button>
                                                <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Cancelar</button>
                                            </div>
                                        </div>
                                    {{ Form::close() }}
                                
                                </div>
                                <!-- END Basic Form Elements Block -->
                            </div>
                          </div>
                          
</div>

 @foreach($webapp as $webapp)
                                                     @endforeach

<script>
  document.addEventListener("DOMContentLoaded", function() {
    document.getElementById('button-image').addEventListener('click', (event) => {
      event.preventDefault();
      window.open('/file-manager/fm-button', 'fm', 'width=900,height=500');
    });
  });
  // set file link
  function fmSetLink($url) {
    document.getElementById('image_label').value = $url;
  }
</script>


<script src="https://cdn.ckeditor.com/4.11.2/full/ckeditor.js"></script>

<script>
  CKEDITOR.replace( 'editor', {filebrowserImageBrowseUrl: '/file-manager/ckeditor'});
</script>

@stop