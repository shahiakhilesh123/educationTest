<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use App\Models\State;
class StoryController extends Controller
{
    public function showStory($cat_name, $name)
    {
        //echo $blog_name = str_replace('-', ' ', $name);
        $blog = Blog::where('site_url', $name)->with('images')->first();
        $author =  User::where('id', $blog->author)->first();
        $category = Category::where('id', $blog->categories_ids)->first();
        $other_blog = Blog::where('id','!=', $blog->id)->with('thumbnail')->where('categories_ids', $blog->categories_ids)->with('images')->limit(6)->get()->all();
        $latests = Blog::where('id','!=', $blog->id)->whereNull('link')->with('thumbnail')->with('images')->orderBy('created_at', 'DESC')->limit(6)->get()->all();
        //$videos_latests = Blog::where('id','!=', $blog->id)->whereNotNull('link')->with('thumbnail')->with('images')->orderBy('id', 'DESC')->limit(6)->get()->all();
        return view('detail')->with('data', ['blog'=> $blog, 'relates'=> $other_blog, 'latests' => $latests, 'category' => $category, 'author' => $author]);
    }
    public function category($name)
    {
        $page = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $count = 10;
        $category = Category::where('site_url', $name)->first();
        $blog = Blog::where('categories_ids', $category->id)->where('status', 1)->with('images')->orderBy('created_at', 'DESC')->paginate($count);
        $blog->setPath(asset('/').$name);
        return view('category',['category'=> $category,'blogs' => $blog, 'page' => $page, 'count' => $count]);
    }
    public function privacy()
    {
        return view('privacy');
    }
    public function disclaimer()
    {
        return view('disclaimer');
    }
    public function contact()
    {
        return view('contact');
    }
    public function about()
    {
        return view('about');
    }
    public function search()
    {
        $page = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $search = isset($_REQUEST['search']) ? $_REQUEST['search'] : '';
        $count = 10;
        //$category = Category::where('site_url', $name)->first();
        $blog = Blog::where('name', 'like', '%' . $search . '%')->orWhere('tags', 'like', '%' . $search . '%')->where('status', 1)->with('images')->orderBy('created_at', 'DESC')->paginate($count);
        $blog->setPath(asset('/search').'?search='.$search);
        return view('search',['blogs' => $blog, 'search' => $search, 'page' => $page, 'count' => $count]);
    }
    public function author($name)
    {
        $page = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $count = 10;
        $name = str_replace('_', ' ', $name);
        $user  = User::where('url_name', $name)->first();
        $blog = Blog::where('author', $user->id)->where('status', 1)->with('images')->orderBy('created_at', 'DESC')->paginate($count);
        $blog->setPath(asset('/').$name);
        return view('author',['users'=> $user,'blogs' => $blog, 'page' => $page, 'count' => $count]);
    }
    public function state($name)
    {
        $page = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $count = 10;
        $name = str_replace('_', ' ', $name);
        $state  = State::where('name', $name)->first();
        $blog = Blog::where('state_ids', $state->id)->where('status', 1)->with('images')->orderBy('created_at', 'DESC')->paginate($count);
        $blog->setPath(asset('/').$name);
        return view('state',['state'=> $state,'blogs' => $blog, 'page' => $page, 'count' => $count]);
    }
}
