<?php
namespace App\Domains;

use App\Interfaces\PageInterface;
use App\Models\Content;
class PageContent implements PageInterface
{
  
  protected $model;

  public function __construct($tableName)
  {
    $contentModel = new Content;
    $contentModel->setTable($tableName);
    $this->model = $contentModel;
  }

  public function createPost($data){
    $this->model->create($data);
  }
  public function updatePost($postId,$data){
    $this->model->where('id', $postId)->update($data);
  }
  public function detailPost($postId){
    return $this->model->where('id', $postId)->first();
  }
  public function deletePost($postId){
    return $this->model->where('id', $postId)->delete();
  }
  public function getListPost(){
    return $this->model->get();
  }


}
