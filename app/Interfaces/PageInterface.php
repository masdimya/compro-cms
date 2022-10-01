<?php

namespace App\Interfaces;

interface PageInterface{
  public function createPost($data);
  public function updatePost($id,$data);
  public function detailPost($id);
  public function deletePost($id);
  public function getListPost();
}