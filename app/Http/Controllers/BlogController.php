<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests;
use Categories;


class BlogController extends Controller
{

    //	protected $limit =5;

    public function index()
    {
        $categories = Category::with('posts')->orderBy('title', 'asc')->get();

    	$posts = Post::with('author')
    					->latestFirst()
    					->paginate(8);

    	return view("blog.index", compact('posts', 'categories'));
    }

    public function category($id)
    {
        $categories = Category::with('posts')->orderBy('title', 'asc')->get();

    	$posts = Post::with('author')
                        ->latestFirst()
                        ->where('category_id', $id)
    			->paginate(8);

    	return view("blog.index", compact('posts', 'categories'));
    }

    public function show(Post $post)
    {
        //	$post = Post::findOrfail($id);
    	
    	//return view("blog.show", compact('post'));
        
        $categories = Category::with(['posts' => function($query) {
         $query->published();            
        }])->orderBy('title', 'asc')->get();
 
    return view("blog.show", compact('post', 'categories'));

    }

    



}
