@include('user.header')
<div id="blog" class="mt-5">
    <div class="container">
        <div class="row p-5">
            <div class="col-md-8 mx-auto">
                <h3><i class="fa fa-file-word"></i> {{ $blog->title }}</h3>
                <div style="font-size: 12px;border-top:1px solid #eee;border-bottom:1px solid #eee"
                    class="text-secondary p-2">
                    <span> <i class="fa fa-user"></i> {{ $blog->user['name'] }}</span>
                    <span> <i class="fa fa-clock"></i> {{ date_format($blog->created_at, 'd-m-Y') }}</span>
                </div>
                <p class="mt-3">{{ $blog->content }}</p>
            </div>
        </div>
    </div>
</div>
@include('user.footer')
