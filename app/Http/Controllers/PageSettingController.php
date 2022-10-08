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
    
    public function create(){
        return view('admin.pages.page-create',[
            "preTitle" => "Page Setting",
            "title"    => "Add Page",
        ]);
    }

    public function store(Request $request){
        $page = new Page();
        $page->set($request->name, $request->type);
        $page->add();
        return redirect(route('page_setting'));
    }


    public function edit($id, Request $request){
        $page = new Page();
        $data = $page->get([
            'id' => $id
        ]);

        return view('admin.pages.page-edit',[
            "preTitle" => "Page Setting",
            "title"    => "Edit Page",
            "id"       => $data["id"],
            "name"     => $data["name"],
        ]);
       
    }

    public function update($id, Request $request){
        $page = new Page();
        $page->get([
            'id' => $id
        ]);
        
        $page->setName($request->name);
        $page->update();

        return redirect(route('page_setting'));
    }

    public function delete($id){
        $page = new Page();
        $page->delete([
            'id' => $id
        ]);

        return redirect(route('page_setting'));
    }
}
