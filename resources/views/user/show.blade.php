@include('user.header')
<div id="show" style="background: #293352">
    <div class="container">
        <div class="row p-4">
            <div class="col-md-7">
                <h1 style="font-family: Merriweather;font-size:40px" class="text-white">{{ $course->name }}</h1>
                <p class="mt-4 text-white" style="font-family: Merriweather;font-size:18px">{{ $course->description }}
                </p>
                <div style="border: 0;border-radius:2px;width:40%;background:#A51C30;font-size:17px"
                    class="p-1 text-center">
                    <a href="" class="addToCart" data-url="{{ route('addToCart', $course->id) }}"
                        style="text-decoration:none">
                        <p style="margin-top: 12px;font-family:Merriweather"
                            class="text-white text-uppercase text-decoration-none">
                            {{ trans('pagination.home.takecourse') }}
                            <i class="fa fa-share-square"></i>
                        </p>
                    </a>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card" style="box-shadow:2px 2px #eee;font-family:Merriweather">
                    <img src="/uploads/{{ $course->thumbnail }}" style="width:100%;height:250px;object-fit: cover;"
                        alt="">
                    <div class="p-4">
                        <div class="row">
                            <div class="col-md-6">
                                <i class="fa fa-calendar-alt text-secondary" style="font-size: 15px"></i> <span
                                    style="font-size: 15px"
                                    class="text-secondary">{{ trans('pagination.home.datecreate') }}</span>
                            </div>
                            <div class="col-md-6">
                                <p class="text-secondary">{{ date_format($course->created_at, 'F d,Y') }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <i class="fa fa-list text-secondary" style="font-size: 15px"></i> <span
                                    class="text-secondary"
                                    style="font-size: 15px">{{ trans('pagination.category') }}</span>
                            </div>
                            <div class="col-md-6">
                                <p class="text-secondary">{{ $course->category['name'] }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <i class="fa fa-money-check-alt text-secondary" style="font-size: 15px"></i> <span
                                    class="text-secondary"
                                    style="font-size: 15px">{{ trans('pagination.price') }}</span>
                            </div>
                            <div class="col-md-6">
                                @if (session()->get('lang') == 'vi')
                                    <span style="text-decoration:line-through;font-size:12px" class="text-dark">
                                        {{ number_format($course->price) }} <sup>vnd</sup></span>
                                    <span class="text-dark" style="font-size:13px">
                                        {{ number_format($course->price * ((100 - $course->discount) / 100)) }}
                                        <sup>vnd</sup>
                                    </span>
                                @elseif(session()->get('lang') == 'en')
                                    <span style="text-decoration:line-through;font-size:12px" class="text-dark">
                                        {{ ROUND($course->price / 23000) }} <sup>$</sup></span>
                                    <span class="text-dark" style="font-size:13px">
                                        {{ ROUND(($course->price * ((100 - $course->discount) / 100)) / 23000) }}
                                        <sup>$</sup>
                                    </span>
                                @else
                                    <span style="text-decoration:line-through;font-size:12px" class="text-dark">
                                        {{ number_format($course->price) }} <sup>vnd</sup></span>
                                    <span class="text-dark" style="font-size:13px">
                                        {{ number_format($course->price * ((100 - $course->discount) / 100)) }}
                                        <sup>vnd</sup>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div id="comment" class="mt-5 mb-5">
    <div class="container">

        <div class="row">
            <div class="col-md-8">
                @if (Auth::check())

                    <div class="row">
                        <div class="col-md-3 col-3 text-right">
                            <i class="fa fa-user-circle text-secondary" style="font-size: 50px"></i>
                        </div>
                        <div class="col-md-9 col-9">
                            <div id="error"></div>
                            <form action="javascript:void(0)" method="post">
                                @csrf
                                <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">
                                <input type="hidden" id="course_id" name="course_id" value="{{ $course->id }}">
                                <div class="form-group">
                                    <textarea name="content" id="content" cols="30" rows="2"
                                        class="form-control"></textarea>
                                </div>
                                <div class="form-group float-right">
                                    <button id="add_cmt" type="submit"
                                        class="btn btn-success text-uppercase">send</button>
                                </div>
                            </form>
                        </div>
                    </div>
                @else
                    <center>
                        <h5><a href="{{ route('login') }}">{{ trans('pagination.home.Pleaselogintocomment') }}</a>
                        </h5>
                    </center>
                @endif
                <div class="row mt-5">
                    <div class="col-md-12">
                        @forelse($commentList->comments as $comment)
                            <div class="row mt-2">
                                <div class="col-md-3 col-3 text-center">
                                    <i class="fa fa-user-circle text-secondary" style="font-size: 40px"></i><br>
                                    <span style="font-size: 13px">{{ $comment->user['name'] }}</span>
                                </div>
                                <div class="col-md-9 col-9">
                                    <div class="alert alert-secondary">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <span style="font-size: 10px" class="text-secondary"><i
                                                        class="fa fa-clock"></i>
                                                    {{ date_format($comment->created_at, 'h:m:s d-m-Y') }}</span>
                                            </div>
                                            <div class="col-md-6 text-right">
                                                @if (Auth::check())
                                                    @if (Auth::user()->role == 'admin')
                                                        <form action="{{ route('comments.destroy', $comment->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="border-0 bg-transparent text-secondary"><i
                                                                    class="fa fa-trash"></i></button>
                                                        </form>
                                                    @endif
                                                @endif

                                            </div>
                                        </div>
                                        <p>{{ $comment->content }}</p>
                                    </div>
                                </div>

                            </div>

                        @empty
                            <center>
                                <h4>{{ trans('pagination.home.Thisposthasnocommentsyet') }}</h4>
                            </center>
                        @endforelse
                        {{-- @endforeach --}}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-3 shadow">
                    <div class="row mb-3">
                        <div class="col-md-4 text-center mx-auto">
                            <h2 style="border-bottom: 2px solid red"><a href="{{ route('news.index') }}">Blog</a>
                            </h2>
                        </div>
                    </div>
                    @forelse ($blogList as $blog)
                        <div class="row p-2" style="border-bottom: 1px solid #eee">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-2 text-right">
                                        <i class="fa fa-file-word mt-3 text-secondary" style="font-size: 30px"></i>
                                    </div>
                                    <div class="col-md-10">
                                        <a href="{{ route('news.show', $blog->id) }}">
                                            <h4 style="font-family: Merriweather">{{ $blog->title }}</h4>
                                        </a>
                                        <span style="font-size: 13px">{{ $blog->description }}</span>
                                        <div class="row text-secondary mt-2" style="font-size: 11px">
                                            <div class="col-md-6">
                                                <i class="fa fa-user"></i> {{ $blog->user['name'] }}
                                            </div>
                                            <div class="col-md-6">
                                                <i class="fa fa-clock"></i>
                                                {{ date_format($blog->created_at, 'd-m-Y') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <center>
                            <h4>{{ trans('pagination.home.Thebloghasnoposts') }}</h4>
                        </center>
                    @endforelse
                </div>
            </div>



        </div>
    </div>
</div>

@include('user.footer')
<script>
    function addToCart(event) {
        event.preventDefault();
        let urlCart = $(this).data('url');
        $.ajax({
            type: 'GET',
            url: urlCart,
            dataType: 'json',
            success: function(data) {
                if (data.code === 200) {
                    alert('Add Success')
                }
            },
            error: function() {

            }
        })
    }

    function addComment(e) {
        e.preventDefault()
        let url = '{{ route('comments.store') }}'
        let content = $('#content').val()
        let user_id = $('#user_id').val()
        let course_id = $('#course_id').val()
        if (content == '') {
            $('#error').html('* Dữ liệu điền vào không được để trống')
        } else {
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
                    content: content,
                    user_id: user_id,
                    course_id: course_id
                },
                success: function(data) {
                    window.location = ''
                }

            })
        }

    }
    $(function() {
        $('.addToCart').on('click', addToCart);
        $('#add_cmt').on('click', addComment);
    })
</script>
<style>
    #error {
        color: #A51C30
    }

</style>
