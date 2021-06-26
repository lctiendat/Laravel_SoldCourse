@include('admin.header')


<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-body">
                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>{{ trans('pagination.success') }}!</strong> {{ Session::get('success') }}
                        </div>
                    @endif
                    <form action="{{ route('blogs.update', $blog->id) }}" method="post">
                        @csrf
                        @method('put')
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <div class="form-group">
                            <label for="">
                                {{ trans('pagination.blog.title') }}
                            </label>
                            <input type="text" name="title" id="" class="form-control" value="{{ $blog->title }}">
                            @if ($errors->has('title'))
                                <p class="text-danger">* {{ trans('pagination.error') }} !
                                    {{ $errors->first('title') }}
                                </p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">
                                {{ trans('pagination.blog.description') }}
                            </label>
                            <input type="text" name="description" id="" class="form-control"
                                value="{{ $blog->description }}">
                            @if ($errors->has('description'))
                                <p class="text-danger">* {{ trans('pagination.error') }} !
                                    {{ $errors->first('description') }}
                                </p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">
                                {{ trans('pagination.blog.content') }}
                            </label>
                            <textarea name="content" id="" cols="30" rows="10"
                                class="form-control">{{ $blog->content }}</textarea>
                            @if ($errors->has('content'))
                                <p class="text-danger">* {{ trans('pagination.error') }} !
                                    {{ $errors->first('content') }}
                                </p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">
                                {{ trans('pagination.blog.userpost') }}
                            </label>
                            <input type="text" name="" readonly id="" class="form-control"
                                value="{{ $blog->user['name'] }}">
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">{{ trans('pagination.update') }}</button>
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
