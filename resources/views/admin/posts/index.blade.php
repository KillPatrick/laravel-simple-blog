@extends('admin/app')

@section('style')
   <!-- DataTables -->
   <link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('page-name', 'Posts')

@section('main-content')
    <!-- Main content -->
    <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                          <h3 class="box-title">Available tags</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                          <a class="btn btn-success" href="{{ route('posts.create') }}">Add new</a>
                          <table id="maintable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                              <th>ID</th>
                              <th>Title</th>
                              <th>Slug</th>
                              <th>Body</th>
                              <th>Published</th>
                              <th>Created</th>
                              <th>Updated</th>
                              <th>Edit</th>
                              <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($posts as $key => $post)
                            <tr>
                              <td>{{ $post->id }}</td>
                              <td>{{ $post->title }} <small>({{ $post->subtitle }})</small></td>
                              <td>{{ $post->slug }}</td>
                              <td><small>{!! substr(strip_tags($post->body), 0, 35) !!}...</small></td>
                              <td>@if ($post->status) <span class="badge bg-green">Yes</span> @else <span class="badge bg-red">No</span> @endif</td>
                              <td>{{ $post->created_at }}</td>
                              <td>{{ $post->updated_at }}</td>
                              <td><a class="btn btn-info btn-xs" href="{{route('posts.edit', $post->id)}}">Edit</a></td>
                              <td><a class="btn btn-danger btn-xs deletebtn" href="{{route('posts.destroy', $post->id)}}">Delete</a></td>
                            </tr>
                            @empty
                            @endforelse
                            </tbody>
                            <tfoot>
                              <tr>
                                  <th>ID</th>
                                  <th>Title</th>
                                  <th>Slug</th>
                                  <th>Body</th>
                                  <th>Published</th>
                                  <th>Created</th>
                                  <th>Updated</th>
                                  <th>Edit</th>
                                  <th>Delete</th>
                                </tr>
                            </tfoot>
                          </table>
                        </div>
                        <!-- /.box-body -->
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