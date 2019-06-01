@extends('admin/app')

@section('page-name', 'Permission')

@section('main-content')
<section class="content">
        <div class="row">
          <div class="col-md-12">
                <div class="box">
                        <div class="box-header">
                          <h3 class="box-title">Edit permission</h3>

                        </div>
                          <!-- form start -->
                      <form role="form" method="POST" action="{{route('permissions.update', $permission->id)}}">
                        @csrf

                        {{ method_field('PATCH') }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">Permission name</label>
                        <input type="text" class="form-control" value="{{ $permission->name }}" id="name" name="name" placeholder="Permission name" required>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="type">Permission type</label>
                        <select class="form-control" value="{{old('type')}}" id="type" name="type" required>
                          <option value="post" @if($permission->type == 'post') selected @endif>Post</option>
                          <option value="user" @if($permission->type == 'user') selected @endif>User</option>
                          <option value="forex" @if($permission->type == 'forex') selected @endif>Forex</option>
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