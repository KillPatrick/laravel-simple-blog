@extends('admin/app')

@section('page-name', 'User')

@section('main-content')
<section class="content">
        <div class="row">
          <div class="col-md-12">
                <div class="box">
                        <div class="box-header">
                          <h3 class="box-title">Edit user</h3>

                        </div>
                          <!-- form start -->
                      <form role="form" method="POST" action="{{route('users.update', $user->id)}}">
                        @csrf
                        {{ method_field('PATCH') }}
                    <div class="box-body">
                        <div class="alert alert-warning" role="alert">
                            Leave the Password field empty, unless you want to change it!
                        </div>
                        <div class="form-group">
                            <label for="name">Username</label>
                        <input type="text" class="form-control" value="{{ $user->name }}" id="name" name="name" placeholder="Enter name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" value="{{ $user->email }}" id="email" name="email" placeholder="Enter email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" value="" id="password" name="password" placeholder="Enter password" >
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Repeat password</label>
                            <input type="password" class="form-control" value="" id="password_confirmation" name="password_confirmation" placeholder="Repeat password">
                        </div>
                        <div class="form-check">
                                @foreach ($roles as $role)
                                <input class="form-check-label" type="checkbox" name="roles[]" value="{{$role->id}}" id="role{{$role->id}}"  
                                    @foreach ($user->roles as $userRole) 
                                        @if ($userRole->id == $role->id) 
                                            checked 
                                        @endif 
                                    @endforeach
                                />
                                &nbsp;<label class="form-check-input" for="role{{$role->id}}">{{$role->name}}</label><br />  
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