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
                    <form action="{{ route('categories.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">
                                {{ trans('pagination.name') }}
                            </label>
                            <input type="text" name="name" id="" class="form-control">
                            @if ($errors->has('name'))
                                <p class="text-danger">* {{ trans('pagination.error') }} !
                                    {{ $errors->first('name') }}
                                </p>
                            @endif
                        </div>
                        <div class="form-group text-center">
                            <button type="submit"
                                class="btn btn-primary">{{ trans('pagination.add') }}</button>
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
