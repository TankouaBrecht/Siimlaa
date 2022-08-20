@extends('admin.admin_master')

@section('admin')

@section('title')
Admin - Profile
@endsection


    <!-- /.content -->
<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
          var reader = new FileReader();
          reader.onload = function(e){
              $('#showImage').attr('src',e.target.result);
          }
          reader.readAsDataURL(e.target.files['0']); 
        });
    }); 
</script>
@endsection