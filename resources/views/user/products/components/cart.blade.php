<div class="cart mb-5">
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-6">
                <h2 style="color: #A61C30"> {{ trans('pagination.cart.billinginformation') }}</h2>
                <form action="{{ route('storeOrder') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">
                            {{ trans('pagination.order.fullname') }}
                        </label>
                        <input type="text" name="fullname" id="" class="form-control" style="border: 1px solid #A61C30">
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
                        <input type="text" name="address" id="" class="form-control" style="border: 1px solid #A61C30">
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
                        <input type="number" name="phoneNumber" id="" class="form-control"
                            style="border: 1px solid #A61C30">
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
                        <input type="email" name="email" id="" class="form-control" style="border: 1px solid #A61C30">
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
                        <textarea name="note" id="" cols="30" rows="7" class="form-control"
                            style="border: 1px solid #A61C30">
                        </textarea>
                        @if ($errors->has('note'))
                            <p class="text-danger">* {{ trans('pagination.error') }} !
                                {{ $errors->first('note') }}
                            </p>
                        @endif
                    </div>
            </div>
            <div class="col-md-6">
                @if ($products)
                    <div class="card p-4">
                        @if (Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>{{ trans('pagination.success') }}!</strong> {{ Session::get('success') }}
                            </div>
                        @endif
                        <h2 style="color:#A61C30"> {{ trans('pagination.cart.yourorder') }}
                        </h2>
                        <div class="row" style="border-bottom: 1px solid #eee;font-weight:bold">
                            <div class="col-md-9">
                                {{ trans('pagination.cart.product') }}

                            </div>
                            <div class="col-md-3 mr-auto">
                                {{ trans('pagination.cart.total') }}

                            </div>
                        </div>
                        @php
                            $total = 0;
                            $i = 0;
                        @endphp

                        @foreach ($products as $id => $product)
                            @php
                                $total += $product['price'] * $product['amount'];
                                $i++;
                            @endphp
                            <input type="hidden" name="course_id" value="{{ $id }}">
                            @if (Auth::check())
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            @endif
                            <div class="row" style="font-size: 14px">
                                <div class="col-md-9 text-secondary" style="font-size: 14px">
                                    {{ substr($product['name'], 0, 50) }} x {{ $product['amount'] }}
                                </div>
                                <div class="col-md-3 font-weight-bold" style="color: #A61C30">
                                    {{ number_format($product['price'] * $product['amount']) }}<sup> $</sup>
                                </div>
                                {{-- <div class="col-md-1 text-center">
                                    <i class="fa fa-trash"></i>
                                </div> --}}
                            </div>
                        @endforeach
                        <div class="row " style="border-top:1px solid #eee;font-size: 14px">
                            <div class="col-md-9 font-weight-bold">
                                {{ trans('pagination.cart.total') }}
                            </div>
                            <div class="col-md-3 font-weight-bold" style="color: #A61C30">
                                {{ number_format($total) }} <sup>$</sup>
                            </div>
                        </div>
                        <button class="btn w-25 mt-4 text-white"
                            style="border-radius:0;background-color:#A61C30 !important">
                            {{ trans('pagination.cart.order') }}</button>


                    </div>
                @else
                    <center>
                        <h3> {{ trans('pagination.cart.empty') }}</h3>
                    </center>
                @endif

            </div>
        </div>
    </div>
    </form>
</div>

{{-- <script>
    $(document).ready(function() {
        $('i:last-child').on('click', function(e) {
            e.preventDefault();
            let id = $('input[name="course_id"]').val()
            let url = '{{ route('deleteProduct') }}'
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: url,
                dataType: 'json',
                data: {
                    id: id
                },
                success: function(response) {
                    if (response.code == 200) {
                        alert('ok')
                    }
                },
                error: function(response) {
                    alert('cc')
                }
            })
        })
    })
</script> --}}
