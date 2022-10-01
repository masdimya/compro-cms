<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Domains\Page;

class PageSettingController extends Controller
{
    public function get(){
        $page = new Page();
        $pageName = $page->getList(['name']);
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
