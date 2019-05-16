@extends('admin/app')

@section('style')
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('admin/bower_components/select2/dist/css/select2.min.css')}}">
@endsection

@section('page-name', 'Post')

@section('main-content')
<section class="content">
        <div class="row">
          <div class="col-md-12">
                <div class="box">
                        <div class="box-header">
                          <h3 class="box-title">Create post</h3>

                        </div>
                          <!-- form start -->
                    <form role="form" method="POST" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PATCH') }}
                    <div class="box-body">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" value="{{ $post->title }}" name="title" placeholder="Enter title" required>
                            </div>
                            <div class="form-group">
                                <label for="subtitle">Sub title</label>
                                <input type="text" class="form-control" id="subtitle" value="{{ $post->subtitle }}" name="subtitle" placeholder="Enter sub title" required>
                            </div>
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" class="form-control" id="slug" value="{{ $post->slug }}" name="slug" placeholder="Enter slug" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="image">Post image</label>
                                <input type="file" id="image" name="image">
                                <p class="help-block">Upload.</p>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="status" value="1" @if($post->status == 1) checked @endif > Publish
                                </label>
                            </div>
                            <div class="form-group">
                                    <label>Tags</label>
                                    <select class="form-control select2" multiple="multiple" data-placeholder="Select tags"
                                            style="width: 100%;" name="tags[]">
                                        @foreach ($tags as $tag)
                                            <option value="{{ $tag->id }}"
                                                @foreach ($post->tags as $postTag)
                                                    @if ($postTag->id == $tag->id)
                                                        selected
                                                    @endif
                                                @endforeach 
                                            >{{ $tag->name }}</option>
                                        @endforeach
                                    </select>
                            </div>
                            <div class="form-group">
                                    <label>Categories</label>
                                    <select class="form-control select2" multiple="multiple" data-placeholder="Select categories"
                                            style="width: 100%;" name="categories[]">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                @foreach ($post->categories as $postCategory)
                                                    @if ($postCategory->id == $category->id)
                                                        selected
                                                    @endif
                                                @endforeach
                                                >{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="body">Body</label>
                                <textarea id="body" name="body" class="textarea" placeholder="Place some text here"
                            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $post->body }}</textarea>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
      
                    <div class="box-footer">
                      <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                   </form>
                </div>
          </div>
          <!-- /.col-->
        </div>
        <!-- ./row -->
      </section>
@endsection

@section('scripts')
      <!-- Bootstrap WYSIHTML5 -->
    <script src="{{asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
    <!-- Select2 -->
    <script src="{{asset('admin/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
    <script>
            $('.select2').select2();
            $(function () {
            
              //bootstrap WYSIHTML5 - text editor
              $('.textarea').wysihtml5()
            })
    </script>
@endsection