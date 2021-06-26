<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Mail\OrderMail;
use App\Models\Category;
use App\Models\Course;
use App\Models\Order;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Interfaces\CourseRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\DocBlock\Tags\Throws;

class ProductController extends Controller
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
    public function addToCart($id)
    {
        $product = $this->courseRepository->find($id);
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            $cart[$id]['amount'] =  $cart[$id]['amount'] + 1;
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price * ((100 - $product->discount) / 100),
                'thumbnail' => $product->thumbnail,
                'amount' => 1
            ];
        }
        session()->put('cart', $cart);
        return response()->json([
            'code' => 200,
            'message' => 'success'
        ]);
    }
    public function deleteProduct(Request $request)
    {
            $cart = session()->get('cart');
            Session::pull($cart, $request->id);
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ]);
    }
    public function showCart()
    {
        try {
            $categoryList = $this->categoryRepository->getAll();
            $products = session()->get('cart');
        } catch (ModelNotFoundException $exception) {
            Session::flash('success', trans('pagination.cart.order') . ' ' . trans('pagination.error'));
        }
        return view('user.products.cart', compact('products', 'categoryList'));
    }
    public function updateCart(Request $request)
    {

        if ($request->id && $request->amount) {
            $products = session()->get('cart');
            $products[$request->id]['amount'] = $request->amount;
            session()->put('cart', $products);
            $products = session()->get('cart');
            $product_List = view('user.products.components.cart', compact('products'))->render();
            return response()->json(['productLista' => $product_List, 'code' => 200]);
        }
    }
    public function storeOrder(OrderRequest $request)
    {
        Order::create($request->all());
        $course = DB::table('courses')->select('price', 'discount', 'name')->where('id', $request->course_id)->get();
        foreach ($course as $c) {
            $details = [
                'title' => 'Thanh toán hoá đơn',
                'nameGuest' => $request->fullname,
                'nameCourse' => $c->name,
                'money' => $c->price * ((100 - $c->discount) / 100),
                'date' => date_format(Carbon::now('Asia/Ho_Chi_Minh'), 'h:m:s d-m-Y'),
            ];
        }
        Mail::to($request->email)->send(new OrderMail($details));
        Session::flash('success', trans('pagination.cart.order') . ' ' . trans('pagination.success'));
        Session::pull('cart');
        return redirect()->back();
    }
}
