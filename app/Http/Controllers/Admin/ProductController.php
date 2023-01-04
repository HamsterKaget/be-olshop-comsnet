<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;


class ProductController extends Controller
{
    public function index()
    {
        if(request()->ajax()) {
            $query = Product::with(['user', 'category']);
            return DataTables::of($query)->addColumn('action', function($item) {
                return '
                    <div class="btn-group">
                        <div class="dropdown">
                            <button
                            type="button"
                            data-toggle="dropdown"
                            class="btn btn-primary dropdown-toggle mr-1 mb-1">
                                Actions
                            </button>
                            <div class="dropdown-menu">
                                <a href="' . route('product.edit', $item->id) . '" class="dropdown-item">Edit</a>
                                <form action="'. route('product.destroy', $item->id).'" method="post">
                                    '. method_field('delete') . csrf_field() . '
                                    <button type="submit" class="btn dropdown-item text-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                ';
            })->rawColumns(['action'])->make();
        }
        // dd('ada');
        return view('pages.admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $categories = Category::all();

        return view('pages.admin.product.create', [
            'users' => $users,
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug('ada');

        // ddd($data['slug']);

        if(Product::create($data)) {
            return redirect()->route('product.index')->with(['success' =>'Data Stored Successfully']);
        }

        return redirect()->route('product.index')->with(['error' => 'Can\'t Stored Data ']);
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
        $item = Product::findOrFail($id);
        $users = User::all();
        $categories = Category::all();

        return view('pages.admin.product.edit', [
            'item' => $item,
            'users' => $users,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $data = $request->all();
        $item = Product::findOrFail($id);

        if($item->update($data)) {
            return redirect()->route('product.index')->with(['success' =>'Data Updated']);
        }
        return redirect()->route('product.index')->with(['error' => 'Can\'t Update Data ']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item =  Product::findOrFail($id);
        $item->delete();

        return redirect()->route('product.index')->with(['success' =>' Data successfuly deleted']);
        // ddd($item['photo']);
    }
}
