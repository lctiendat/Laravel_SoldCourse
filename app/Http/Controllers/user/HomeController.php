<?php

namespace App\Http\Controllers\user;

use App\Exports\OrdersExport;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Course;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Interfaces\CourseRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
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
    public function index()
    {
        return view('user.home');
    }
    // public function getCategory()
    // {
    //     return view('user.home', compact('categoryList'));
    // }
    public function getData()
    {
        $courseNew = $this->getNewCourse();
        $courseVip = $this->getCourseVip();
        $courseRandom = $this->getRandomCourse();
        $categoryList = $this->categoryRepository->getAll();
        $courseList = Course::simplePaginate(8);
        return view('user.home', compact('courseList', 'categoryList', 'courseNew', 'courseVip', 'courseRandom'));
    }
    public function showCourse($id)
    {
        $commentList = $this->courseRepository->find($id);
        $categoryList = $this->categoryRepository->getAll();
        $course = $this->courseRepository->find($id);
        $blogList = Blog::take(5)->get();
        return view('user.show', compact('course', 'categoryList', 'commentList', 'blogList'));
    }
    public function showCourseOfCategory($id)
    {

        $categoryList = $this->categoryRepository->getAll();
        $coursesOfCategory = Category::find($id);
        return view('user.showCategory', compact('coursesOfCategory', 'categoryList'));
    }
    public function getNewCourse()
    {
        $courseNew = Course::orderBy('created_at', 'DESC')->limit(3)->get();
        return $courseNew;
    }
    function getCourseVip()
    {
        $courseVip = Course::orderBy('price', 'DESC')->limit(3)->get();
        return $courseVip;
    }
    function getRandomCourse()
    {
        $courseRandom = Course::inRandomOrder()->limit(3)->get();
        return $courseRandom;
    }
    function exportOrder(Request $request)
    {
        // $data = [
        //     'created_from' => $request->created_from,
        //     'created_to' => $request->created_to,
        //     'status' => $request->status
        // ];
        return Excel::download(new OrdersExport(), 'orders.xlsx');
    }
}
