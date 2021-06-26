@include('admin.header')


<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-body">
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>{{ trans('pagination.success') }}!</strong> {{ Session::get('success') }}
                </div>
            @endif
            <a href="{{ route('blogs.create') }}"><button
                    class="btn btn-primary float-right mb-3">{{ trans('pagination.add') }}</button></a>
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#ID</th>
                            <th>{{ trans('pagination.blog.title') }}</th>
                            <th>{{ trans('pagination.blog.userpost') }}</th>
                            <th>{{ trans('pagination.action') }}</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#ID</th>
                            <th>{{ trans('pagination.blog.title') }}</th>
                            <th>{{ trans('pagination.blog.userpost') }}</th>
                            <th>{{ trans('pagination.action') }}</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($blogList as $blog)
                            <tr>
                                <td>{{ $blog->id }}</td>
                                <td>{{ substr($blog->title, 0, 50) }}</td>
                                <td>{{ $blog->user['name'] }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a href="{{ route('blogs.edit', $blog->id) }}"> <i
                                                    class="fa fa-pen class"> </i> </a>
                                        </div>
                                        <div class="col-md-6">
                                            <form action="{{ route('blogs.destroy', $blog->id) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="border-0 bg-transparent text-primary"><i
                                                        class="fa fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>

@include('admin.footer')
