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
                    <form action="{{ route('users.update', $user->id) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="">
                                {{ trans('pagination.user.name') }} </label>
                            <input type="text" name="name" id="" class="form-control" value="{{ $user->name }}"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label for="">
                                Email </label>
                            <input type="text" name="email" id="" class="form-control" value="{{ $user->email }}"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label for="">
                                {{ trans('pagination.user.role') }}
                            </label>
                            <select name="role" id="" class="form-control">
                                <option value="user" @if ($user->role == 'user') {{ 'selected' }} @endif>User</option>
                                <option value="admin" @if ($user->role == 'admin') {{ 'selected' }} @endif>Admin</option>
                            </select>
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
