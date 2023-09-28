<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BlogCategoryController extends Controller
{
    public function AllBlogCategory()
    {
        $blog_category = BlogCategory::latest()->get();
        return view('admin.blog_category.blog_category_all', compact('blog_category'));
    } //end method

    public function AddBlogCategory()
    {
        return view('admin.blog_category.blog_category_add');
    } //end method

    public function StoreBlogCategory(Request $request)
    {
        $request->validate([
            'blog_category' => 'required',
        ], [
            'blog_category.required' => 'Blog category name is required',
        ]);
        BlogCategory::insert([
            'blog_category' => $request->blog_category,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Blog Category Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.blog.category')->with($notification);
    } //end method
}
