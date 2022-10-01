<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Domains\PageBlog;
use App\Models\Blog;


class PageBlogController extends Controller
{
    private $pageBlog;

    public function __construct()
    {   
        $funcName  = str_replace('/','', Route::current()->action['prefix']);
        $tableName = 'gen_'.$funcName;

        $this->pageBlog = new PageBlog($tableName);
        
    }   

    public function index(){
       return $this->pageBlog->getListPost();
    }

    public function store(Request $request){
       $this->pageBlog->createPost($request);
       return 'success add';
    }

    public function get($id){
        return $this->pageBlog->detailPost($id);
     }

    public function update($id, Request $request){
        $this->pageBlog->updatePost($id,$request);
        return 'success update';

    }

    public function delete($id){
        $this->pageBlog->deletePost($id);
        return 'success delete';

    }
}
