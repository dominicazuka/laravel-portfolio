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

    public function EditBlogCategory($id)
    {
        $blog_category = BlogCategory::findOrFail($id);
        return view('admin.blog_category.blog_category_edit', compact('blog_category'));
    } //end method

    public function UpdateBlogCategory(Request $request, $id)
    {
        $request->validate([
            'blog_category' => 'required',
        ], [
            'blog_category.required' => 'Blog category name is required',
        ]);
        BlogCategory::findOrFail($id)->update([
            'blog_category' => $request->blog_category,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Blog Category Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.blog.category')->with($notification);
    } //end method

    public function DeleteBlogCategory($id)
    {
        //delete data by id in DB
        BlogCategory::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Blog Category Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } //end method
}
