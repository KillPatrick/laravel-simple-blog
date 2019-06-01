@extends('admin/app')

@section('page-name', 'Permission')

@section('main-content')
<section class="content">
        <div class="row">
          <div class="col-md-12">
                <div class="box">
                        <div class="box-header">
                          <h3 class="box-title">Create permission</h3>

                        </div>
                          <!-- form start -->
                      <form role="form" method="POST" action="{{route('permissions.store')}}">
                        @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">Permission name</label>
                        <input type="text" class="form-control" value="{{old('name')}}" id="name" name="name" placeholder="Enter name" required>
                        </div>
                    </div>

                    <div class="box-body">
                        <div class="form-group">
                            <label for="type">Permission type</label>
                        <select class="form-control" value="{{old('type')}}" id="type" name="type" required>
                          <option value="post">Post</option>
                          <option value="user">User</option>
                          <option value="forex">Forex</option>
                        </select>
                        </div>
                    </div>
                    <!-- /.box-body -->
      
                    <div class="box-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                   </form>
                </div>
          </div>
          <!-- /.col-->
        </div>
        <!-- ./row -->
      </section>
@endsection