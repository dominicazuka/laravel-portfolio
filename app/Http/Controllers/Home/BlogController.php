<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Image;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function AllBlog()
    {
        $blogs = Blog::latest()->get();
        return view('admin.blogs.blogs_all', compact('blogs'));
    } //end method

    public function AddBlog()
    {
        return view('admin.blogs.blogs_add');
    } //end method
}
