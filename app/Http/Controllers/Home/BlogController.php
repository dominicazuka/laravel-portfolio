<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Image;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Models\MultiImage;

class BlogController extends Controller
{
    public function AllBlog()
    {
        $blogs = Blog::latest()->get();
        return view('admin.blogs.blogs_all', compact('blogs'));
    } //end method

    public function AddBlog()
    {
        $categories = BlogCategory::orderBy('blog_category', 'ASC')->get(); //get data from blog Category model by name in ascending order
        return view('admin.blogs.blogs_add', compact('categories'));
    } //end method

    public function StoreBlog(Request $request)
    {
        $request->validate([
            'blog_category_id' => 'required',
            'blog_title' => 'required',
            'blog_tags' => 'required',
            'blog_description' => 'required',
            'blog_image' => 'required',
        ], [
            'blog_category_id.required' => 'Blog name is required',
            'blog_title.required' => 'Blog title is required',
            'blog_tags.required' => 'Blog tag is required',
            'blog_description.required' => 'Blog description is required',
            'blog_image.required' => 'Blog image is required',
        ]);
        $image = $request->file('blog_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); //generate random name
        Image::make($image)->resize(430, 327)->save('upload/blog/' . $name_gen);
        $save_url = 'upload/blog/' . $name_gen;
        Blog::insert([
            'blog_category_id' => $request->blog_category_id,
            'blog_title' => $request->blog_title,
            'blog_tags' => $request->blog_tags,
            'blog_description' => $request->blog_description,
            'blog_image' => $save_url,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Blog Post Data Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.blog')->with($notification);
    } //end method

    public function EditBlog($id)
    {
        $blog = Blog::findOrFail($id);
        $category = BlogCategory::orderBy('blog_category', 'ASC')->get(); //get data from blog Category model by name in ascending order
        return view('admin.blogs.blogs_edit', compact('blog', 'category'));
    } //end method

    public function UpdateBlog(Request $request)
    {
        $request->validate([
            'blog_category_id' => 'required',
            'blog_title' => 'required',
            'blog_tags' => 'required',
            'blog_description' => 'required',
        ], [
            'blog_category_id.required' => 'Blog name is required',
            'blog_title.required' => 'Blog title is required',
            'blog_tags.required' => 'Blog tag is required',
            'blog_description.required' => 'Blog description is required',
        ]);
        $blog = Blog::findOrFail($request->id); //retrieve existing blog data
        if ($request->file('blog_image')) {
            $image = $request->file('blog_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(430, 327)->save('upload/blog/' . $name_gen);
            $save_url = 'upload/blog/' . $name_gen;

            //delete the existing image on localhost
            if (file_exists($blog->blog_image)) {
                unlink($blog->blog_image);
            }

            //update the blog post with the new data
            $blog->update([
                'blog_category_id' => $request->blog_category_id,
                'blog_title' => $request->blog_title,
                'blog_tags' => $request->blog_tags,
                'blog_description' => $request->blog_description,
                'blog_image' => $save_url,
                'updated_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Blog Post Updated with Image Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('all.blog')->with($notification);
        } else {
            $blog->update([
                'blog_category_id' => $request->blog_category_id,
                'blog_title' => $request->blog_title,
                'blog_tags' => $request->blog_tags,
                'blog_description' => $request->blog_description,
                'updated_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Blog Post Updated without Image Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('all.blog')->with($notification);
        }
    } // end method

    public function DeleteBlog($id)
    {
        //delete image on localhost
        $blog = Blog::findOrFail($id);
        $img = $blog->blog_image;
        unlink($img); //delete from local storage
        //delete data by id in DB
        Blog::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Blog Post Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } //end method

    public function BlogDetails($id)
    {
        $blog = Blog::findOrFail($id);
        $allBlogs = Blog::latest()->limit(5)->get();
        $categories = BlogCategory::orderBy('blog_category', 'ASC')->get(); //get data from blog Category model by name in ascending order
        $icons = MultiImage::all();
        return view('frontend.blog_details', compact('blog', 'allBlogs', 'categories', 'icons'));
    } //end method

    public function CategoryBlog($id)
    {
        $blogPost = Blog::where('blog_category_id', $id)->orderBy('id', 'DESC')->get();
        $allBlogs = Blog::latest()->limit(5)->get();
        $categories = BlogCategory::orderBy('blog_category', 'ASC')->get(); //get data from blog Category model by name in ascending order
        $categoryName = BlogCategory::findOrFail($id);
        $icons = MultiImage::all();
        // Log the data - equivalent to console.log() in js
        // \Log::info([
        //     'blogPost' => $blogPost,
        //     'allBlogs' => $allBlogs,
        //     'categories' => $categories,
        // ]);
        return view('frontend.cat_blog_details', compact('blogPost', 'allBlogs', 'categories', 'categoryName', 'icons'));
    } //end method

    public function HomeBlog()
    {
        $allBlogs = Blog::latest()->get();
        $categories = BlogCategory::orderBy('blog_category', 'ASC')->get(); //get data from blog Category model by name in ascending order
        $icons = MultiImage::all();
        return view('frontend.blog', compact('allBlogs', 'categories', 'icons'));
    }
}
