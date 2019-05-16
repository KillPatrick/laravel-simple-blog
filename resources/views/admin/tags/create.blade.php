@extends('admin/app')

@section('page-name', 'Tag')

@section('main-content')
<section class="content">
        <div class="row">
          <div class="col-md-12">
                <div class="box">
                        <div class="box-header">
                          <h3 class="box-title">Create tag</h3>

                        </div>
                          <!-- form start -->
                      <form role="form" method="POST" action="{{route('tags.store')}}">
                        @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">Tag title</label>
                            <input type="text" class="form-control" value="{{old('name')}}" id="name" name="name" placeholder="Enter title" required>
                        </div>
                        <div class="form-group">
                            <label for="slug">slug</label>
                            <input type="text" class="form-control" value="{{old('slug')}}" id="slug" name="slug" placeholder="Enter slug" required>
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