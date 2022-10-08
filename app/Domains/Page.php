<?php
namespace App\Domains;

use App\Models\Page as PageModel;
use App\Traits\PageTableGenerator;
use App\Traits\PageRouteGenerator;
use App\Traits\PageSideBarGenerator;



use Error;

class Page 
{
  use PageTableGenerator;
  use PageRouteGenerator;
  use PageSideBarGenerator;

  private $id;
  private $name;
  private $func_name;
  private $type;
  private $image;
  private $pageTabel;

  public function __construct(){
    $this->pageTabel = new PageModel;
  }


  public function add(){
    if(!$this->isTableExist()){
      $this->pageTabel->name = $this->name;
      $this->pageTabel->func_name = $this->func_name;
      $this->pageTabel->type = $this->type;
      $this->pageTabel->image = $this->image;
      $this->pageTabel->save();
      $this->createTable();
      $this->updateRoute();
      $this->updateSideBar();
    }

  }

  public function get($where = []){
    $this->pageTabel = $this->pageTabel::where($where)->first();

    $this->name      = $this->pageTabel->name;
    $this->func_name = $this->pageTabel->func_name;
    $this->type      = $this->pageTabel->type;
    $this->image     = $this->pageTabel->image;
    $this->id        = $this->pageTabel->id;

    $this->setMigration($this->type, $this->func_name);

    return [
      'id'   =>  $this->id,
      'name' =>  $this->name,
      'type' =>  $this->type,
    ];
  }

  public function set($name = null, $type = null, $image = null){
    if($this->pageTabel->exists) throw new Error('Cant set data');

    $this->name      = $name ? $name : null;
    $this->func_name = $this->name ? strtolower(str_replace(' ','_',$this->name)) : null ;
    $this->type      = $type ? $type : null;
    $this->image     = $image ? $image : null;

    $this->setMigration($this->type, $this->func_name);

  }

  public function update(){

    $this->pageTabel->name = $this->name;
    $this->pageTabel->save();
    $this->updateSideBar();

  }


  public function delete($where = []){
    if(count($where) >= 1 ) {
      $this->get($where);
      $this->pageTabel->delete();
    }

    if($this->isTableExist()){
      $this->dropTable();
    }

    $this->pageTabel->delete();
    $this->updateSideBar();


  }
  

  public function setName($name){
    $this->name = $name;
  }

  public function getList($column = ['*'], $where = []){
    $query = $this->pageTabel;
    
    if(count($where) >= 1 ) {
      $query = $query::where($where);
    }

    return $query->get($column)->toArray();
  }

  public function updateRoute(){
    $pageList = $this->getList(['func_name', 'type']);
    $this->routeGenerate($pageList);
  }

  public function updateSideBar(){
    $pageList = $this->getList(['func_name', 'name']);
    $this->generateSidebar($pageList);
  }

}
