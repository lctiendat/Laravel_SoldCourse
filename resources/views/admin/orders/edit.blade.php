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
                    <form action="{{ route('orders.update', $order->id) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="">
                                {{ trans('pagination.order.fullname') }}
                            </label>
                            <input type="text" name="fullname" readonly id="" class="form-control"
                                value="{{ $order->fullname }}">
                            @if ($errors->has('fullname'))
                                <p class="text-danger">* {{ trans('pagination.error') }} !
                                    {{ $errors->first('fullname') }}
                                </p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">
                                {{ trans('pagination.order.address') }}
                            </label>
                            <input type="text" name="address" readonly id="" class="form-control"
                                value="{{ $order->address }}">
                            @if ($errors->has('address'))
                                <p class="text-danger">* {{ trans('pagination.error') }} !
                                    {{ $errors->first('address') }}
                                </p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">
                                {{ trans('pagination.order.phoneNumber') }}
                            </label>
                            <input type="number" name="phoneNumber" readonly id="" class="form-control"
                                value="{{ $order->phoneNumber }}">
                            @if ($errors->has('phoneNumber'))
                                <p class="text-danger">* {{ trans('pagination.error') }} !
                                    {{ $errors->first('phoneNumber') }}
                                </p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">
                                Email
                            </label>
                            <input type="email" name="email" id="" readonly class="form-control"
                                value="{{ $order->email }}">
                            @if ($errors->has('email'))
                                <p class="text-danger">* {{ trans('pagination.error') }} !
                                    {{ $errors->first('email') }}
                                </p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">
                                {{ trans('pagination.course') }}
                            </label>
                            <input type="email" name="email" id="" class="form-control" readonly
                                value="{{ $order->course['name'] }}">
                            @if ($errors->has('email'))
                                <p class="text-danger">* {{ trans('pagination.error') }} !
                                    {{ $errors->first('email') }}
                                </p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">
                                {{ trans('pagination.order.note') }}
                            </label>
                            <textarea name="note" id="" cols="30" rows="7" readonly class="form-control">{{ $order->note }}
                            </textarea>
                            @if ($errors->has('note'))
                                <p class="text-danger">* {{ trans('pagination.error') }} !
                                    {{ $errors->first('note') }}
                                </p>
                            @endif
                        </div>
                        <div class="form-group">
                            <select name="status" id="" class="form-control">
                                <option value="1">{{ trans('pagination.status.pending') }}</option>
                                <option value="2">{{ trans('pagination.status.accept') }}</option>
                                <option value="3">{{ trans('pagination.status.success') }}</option>
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
