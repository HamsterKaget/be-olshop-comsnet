<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index()
    {
        if(request()->ajax()) {
            $query = User::query();
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
                                <a href="' . route('user.edit', $item->id) . '" class="dropdown-item">Edit</a>
                                <form action="'. route('user.destroy', $item->id).'" method="post">
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
        return view('pages.admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        // dd('ada');
        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        if(User::create($data)) {
            return redirect()->route('user.index')->with(['success' =>'Data Stored Successfully']);
        }

        return redirect()->route('user.index')->with(['error' => 'Can\'t Stored Data ']);
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
        $item = User::findOrFail($id);

        return view('pages.admin.user.edit', [
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
    public function update(UserRequest $request, $id)
    {
        $data = $request->all();
        $item = User::findOrFail($id);

        if($request->password) {
            $data['password'] = bcrypt($request->password);
        } else {
            unset($data['password']);
        }



        if($item->update($data)) {
            return redirect()->route('user.index')->with(['success' =>'Data Updated']);
        }
        return redirect()->route('user.index')->with(['error' => 'Can\'t Update Data ']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item =  User::findOrFail($id);
        $item->delete();

        return redirect()->route('user.index')->with(['success' =>' Data successfuly deleted']);
        // ddd($item['photo']);
    }
}
