@include('user.header')
<div id="main" class="mb-5">
    <div class="container-fluid">
        <div class="row text-center">
            <div class="col-md-2 mx-auto">
                <h1 style="font-family:Merriweather;border-bottom:2px solid red;width:100%">
                    {{ trans('pagination.course') }}</h1>
            </div>
        </div>

        <div class="row">
            @foreach ($courseList as $course)
                <div class="col-md-3 mt-4">
                    <div class="card shadow">
                        <a href="{{ route('course.show', $course->id) }}"><img
                                src="/uploads/{{ $course->thumbnail }}" style="width:100%;height:200px;object-fit: cover;
                        " alt="bhfvierd"></a>
                        <div class="p-3">
                            <div class="row pr-0">
                                <div class="col-md-9 col-9">
                                    <p style="font-size: 14px;font-family:Arial" class="text-secondary"><i
                                            class="fa fa-code"></i>
                                        {{ substr($course->category['name'], 0, 27) }} </p>
                                </div>
                                <div class="col-md-3 col-3">
                                    <p style="background-color: #293352;font-size:9px" class="text-white p-1">
                                        - {{ $course->discount }} %</p>
                                </div>
                            </div>

                            <a class="text-decoration-none" href="{{ route('course.show', $course->id) }}">
                                <span style="font-size: 18px;font-family:Arial;color:#A51C30">
                                    {{ substr($course->name, 0, 25) }}</span>
                            </a>
                            {{-- <span style="font-size: 16px;font-family:Merriweather" class="text-secondary">
                                {{ substr($course->description, 0, 70) }}</span> --}}
                            <div class="row mt-1 sao">
                                <div class="col-md-6">
                                    <i class="fa fa-star text-danger"></i>
                                    <i class="fa fa-star text-danger"></i>
                                    <i class="fa fa-star text-danger"></i>
                                    <i class="fa fa-star text-danger"></i>
                                    <i class="fa fa-star text-danger"></i>

                                </div>
                                <div class="col-md-6 text-right">
                                    <a class="text-decoration-none" href="{{ route('course.show', $course->id) }}">
                                        @if (session()->get('lang') == 'vi')
                                            <span style="text-decoration:line-through;font-size:12px"
                                                class="text-secondary">
                                                {{ number_format($course->price) }} <sup>vnd</sup></span>
                                            <p class="text-secondary" style="font-size:13px">
                                                {{ number_format($course->price * ((100 - $course->discount) / 100)) }}
                                                <sup>vnd</sup>
                                            </p>
                                        @elseif(session()->get('lang') == 'en')
                                            <span style="text-decoration:line-through;font-size:12px"
                                                class="text-secondary">
                                                {{ ROUND($course->price / 23000) }} <sup>$</sup></span>
                                            <p class="text-secondary" style="font-size:13px">
                                                {{ ROUND(($course->price * ((100 - $course->discount) / 100)) / 23000) }}
                                                <sup>$</sup>
                                            </p>
                                        @else
                                            <span style="text-decoration:line-through;font-size:12px"
                                                class="text-secondary">
                                                {{ number_format($course->price) }} <sup>vnd</sup></span>
                                            <p class="text-secondary" style="font-size:13px">
                                                {{ number_format($course->price * ((100 - $course->discount) / 100)) }}
                                                <sup>vnd</sup>
                                            </p>
                                        @endif
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach

        </div>
        <div class="row text-center mt-4 justify-content-center mx-auto">
            <div class="col-md-12">
                <p class="mx-auto text-center justify-content-center">{{ $courseList->links() }}</p>
            </div>
        </div>
    </div>
</div>

<div id="center" class="mt-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card p-2 pb-4">
                    <h3 class="text-center">{{ trans('pagination.home.courselasted') }}</h3>
                    @foreach ($courseNew as $cn)
                        <div class="row mt-3">
                            <div class="col-md-5">
                                <img src="/uploads/{{ $cn->thumbnail }}" alt="gjghjh" width="100%">
                            </div>
                            <div class="col-md-7">
                                <a class="text-decoration-none" href="{{ route('course.show', $cn->id) }}">
                                    <span style="font-size: 16px;font-family:Arial;color:#A51C30;font-weight:bold">
                                        {{ substr($cn->name, 0, 25) }}</span> </a> <br>
                                <span style="font-size: 12px"
                                    class="text-secondary">{{ $cn->category['name'] }}</span> <br>
                                    @if (session()->get('lang') == 'vi')
                                    <span style="text-decoration:line-through;font-size:12px"
                                        class="text-dark">
                                        {{ number_format($cn->price) }} <sup>vnd</sup></span>
                                    <p class="text-dark" style="font-size:13px">
                                        {{ number_format($cn->price * ((100 - $cn->discount) / 100)) }}
                                        <sup>vnd</sup>
                                    </p>
                                @elseif(session()->get('lang') == 'en')
                                    <span style="text-decoration:line-through;font-size:12px"
                                        class="text-dark">
                                        {{ ROUND($cn->price / 23000) }} <sup>$</sup></span>
                                    <p class="text-dark" style="font-size:13px">
                                        {{ ROUND(($cn->price * ((100 - $cn->discount) / 100)) / 23000) }}
                                        <sup>$</sup>
                                    </p>
                                @else
                                    <span style="text-decoration:line-through;font-size:12px"
                                        class="text-dark">
                                        {{ number_format($cn->price) }} <sup>vnd</sup></span>
                                    <p class="text-dark" style="font-size:13px">
                                        {{ number_format($cn->price * ((100 - $cn->discount) / 100)) }}
                                        <sup>vnd</sup>
                                    </p>
                                @endif
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-2 pb-4">
                    <h3 class="text-center">{{ trans('pagination.home.coursevip') }}</h3>
                    @foreach ($courseVip as $cv)
                        <div class="row mt-3">
                            <div class="col-md-5">
                                <img src="/uploads/{{ $cv->thumbnail }}" alt="gjghjh" width="100%">
                            </div>
                            <div class="col-md-7">
                                <a class="text-decoration-none" href="{{ route('course.show', $cv->id) }}">
                                    <span style="font-size: 16px;font-family:Arial;color:#A51C30;font-weight:bold">
                                        {{ substr($cv->name, 0, 25) }}</span> </a> <br>
                                <span style="font-size: 12px"
                                    class="text-secondary">{{ $cv->category['name'] }}</span> <br>
                                    @if (session()->get('lang') == 'vi')
                                    <span style="text-decoration:line-through;font-size:12px"
                                        class="text-dark">
                                        {{ number_format($cv->price) }} <sup>vnd</sup></span>
                                    <p class="text-dark" style="font-size:13px">
                                        {{ number_format($cv->price * ((100 - $cv->discount) / 100)) }}
                                        <sup>vnd</sup>
                                    </p>
                                @elseif(session()->get('lang') == 'en')
                                    <span style="text-decoration:line-through;font-size:12px"
                                        class="text-dark">
                                        {{ ROUND($cv->price / 23000) }} <sup>$</sup></span>
                                    <p class="text-dark" style="font-size:13px">
                                        {{ ROUND(($cv->price * ((100 - $cn->discount) / 100)) / 23000) }}
                                        <sup>$</sup>
                                    </p>
                                @else
                                    <span style="text-decoration:line-through;font-size:12px"
                                        class="text-dark">
                                        {{ number_format($cv->price) }} <sup>vnd</sup></span>
                                    <p class="text-dark" style="font-size:13px">
                                        {{ number_format($cv->price * ((100 - $cv->discount) / 100)) }}
                                        <sup>vnd</sup>
                                    </p>
                                @endif
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-2 pb-4">
                    <h3 class="text-center">{{ trans('pagination.home.courserandom') }}</h3>
                    @foreach ($courseRandom as $cr)
                        <div class="row mt-3">
                            <div class="col-md-5">
                                <img src="/uploads/{{ $cr->thumbnail }}" alt="gjghjh" width="100%">
                            </div>
                            <div class="col-md-7">
                                <a class="text-decoration-none" href="{{ route('course.show', $cr->id) }}">
                                    <span style="font-size: 16px;font-family:Arial;color:#A51C30;font-weight:bold">
                                        {{ substr($cr->name, 0, 25) }}</span> </a><br>
                                <span style="font-size: 12px"
                                    class="text-secondary">{{ $cr->category['name'] }}</span> <br>
                                    @if (session()->get('lang') == 'vi')
                                    <span style="text-decoration:line-through;font-size:12px"
                                        class="text-dark">
                                        {{ number_format($cr->price) }} <sup>vnd</sup></span>
                                    <p class="text-dark" style="font-size:13px">
                                        {{ number_format($cr->price * ((100 - $cr->discount) / 100)) }}
                                        <sup>vnd</sup>
                                    </p>
                                @elseif(session()->get('lang') == 'en')
                                    <span style="text-decoration:line-through;font-size:12px"
                                        class="text-dark">
                                        {{ ROUND($cr->price / 23000) }} <sup>$</sup></span>
                                    <p class="text-dark" style="font-size:13px">
                                        {{ ROUND(($cr->price * ((100 - $cr->discount) / 100)) / 23000) }}
                                        <sup>$</sup>
                                    </p>
                                @else
                                    <span style="text-decoration:line-through;font-size:12px"
                                        class="text-dark">
                                        {{ number_format($cr->price) }} <sup>vnd</sup></span>
                                    <p class="text-dark" style="font-size:13px">
                                        {{ number_format($cr->price * ((100 - $cr->discount) / 100)) }}
                                        <sup>vnd</sup>
                                    </p>
                                @endif
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12 text-center">
            <h3 class="text-uppercase">{{ trans('pagination.home.instructors') }}</h3>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-3 text-center">
            <div class="card p-3 ">
                <img src="https://scontent.fdad3-3.fna.fbcdn.net/v/t1.6435-9/109548789_3501705109841640_2588589364053126448_n.jpg?_nc_cat=100&ccb=1-3&_nc_sid=09cbfe&_nc_ohc=gi04Qa8clMYAX8W37c9&_nc_ht=scontent.fdad3-3.fna&oh=474dbc7ac0c300170e0ba283d6e0e37c&oe=60DD0850"
                    alt="" width="70%" class="rounded-circle mx-auto mt-2">
                <p class="mt-3 font-weight-bold" style="font-size: 15px">MR.Tran Thanh Binh</p>
                <span class="text-dark" style="font-size: 13px">mặt thầy uy tín thế này :D</span>
            </div>
        </div>
        <div class="col-md-3 text-center">
            <div class="card p-3 ">
                <img src="https://scontent.fdad3-3.fna.fbcdn.net/v/t1.6435-9/109548789_3501705109841640_2588589364053126448_n.jpg?_nc_cat=100&ccb=1-3&_nc_sid=09cbfe&_nc_ohc=gi04Qa8clMYAX8W37c9&_nc_ht=scontent.fdad3-3.fna&oh=474dbc7ac0c300170e0ba283d6e0e37c&oe=60DD0850"
                    alt="" width="70%" class="rounded-circle mx-auto mt-2">
                <p class="mt-3 font-weight-bold" style="font-size: 15px">MR.Tran Thanh Binh</p>
                <span class="text-dark" style="font-size: 13px">mặt thầy uy tín thế này :D</span>
            </div>
        </div>
        <div class="col-md-3 text-center">
            <div class="card p-3 ">
                <img src="https://scontent.fdad3-3.fna.fbcdn.net/v/t1.6435-9/109548789_3501705109841640_2588589364053126448_n.jpg?_nc_cat=100&ccb=1-3&_nc_sid=09cbfe&_nc_ohc=gi04Qa8clMYAX8W37c9&_nc_ht=scontent.fdad3-3.fna&oh=474dbc7ac0c300170e0ba283d6e0e37c&oe=60DD0850"
                    alt="" width="70%" class="rounded-circle mx-auto mt-2">
                <p class="mt-3 font-weight-bold" style="font-size: 15px">MR.Tran Thanh Binh</p>
                <span class="text-dark" style="font-size: 13px">mặt thầy uy tín thế này :D</span>
            </div>
        </div>
        <div class="col-md-3 text-center">
            <div class="card p-3 ">
                <img src="https://scontent.fdad3-3.fna.fbcdn.net/v/t1.6435-9/109548789_3501705109841640_2588589364053126448_n.jpg?_nc_cat=100&ccb=1-3&_nc_sid=09cbfe&_nc_ohc=gi04Qa8clMYAX8W37c9&_nc_ht=scontent.fdad3-3.fna&oh=474dbc7ac0c300170e0ba283d6e0e37c&oe=60DD0850"
                    alt="" width="70%" class="rounded-circle mx-auto mt-2">
                <p class="mt-3 font-weight-bold" style="font-size: 15px">MR.Tran Thanh Binh</p>
                <span class="text-dark" style="font-size: 13px">mặt thầy uy tín thế này :D</span>
            </div>
        </div>
    </div>
</div>

<div id="contact" class="mt-5" style="background: #7C0516;border-bottom:10px solid #A51C30">
    <div class="container-fluid">
        <div class="row p-3">
            <div class="col-md-10 mx-auto">
                <div class="row text-center">
                    <div class="col-md-4">
                        <p class="text-white mt-3" style="font-family:Merriweather;font-size:20px">
                            {{ trans('pagination.home.getupdatesonnewcourses') }}</p>
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="" id=""
                            style="width: 100%;height:60px;border:0;border-radius:5px;font-family:Merriweather;text-indent:10px"
                            placeholder=" Email address">
                    </div>
                    <div class="col-md-4">
                        <div style="border: 2px solid white;border-radius:5px;width:80%"
                            class="p-1 text-center mx-auto">
                            <p style="margin-top: 12px" class="text-white">{{ trans('pagination.home.subscriber') }}
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('user.footer')
<script type="text/javascript">
    $('#search').on('keyup', function() {
        $value = $(this).val();
        $.ajax({
            type: 'get',
            url: '{{ URL::to('search') }}',
            data: {
                'search': $value
            },
            success: function(data) {
                $('tbody').html(data);
            }
        });
    })
    $.ajaxSetup({
        headers: {
            'csrftoken': '{{ csrf_token() }}'
        }
    });
</script>
