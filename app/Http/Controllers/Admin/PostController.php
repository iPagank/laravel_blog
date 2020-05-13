<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminPostRequest;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\Post;
use Facade\FlareClient\Http\Exceptions\NotFound;

class PostController extends Controller
{
    public function __construct() {
        $this->model = app(Post::class);
        $this->category = app(Categories::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->model->getAllWithPaginate(20);
        return view('admin.post.index',['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new Post();
        $category = $this->category->getForSelectBox();
        return view('admin.post.edit',['categoryList' => $category, 'item' => $item]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminPostRequest $request)
    {
        $user = auth()->user();
        $result = array_merge($request->input(),['user_id' => $user->id]);

        $new_post = new Post($result);
            $new_post->save();
        if($new_post){

            return redirect()->route('admin.post.index')->with(['success' => 'Success Create!']);
        }
        return back()->withErrors(['msg' => 'Save Error!']);
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
        $post = $this->model->find($id);
        $categoryList = $this->category->getForSelectBox();
        if($post){
            return view('admin.post.edit',['item' => $post, 'categoryList' => $categoryList]);
        }
        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminPostRequest $request, $id)
    {
        $post = $this->model->find($id);
        if($post){

        $data = $request->all();
        $result = $post->update($data);
        return redirect()->route('admin.post.index')->with(['success' => 'Success Edit!']);
        }
        return back()->withErrors(['msg' => 'Save Error']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->model->find($id);
        if($result){
            $result->delete();
            return redirect()->route('admin.post.index');
        }
        return back();
    }
}
