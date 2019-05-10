<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
//use Categories;
use App\User;
use App\Post;
use App\Category;
// use App\Views\Composers\NavigationComposer;
// use Illuminate\View\View;


class BlogController extends Controller
{

    //	protected $limit =5;

    public function index()
    {

    	$posts = Post::with('author')
              					->latestFirst()
              					->paginate(8);

    	return view("blog.index", compact('posts'));
    }

    public function category(Category $category)
    {
        $categoryName = $category->title;

    	   $posts =  $category->posts()
                            ->with('author')
                            ->latestFirst()
        			              ->paginate(8);

    	return view("blog.index", compact('posts', 'categoryName'));
    }

    public function show(Post $post)
    {
      // update posts set view_count = view_count + 1 where id=?
      #1
      // $viewCount = $post->view_count + 1;
      // $post->update(['view_count' => $viewCount]);

      #2
      $post->increment('view_count');

    return view("blog.show", compact('post'));

    }

    public function author(User $author)
    {
      $authorName = $author->name;

       $posts =  $author->posts()
                        ->with('category')
                        ->latestFirst()
                        ->paginate(8);

    return view("blog.index", compact('posts', 'authorName'));

    }




}
