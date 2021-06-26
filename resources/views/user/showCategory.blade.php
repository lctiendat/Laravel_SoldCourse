@include('user.header')
<div id="main">
    <div class="container-fluid">
        <div class="row text-center">
            <div class="col-md-2 mx-auto">
                <h1 style="font-family:Merriweather;border-bottom:2px solid red;width:100%">
                    {{ trans('pagination.course') }}</h1>
            </div>
        </div>
        @if (Session::has('error'))
            <div class="alert alert-error alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>{{ trans('pagination.success') }}!</strong> {{ Session::get('success') }}
            </div>
        @endif
        <div class="row">
            @forelse ($coursesOfCategory->courses as $course)
            <div class="col-md-3 mt-4">
                <div class="card shadow">
                    <a href="{{ route('course.show', $course->id) }}"><img
                            src="/uploads/{{ $course->thumbnail }}" style="width:100%;height:200px;object-fit: cover;
                    " alt="bhfvierd"></a>
                    <div class="p-3">
                        <div class="row pr-0">
                            <div class="col-md-8 col-9">
                                <p style="font-size: 14px;font-family:Arial" class="text-secondary"><i
                                        class="fa fa-code"></i>
                                    {{ substr($course->category['name'], 0, 27) }} </p>
                            </div>
                            <div class="col-md-4 col-3">
                                <p style="background-color: #293352;font-size:12px" class="text-white p-1">
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
                                        class="text-dark">
                                        {{ number_format($course->price) }} <sup>vnd</sup></span>
                                    <p class="text-dark" style="font-size:13px">
                                        {{ number_format($course->price * ((100 - $course->discount) / 100)) }}
                                        <sup>vnd</sup>
                                    </p>
                                @elseif(session()->get('lang') == 'en')
                                    <span style="text-decoration:line-through;font-size:12px"
                                        class="text-dark">
                                        {{ ROUND($course->price / 23000) }} <sup>$</sup></span>
                                    <p class="text-dark" style="font-size:13px">
                                        {{ ROUND(($course->price * ((100 - $course->discount) / 100)) / 23000) }}
                                        <sup>$</sup>
                                    </p>
                                @else
                                    <span style="text-decoration:line-through;font-size:12px"
                                        class="text-dark">
                                        {{ number_format($course->price) }} <sup>vnd</sup></span>
                                    <p class="text-dark" style="font-size:13px">
                                        {{ number_format($course->price * ((100 - $course->discount) / 100)) }}
                                        <sup>vnd</sup>
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            @empty
                <center>
                    <h4>Danh mục chưa có bài viết</h4>
                </center>
            @endforelse

        </div>
        <div class="row text-center mt-4 justify-content-center mx-auto">
            <div class="col-md-12">
                {{-- <p class="mx-auto text-center justify-content-center">{{ $course->links() }}</p> --}}
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
