<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()) {
            $query = Category::query();
            return Datatables::of($query)->addColumn('action', function($item) {
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
                                <a href="' . route('category.edit', $item->id) . '" class="dropdown-item">Edit</a>
                                <form action="'. route('category.destroy', $item->id).'" method="post">
                                    '. method_field('delete') . csrf_field() . '
                                    <button type="submit" class="btn dropdown-item text-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                ';
            })->editColumn('photo', function($item) {
                return $item->photo ? '<img src="'. Storage::url($item->photo) .'" style="max-height: 40px;" />' : '';
            })->rawColumns(['action', 'photo'])->make();
        }
        // dd('ada');
        return view('pages.admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->all();

        if(!$request->slug) {
            $data['slug'] = Str::slug($request->name);
        }

        $data['photo'] = $request->file('photo')->store('assets/category', 'public');

        if(Category::create($data)) {
            return redirect()->route('category.index')->with(['success' =>'Data Stored Successfully']);
        }

        return redirect()->route('category.index')->with(['error' => 'Can\'t Stored Data ']);
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
        $item = Category::findOrFail($id);

        return view('pages.admin.category.edit', [
            'item' => $item,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        // if ($request->hasFile('photo')) {
        //     // Do something with the file
        //     $file = $request->file('photo');
        // }

        $data = $request->all();
        if(!$request->slug) {
            $data['slug'] = Str::slug($request->name);
        }

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('assets/category', 'public');
        }

        $item = Category::findOrFail($id);
        if($item->update($data)) {
            return redirect()->route('category.index')->with(['success' =>'Data Updated']);
        }
        return redirect()->route('category.index')->with(['error' => 'Can\' Update Dataa ']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item =  Category::findOrFail($id);
        $item->delete();

        return redirect()->route('category.index')->with(['success' =>'Data successfuly deleted']);
        // ddd($item['photo']);
    }
}
