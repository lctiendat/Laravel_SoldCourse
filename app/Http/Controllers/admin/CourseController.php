<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\Models\Category;
use App\Models\Course;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Interfaces\CourseRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CourseController extends Controller
{
    protected $courseRepository;
    protected $categoryRepository;
    public function __construct(CourseRepositoryInterface $courseRepository, CategoryRepositoryInterface $categoryRepository)
    {
        return [
            $this->courseRepository = $courseRepository,
            $this->categoryRepository = $categoryRepository
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courseList = $this->courseRepository->getAll();
        return view('admin.courses.index', compact('courseList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoryList = $this->categoryRepository->getAll();
        return view('admin.courses.create', compact('categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
        if ($request->file('thumbnail')->isValid()) {
            $image = $request->file('thumbnail');
            $image->move('uploads', $image->getClientOriginalName());
            $data = [
                'name' => $request->name,
                'description' => $request->description,
                'content' => $request->content,
                'price' => $request->price,
                'discount' => $request->discount,
                'thumbnail' => $image->getClientOriginalName(),
                'category_id' => $request->category_id,
                'user_id' => Auth::user()->id
            ];
            Course::create($data);
            Session::flash('success', trans('pagination.add') . ' ' . trans('pagination.success'));
            return redirect()->back();
        } else {
            Session::flash('error', trans('pagination.error'));
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = $this->courseRepository->find($id);
        $categoryList = $this->categoryRepository->getAll();
        return view('admin.courses.edit', compact('course', 'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CourseRequest $request, $id)
    {
        $course = $this->courseRepository->find($id);
        $course->update($request->all());
        Session::flash('success', trans('pagination.update') . ' ' . trans('pagination.success'));
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->courseRepository->delete($id);
        return redirect()->route('courses.index');
    }
}
