@extends('admin/app')

@section('page-name', 'Role')

@section('main-content')
<section class="content">
        <div class="row">
          <div class="col-md-12">
                <div class="box">
                        <div class="box-header">
                          <h3 class="box-title">Edit role</h3>

                        </div>
                          <!-- form start -->
                      <form role="form" method="POST" action="{{route('roles.update', $role->id)}}">
                        @csrf

                        {{ method_field('PATCH') }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">Role name</label>
                        <input type="text" class="form-control" value="{{ $role->name }}" id="name" name="name" placeholder="Role name" required>
                        </div>
                        <div class="form-check">
                                @foreach ($permissions as $permission)
                                <input class="form-check-label" type="checkbox" name="permissions[]" value="{{$permission->id}}" id="role{{$permission->id}}"  
                                    @foreach ($role->permissions as $rolePermission) 
                                        @if ($rolePermission->id == $permission->id) 
                                            checked 
                                        @endif 
                                    @endforeach
                                />
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