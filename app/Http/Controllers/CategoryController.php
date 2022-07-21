<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(){
        $categories = Category::query()->orderBy('id', 'desc')->paginate(Category::CATEGORIES_PER_PAGE);
        $title = 'Categories';
        return view('category.index', compact('categories', 'title'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public  function create(){
        $title = "Create New Category";
        return view('category.new', compact('title'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request){
        $attrs = $request->validate((new CategoryRequest)->rules());
        Category::create($attrs);
        $msg = 'Category has been created';
        return redirect(route('categories.index'))->with('success', $msg);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id){
        $category = Category::findOrFail($id);
        $title = "Edit Category '{$category->title}'";
        return view('category.edit', compact('category', 'title'));
    }

    /**
     * @param Request $request
     * @param $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $category){
        $category = Category::findOrFail($category);
        $attrs = $request->validate((new CategoryRequest)->rules());
        $category->update($attrs);
        $msg = 'Category "'. $category->title .'" has been changed';
        return redirect(route('categories.index'))->with('success', $msg);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id){
        Category::findOrFail($id)->delete();
        $msg = 'Category id:' . $id . ' has been deleted';
        return redirect(route('categories.index'))->with('success', $msg);
    }
}

