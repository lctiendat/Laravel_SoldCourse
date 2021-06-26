@include('admin.header')

<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-body">
                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>{{ trans('pagination.success') }}!</strong> {{ Session::get('success') }}
                        </div>
                    @elseif (Session::has('error'))
                        <div class="alert alert-danger alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>{{ trans('pagination.error') }}!</strong> {{ Session::get('error') }}
                        </div>
                    @endif
                    <form action="{{ route('courses.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label for="">{{ trans('pagination.name') }}</label>
                                    <input type="text" class="form-control" name="name" id="">
                                    @if ($errors->has('name'))
                                        <p class="text-danger">* {{ trans('pagination.error') }} !
                                            {{ $errors->first('name') }}
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="">{{ trans('pagination.course.description') }}</label>
                                    <input type="text" class="form-control" name="description" id="">
                                    @if ($errors->has('description'))
                                        <p class="text-danger">* {{ trans('pagination.error') }} !
                                            {{ $errors->first('description') }}
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="">{{ trans('pagination.name') }}</label>
                                    <textarea name="content" class="form-control" id="editor" cols="30" rows="10"></textarea>
                                    @if ($errors->has('content'))
                                        <p class="text-danger">* {{ trans('pagination.error') }} !
                                            {{ $errors->first('content') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="">{{ trans('pagination.course.price') }}</label>
                                    <input type="number" class="form-control" name="price" id="">
                                    @if ($errors->has('price'))
                                        <p class="text-danger">* {{ trans('pagination.error') }} !
                                            {{ $errors->first('price') }}
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="">{{ trans('pagination.course.discount') }}</label>
                                    <input type="number" class="form-control" name="discount" maxlength="2" id="">
                                    @if ($errors->has('discount'))
                                        <p class="text-danger">* {{ trans('pagination.error') }} !
                                            {{ $errors->first('discount') }}
                                        </p>
                                    @endif
                                </div>
                                <div class="custom-file mb-3">
                                    <label class="custom-file-label"
                                        for="customFile">{{ trans('pagination.course.thumbnail') }}</label>
                                    <input type="file" class="custom-file-input" id="customFile" name="thumbnail">
                                    @if ($errors->has('thumbnail'))
                                        <p class="text-danger">* {{ trans('pagination.error') }} !
                                            {{ $errors->first('thumbnail') }}
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="">{{ trans('pagination.category') }}</label>
                                    <select name="category_id" id="" class="form-control">
                                        @foreach ($categoryList as $category)
                                            <option style="  text-overflow: ellipsis; 
                                            " value=" {{ $category->id }}">
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary">{{ trans('pagination.add') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>

@include('admin.footer')
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<!-- Initialize Quill editor -->
<script>
    var quill = new Quill('#editor', {
        theme: 'snow'
    });
</script>
