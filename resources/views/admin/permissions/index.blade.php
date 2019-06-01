@extends('admin/app')

@section('style')
   <!-- DataTables -->
   <link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('page-name', 'Permissions')

@section('main-content')
    <!-- Main content -->
    <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                          <h3 class="box-title">Available permissions</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                          <a class="btn btn-success" href="{{ route('permissions.create') }}">Add new</a>
                          <table id="maintable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                              <th>No.</th>
                              <th>Name</th>
                              <th>Type</th>
                              <th>Edit</th>
                              <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($permissions as $key => $permission)
                            <tr>
                              <td>{{ $key+1 }}</td>
                              <td>{{ $permission->name }}</td>
                              <td>{{ ucfirst($permission->type) }}</td>
                              <td><a class="btn btn-info btn-xs" href="{{route('permissions.edit', $permission->id)}}">Edit</a></td>
                              <td><a class="btn btn-danger btn-xs deletebtn" href="{{route('permissions.destroy', $permission->id)}}">Delete</a></td>
                            </tr>
                            @empty
                            @endforelse
                            </tbody>
                            <tfoot>
                            <tr>
                              <th>No.</th>
                              <th>Name</th>
                              <th>Permissions</th>
                              <th>Type</th>
                              <th>Delete</th>
                            </tr>
                            </tfoot>
                          </table>
                        </div>
                        <!-- /.box-body -->
                      </div>
                      <!-- /.box -->
                </div>
              </div>
              <!--/.col (right) -->
            </div>
            <!-- /.row -->
          </section>
          <!-- /.content -->
@endsection

@section('scripts')
     <!-- DataTables -->
  <script src="{{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
  <script>
    var table = $('#maintable').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })

    $('#maintable tbody').on( 'click', '.deletebtn', function (e) {
        e.preventDefault();
        if( !confirm('Are you sure you want to continue?')) {
                    return false;
        }

        $.ajax({
              url: $(this).attr('href'),
              type: 'DELETE',  
              data: {'_token' : '{{csrf_token()}}'},
              success: function(result) {

              }
        }); 
        table.row( $(this).parents('tr')).remove().draw();
    } );
  </script>
@endsection