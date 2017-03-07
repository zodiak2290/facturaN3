<h4 class="head text-center"> 
  Cargar Logotipo 
</h4>
<form id="formlogo" name="formlogo" method="post" action="/uploadlogo" enctype="multipart/form-data">
{{ Form::token() }} 
  <div class="form-group">
    <div class="col-lg-12">
      <div class="file-tab panel-body">
        <div class="text-center">
          <button type="button" class="btn btn-info btn-file">
          	<input type="file" name="file-input">
          </button>
        </div>
      </div>
      <div class="col-lg-12">
        <div class="row">
          <div class="text-center">
            <button type="submit" class="btn btn-success">Submit</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>