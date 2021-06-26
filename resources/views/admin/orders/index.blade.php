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
            <form action="{{ route('orders.index') }}" method="get">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="date" name="create_from" id="" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="date" name="create_to" id="" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <select name="status" id="" class="form-control">
                                <option value="">Trạng thái</option>
                                <option value="1">{{ trans('pagination.status.pending') }}</option>
                                <option value="2">{{ trans('pagination.status.accept') }}</option>
                                <option value="3">{{ trans('pagination.status.success') }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 text-center">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <button type="submit" id="filler" class="btn btn-primary">Filler</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <form action="{{ route('exportOrder') }}" method="get">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="date" name="create_from" id="" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="date" name="create_to" id="" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <select name="status" id="" class="form-control">
                                <option value="">Trạng thái</option>
                                <option value="1">{{ trans('pagination.status.pending') }}</option>
                                <option value="2">{{ trans('pagination.status.accept') }}</option>
                                <option value="3">{{ trans('pagination.status.success') }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 text-center">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Export</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#ID</th>
                            <th>{{ trans('pagination.order.fullname') }}</th>
                            <th>{{ trans('pagination.order.phoneNumber') }}</th>
                            <th>{{ trans('pagination.course') }}</th>
                            <th>{{ trans('pagination.order.status') }}</th>
                            <th>{{ trans('pagination.action') }}</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#ID</th>
                            <th>{{ trans('pagination.order.fullname') }}</th>
                            <th>{{ trans('pagination.order.phoneNumber') }}</th>
                            <th>{{ trans('pagination.course') }}</th>
                            <th>{{ trans('pagination.order.status') }}</th>
                            <th>{{ trans('pagination.action') }}</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($orderList as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->fullname }}</td>
                                <td>{{ $order->phoneNumber }}</td>
                                <td>{{ $order->course['name'] }}</td>
                                <td>
                                    @if ($order->status == 1)
                                        <span
                                            class="badge badge-secondary">{{ trans('pagination.status.pending') }}</span>
                                    @endif
                                    @if ($order->status == 2)
                                        <span
                                            class="badge badge-warning">{{ trans('pagination.status.accept') }}</span>
                                    @endif
                                    @if ($order->status == 3)
                                        <span
                                            class="badge badge-success">{{ trans('pagination.status.success') }}</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a href="{{ route('orders.edit', $order->id) }}"> <i
                                                    class="fa fa-pen class"> </i> </a>
                                        </div>
                                        <div class="col-md-6">
                                            <form action="{{ route('orders.destroy', $order->id) }}" method="post">
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
{{-- <script>
    $(document).ready(function() {
        $('#export').on('click', (e) => {
            e.preventDefault();
            let status = $('select[name="status"]').val()
            let create_from = $('input[name="create_from"]').val()
            let create_to = $('input[name="create_to"]').val()
            let url = '{{ route('exportOrder') }}'
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: url,
                type: 'get',
                dataType: 'json',
                data: {
                    status: status,
                    create_from: create_from,
                    create_to: create_to
                },
                success: function(response) {
                    alert('ok')
                },
                error: function(response) {
                    alert('false')
                }


            })
        })
    })
</script> --}}
