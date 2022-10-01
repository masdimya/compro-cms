<?php
namespace App\Traits;


trait PageRouteGenerator
{
  
  public function templates(){
    return
    <<<'FILE_CONTENTS'

    Route::group(['prefix'=>'PREFIX'], function(){
      Route::get('/'       , 'CONTROLLER_NAME@index');
      Route::get('/{id}'       , 'CONTROLLER_NAME@get');
      Route::post('/create' , 'CONTROLLER_NAME@store');
      Route::put('/{id}/edit'   , 'CONTROLLER_NAME@update');
      Route::delete('/{id}/delete' , 'CONTROLLER_NAME@delete');
    });

    FILE_CONTENTS;

  }

  public function baseTemplates(){
    return
      <<<'FILE_CONTENTS'
      <?php

      use Illuminate\Support\Facades\Route;


      FILE_CONTENTS;

  }

  public function routeItemGenerate($func_name, $type){
    $controllerName = $this->getControllerName($type);

    $template = $this->templates();
    $template = str_replace('PREFIX',$func_name,  $template);
    $template = str_replace('CONTROLLER_NAME', $controllerName,  $template);

    return $template;
  }

  public function getControllerName($type){
    switch ($type) {
      case 'blog':
        return 'PageBlogController';
      case 'gallery':
      case 'content':
      default:
        return 'PageContentController';
    }
  }

  public function write($template){
    $openfile = fopen(config('app')['dynamic_routes_path'], 'w');
    fwrite($openfile, $template);
    fclose($openfile);
  }

  public function routeGenerate(Array $pages){
    $baseTemplates = $this->baseTemplates();

    foreach ($pages as $page) {
      $routesTemplate = $this->routeItemGenerate($page['func_name'], $page['type']);
      $baseTemplates .= $routesTemplate;
    }

    $this->write($baseTemplates);
  }

}
