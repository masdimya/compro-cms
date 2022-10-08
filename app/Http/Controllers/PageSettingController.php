<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Domains\Page;

class PageSettingController extends Controller
{
    private $page;

    public function __construct(){
        $this->page = new Page();
    }
    
    public function index(){
        $pageList = $this->page->getList(['id','name','type']);

        return view('admin.pages.page-setting',[
            "preTitle" => "Page Setting",
            "title"    => "List Page",
            "pageList" => $pageList
        ]);
    }
    
    public function get(){
        $pageName = $this->page->getList(['name']);
        return $pageName;
    }

    
    public function create(Request $request){
        $page = new Page();
        $page->set($request->name, $request->type);
        $page->add();
        return 'created';
    }


    public function edit($id, Request $request){
        $page = new Page();
        $page->get([
            'id' => $id
        ]);
        
        $page->setName($request->name);
        $page->update();

        return 'updated';
    }

    public function delete($id){
        $page = new Page();
        $page->delete([
            'id' => $id
        ]);

        return 'deleted';
    }
}
