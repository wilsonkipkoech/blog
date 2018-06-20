<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{

	public function getIndex()
	{
		$posts =Post::paginate(10);

		return view('blog.index')->withPosts($posts);
	}
     public function getSingle($slugs)
     {
     	// fetch form DBbased on slugs
     	$post =Post::where('slugs', '=',$slugs)->first();

     	return view('blog.single')->withPost($post);
     }
}
