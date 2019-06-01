@extends('admin/app')

@section('page-name', 'Role')

@section('main-content')
<section class="content">
        <div class="row">
          <div class="col-md-12">
                <div class="box">
                        <div class="box-header">
                          <h3 class="box-title">Create role</h3>

                        </div>
                          <!-- form start -->
                      <form role="form" method="POST" action="{{route('roles.store')}}">
                        @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">Role name</label>
                        <input type="text" class="form-control" value="{{old('name')}}" id="name" name="name" placeholder="Enter name" required>
                        </div>
                        <div class="form-check">
                                @foreach ($permissions as $permission)
                                <input class="form-check-label" type="checkbox" name="permissions[]" value="{{$permission->id}}" id="role{{$permission->id}}"/>
                                &nbsp;<label class="form-check-input" for="role{{$permission->id}}">{{$permission->name}}</label><br />  
                                @endforeach
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