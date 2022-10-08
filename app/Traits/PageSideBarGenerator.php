<?php

namespace App\Traits;

/**
 * 
 */
trait PageSideBarGenerator
{
  public function renderSidebar($pagesData){
    return view('admin.templates.sidebar-templates', [
      'pages' => $pagesData
    ])->render();
  }

  public function generateSidebar($pagesData){
    $template = $this->renderSidebar($pagesData);
    $openfile = fopen(config('app')['admin_sidebar_templates'], 'w');
    fwrite($openfile, $template);
    fclose($openfile);
  }
}
