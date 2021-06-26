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
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#ID</th>
                            <th>{{ trans('pagination.user.name') }}</th>
                            <th>Email</th>
                            <th>{{ trans('pagination.user.role') }}</th>
                            <th>{{ trans('pagination.action') }}</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#ID</th>
                            <th>{{ trans('pagination.user.name') }}</th>
                            <th>Email</th>
                            <th>{{ trans('pagination.user.role') }}</th>
                            <th>{{ trans('pagination.action') }}</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($userList as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if ($user->role == 'admin')
                                        <span class="badge badge-danger">Admin</span>
                                    @endif
                                    @if ($user->role == 'user')
                                        <span class="badge badge-secondary">User</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a href="{{ route('users.edit', $user->id) }}"> <i
                                                    class="fa fa-pen class"> </i> </a>
                                        </div>
                                        <div class="col-md-6">
                                            <form action="{{ route('users.destroy', $user->id) }}" method="post">
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
