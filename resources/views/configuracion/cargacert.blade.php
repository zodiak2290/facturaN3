<h4 class="head text-center"> 
  Cargar Certificado de Sello Digital  
  <span style="color: #3498DB;">
    (CSD) *
  </span>
</h4>
@if( !$hasSello )
    <p class="narrow text-center">
      Asignar certificado a {{ $sucursal }}.
    </p>
    <div class="col-md-8 col-md-offset-2">
        <div class="text-center">
            <form id="formcert" name="formcert" method="post" action="/uploadcert" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="col-lg-12">
                <div class="col-md-12">
                    <div class="row ">
                      <div class="col-lg-12">
                        <div class="input-group">
                                    <label class="input-group-btn">
                                        <span class="btn btn-default">
                                          Archivo .key&hellip; <input id="key" type="file" style="display: none;" name="key"required="required" />
                                        </span>
                                    </label>
                          <input type="text" class="form-control" readonly >
                        </div><!-- /input-group -->
                      </div><!-- /.col-lg-6 -->
                    </div>
                </div>
                <div class="col-md-12" style="margin-top:5%;">
                    <div class="row ">
                      <div class="col-lg-12">
                        <div class="input-group">
                                    <label class="input-group-btn">
                                        <span class="btn btn-default">
                                          Archivo .cer&hellip; <input id="certificado" type="file" style="display: none;" name="certificado" required="required" />
                                        </span>
                                    </label>
                          <input type="text" class="form-control" readonly >
                        </div><!-- /input-group -->
                      </div><!-- /.col-lg-6 -->
                    </div>
                </div>
                <div class="col-lg-12 text-center" style="margin-bottom:9%;">
                      <label>Contraseña</label>
                      <input type="password" class="form-control" name="pass" id="pass" required="required" />
                </div>
                <div class="text-center" style="margin-top:9%;">
                  <button type="submit" class="btn btn-success btn-outline-rounded green"> Guardar </button>
                </div>
              </div>
            </form>
            @if ( session('message') )
              <div class="alert alert-danger">
                {{ session('message') }}
              </div>
            @endif 
        </div>
    </div>
@else
  <div class="col-lg-12">
    <div class="row">
      <div class="text-center">
        <span class="fui-check-circle" style="font-size: 150px; color: #2ECC71;"></span>
      </div>
    </div>
  
  </div>
@endif  