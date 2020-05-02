<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct() {
        $this->model = app(Categories::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->model->getAllWithPaginate(5);
        return view('admin.categories.index',['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new Categories();

        $result = $this->model->getForSelectBox();

        return view('admin.categories.edit', ['categorylist' => $result,'item' => $item]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->input();

        $category = new Categories($input);
        $category->save();

        if($category){
            return redirect()->route('admin.categories.edit',$category->id)->with(['success' => ' Category has been saved']);
        }else{
            return back()->withErrors(['msg' => 'Save Error'])->withInput();
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = $this->model->find($id);

        if(empty($item)){
            abort(404);
        }
        $categorylist = $this->model->getForSelectBox();

        return view('admin.categories.edit', ['item'=> $item, 'categorylist' => $categorylist]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = $this->model->getEdit($id);

        $data = $request->all();

        $result = $item->update($data);

        if($result){
            return redirect()->route('admin.categories.edit',$id)->with(['success' => 'Success update']);
        }else{
            return back()->withErrors(['msg' => 'Update Error']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = $this->model->GetEdit($id);

        $result = $item->delete();

        if($result){
            return redirect()->back();
        }
    }
}
