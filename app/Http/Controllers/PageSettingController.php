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

    
    public function create(){
        $page = new Page();
        $page->set('Visi Misi','blog');
        $page->add();
        return 'created';
    }


    public function edit(){
        $page = new Page();
        $page->get([
            'id' => 1
        ]);
        
        $page->setName('Visi & Misi');
        $page->update();

        return 'updated';
    }

    public function delete(){
        $page = new Page();
        $page->delete([
            'id' => 6
        ]);

        return 'deleted';
    }
}
