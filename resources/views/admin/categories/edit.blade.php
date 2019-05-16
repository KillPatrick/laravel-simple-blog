@extends('admin/app')

@section('page-name', 'Category')

@section('main-content')
<section class="content">
        <div class="row">
          <div class="col-md-12">
                <div class="box">
                        <div class="box-header">
                          <h3 class="box-title">Create category</h3>

                        </div>
                          <!-- form start -->
                      <form role="form" method="POST" action="{{route('categories.update', $category->id)}}">
                        @csrf

                        {{ method_field('PATCH') }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">Category title</label>
                        <input type="text" class="form-control" value="{{ $category->name }}" id="name" name="name" placeholder="Enter title" required>
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" class="form-control" value="{{ $category->slug }}" id="slug" name="slug" placeholder="Enter slug" required>
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