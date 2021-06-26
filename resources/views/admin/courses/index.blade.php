@include('admin.header')


<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-body">
            <a href="{{ route('courses.create') }}"><button class="btn btn-primary float-right mb-3">{{trans('pagination.add')}}</button></a>
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#ID</th>
                            <th>{{ trans('pagination.name') }}</th>
                            <th>{{ trans('pagination.course.thumbnail') }}</th>
                            <th>{{ trans('pagination.course.price') }}</th>
                            <th>{{ trans('pagination.action') }}</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#ID</th>
                            <th>{{ trans('pagination.name') }}</th>
                            <th>{{ trans('pagination.course.thumbnail') }}</th>
                            <th>{{ trans('pagination.course.price') }}</th>
                            <th>{{ trans('pagination.action') }}</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($courseList as $course)
                            <tr>
                                <td>{{ $course->id }}</td>
                                <td>{{ $course->name }}</td>
                                <td><img src="{{ URL::to('/') }}/uploads/{{$course->thumbnail}}" width="50px" height="30vh" alt="img false">
                                </td>
                                <td>{{ number_format($course->price) }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a href="{{ route('courses.edit', $course->id) }}"> <i
                                                    class="fa fa-pen class"> </i> </a>
                                        </div>
                                        <div class="col-md-6">
                                            <form action="{{ route('courses.destroy', $course->id) }}" method="post">
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
