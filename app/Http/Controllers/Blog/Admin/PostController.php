<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Requests\BlogPostCreateRequest;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use App\Repositories\BlogPostRepository;
use App\Repositories\BlogCategoryRepository;
use App\Http\Requests\BlogPostUpdateRequest;

class PostController extends BaseController
{

    private $blogPostRepository;
    private $blogCategoryRepository;

    public function __construct()
    {
        parent::__construct();
        $this->blogPostRepository = app(BlogPostRepository::class);
        $this->blogCategoryRepository = app(BlogCategoryRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = $this->blogPostRepository->getAllWithPaginate(10);

        return view('blog.admin.posts.index',compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item         = new BlogPost();
        $categoryList = $this->blogCategoryRepository->getForComboBox();

        return view('blog.admin.posts.edit',compact('item','categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogPostCreateRequest $request)
    {
        $data = $request->input();

        $item = new BlogPost($data);
        $item->save();

        if($item){
            return redirect()->route('blog.admin.posts.edit',$item->id)->with(['success' => 'Успешно сохранено']);
        }else{
            return back()->withErrors(['msg' => "Ошибка сохранения"])->withInput();
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item         = $this->blogPostRepository->getEdit($id);
        $categoryList = $this->blogCategoryRepository->getForComboBox();

        return view('blog.admin.posts.edit',compact('item','categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogPostUpdateRequest $request, $id)
    {
        $item = $this->blogPostRepository->getEdit($id);

        if(empty($item))
            return back()->withErrors(['msg' => "Запись {$id} не найдена"])->withInput();

        $data   = $request->all();
        $result = $item->update($data);

        if($result){
            return redirect()->route('blog.admin.posts.edit',$item->id)->with(['success' => 'Успешно сохранено']);
        }else{
            return back()->withErrors(['msg' => "Ошибка сохранения"])->withInput();
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
        $result = BlogPost::destroy($id);

        if($result){
            return redirect()->route('blog.admin.posts.index')->with(['success' => 'Запись удалена']);
        }else{
            return back()->withErrors(['msg' => "Ошибка удаления"])->withInput();
        }
    }
}
