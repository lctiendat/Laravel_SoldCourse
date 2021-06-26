@include('user.header')
<div id="blog" class="mt-3">
    <div class="container">
        <div class="row p-5">
            <div class="col-md-8 mx-auto">
                @forelse ($blogList as $blog)
                    <div class="card p-3 mt-4">
                        <div class="row">
                            <div class="col-md-12">
                                <h3><i class="fa fa-file-word"></i><a href="{{ route('blogs.show', $blog->id) }}">
                                        {{ $blog->title }}</a>
                                </h3>
                                <div style="font-size: 12px;border-top:1px solid #eee;border-bottom:1px solid #eee"
                                    class="text-secondary p-2">
                                    <span> <i class="fa fa-user"></i> {{ $blog->user['name'] }}</span>
                                    <span> <i class="fa fa-clock"></i>
                                        {{ date_format($blog->created_at, 'd-m-Y') }}</span>
                                </div>
                                <p class="mt-3">{{ $blog->description }}</p>
                                <span style="font-size: 12px;color:#A51C30"><a
                                        href="{{ route('news.show', $blog->id) }}">Read
                                        More...</a></span>
                            </div>
                        </div>
                    </div>
                @empty
                    <center>
                        <h3>{{ trans('pagination.home.Thebloghasnoposts') }}</h3>
                    </center>
                @endforelse

            </div>
        </div>
    </div>
</div>
@include('user.footer')
