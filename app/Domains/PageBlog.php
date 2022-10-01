<?php

namespace App\Domains;

use App\Interfaces\PageInterface;
use App\Models\Blog;
class PageBlog extends PageContent implements PageInterface
{

  public function __construct($tableName)
  {
    $blogModel = new Blog();
    $blogModel->setTable($tableName);
    $this->model = $blogModel;
  }

  public function createPost($data){
    $this->model->create([
      "title"       => $data->title,
      "slug"        => strtolower(str_replace(' ','_',$data->title)),
      "description" => $data->description,
      "image"       => $data->image,
      "author"      => $data->author,
      "created_by"  => $data->created_by,
     ]);
  }

  public function updatePost($postId,$data){
    $this->model->where('id', $postId)->update([
      "title"       => $data->title,
      "description" => $data->description,
      "image"       => $data->image,
     ]);
  }


}
