<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Domains\PageContent;


class PageContentController extends Controller
{
    private $pageContent;

    public function __construct()
    {   
        $funcName  = str_replace('/','', Route::current()->action['prefix']);
        $tableName = 'gen_'.$funcName;

        $this->pageContent = new PageContent($tableName);
        
    }   

    public function index(){
       return $this->pageContent->getListPost();
    }

    public function store(Request $request){
       $this->pageContent->createPost($request);
       return 'success add';
    }

    public function get($id){
        return $this->pageContent->detailPost($id);
     }

    public function update($id, Request $request){
        $this->pageContent->updatePost($id,$request);
        return 'success update';

    }

    public function delete($id){
        $this->pageContent->deletePost($id);
        return 'success delete';

    }
}
