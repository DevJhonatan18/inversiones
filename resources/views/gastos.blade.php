@extends('layout')

  <link rel="stylesheet" href="adminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="adminLTE/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="adminLTE/bower_components/Ionicons/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="adminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="adminLTE/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="adminLTE/plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="adminLTE/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="adminLTE/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="adminLTE/bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="adminLTE/dist/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="adminLTE/dist/dist/css/skins/_all-skins.min.css">

@if(session()->has('flash'))
  <div class="alert alert-success">{{session('flash')}}</div>
@endif
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Creando </h3>
        </div>
        <form method="POST" action="{{URL::to('gastos')}}">
          {{csrf_field()}}
             <div class="box-body">
                <h3 class="box-title">Creando </h3>
                <div class="form-group">
                    <label for=""> Nombre </label>
                    <input type="text" class="form-control" name="name">
                </div>

                 <div class="form-group">
                    <label for=""> Cantidad </label>
                    <input type="text" class="form-control" name="cant" >
                </div>

                 <div class="form-group">
                    <label for=""> Costo Unitario </label>
                    <input type="text" class="form-control" name="punit" >
                </div>

                 <div class="form-group">
                    <label for=""> Inversion Total </label>
                    <input type="text" class="form-control" name="total" >
                </div>              

                <div class="form-group">
                    <label>Date:</label>

                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="datepicker"  name="cdate">
                    </div>
                    <!-- /.input group -->
                  </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                </div>  
            </div>
        </form>
    </div>



 @stop






<script src="https://code.jquery.com/jquery-3.3.1.js"></script>

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>

<script src="adminLTE/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="adminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="adminLTE/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->

<script src="adminLTE/bower_components/moment/min/moment.min.js"></script>
<script src="adminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="adminLTE/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="adminLTE/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="adminLTE/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->

<!-- iCheck 1.0.1 -->
<script src="adminLTE/plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="adminLTE/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="adminLTE/dist/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="adminLTE/dist/dist/js/demo.js"></script>
<!-- Page script -->


<script type="text/javascript">

  $(document).ready(function(){
   $('#datepicker').datepicker({
      autoclose: true
    })

   var date = $('#datepicker').datepicker({ dateFormat: 'dd-mm-yy' }).val();

    console.log(date)
  })
 
       


</script>
 