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
  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="adminLTE/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="adminLTE/bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="adminLTE/dist/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="adminLTE/dist/dist/css/skins/_all-skins.min.css">



  @section('content')
       <div class="box">
        <div class="box-header">
            <h3 class="box-title">Creando </h3>
        </div>
        <form method="POST" action="{{URL::to('calendar2')}}">
          {{csrf_field()}}
             <div class="box-body">
                          

                  <div class="form-group">
                    <label>Date:</label>

                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="datepicker"  name="sdate">
                    </div>
                    <!-- /.input group -->
                  </div>

                   <div class="form-group">
                     <button type="submit" class="btn btn-primary">Enviar</button>
                  </div>  
          
          @if ( isset($gastod) )
          <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Total [S/.] </th>
                </tr>
                </thead>
                  <tbody>
                    <?php $total=0  ?>
                  @foreach($gastod as $element)
                    <tr>
                      <td>{{$element->id}}</td>
                      <td>{{$element->name}}</td>
                      <td>{{$element->total}}</td>
                    </tr>
                    <?php $total += $element->total; ?>
                  @endforeach
                
                  </tbody>
                    <tfoot>
                    <tr>
                      <td>Total</td>
                      <td></td>
                      <td><?php echo $total ?></td>
                    </tr>
                  </tfoot> 
              
              </table>
       </div>
       @endif


               
            </div>
        </form>
    </div>
    
    @if ( isset($chart1) )
    <div id="chart1" class="chart"></div>
      
      {!! $chart1 !!}
    @endif


@stop

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>


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
      autoclose: true,
      format : 'yyyy-mm-dd'
    })

   $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })


  })
  
 
       


</script>
 

 <style type="text/css">
   
    .chart{
      height: 500px;
    }
 </style>