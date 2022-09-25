<?php

namespace App\Traits;
use Database\templates\PageBlogTable;

trait PageTableGenerator
{
  private $migration;
  private $type;
  private $tableExist;

  
  public function setMigration($type, $tableName){
    $this->type = $type;

    switch ($type) {
      case 'blog':
        $this->migration = new PageBlogTable($tableName);
        break;
      default:
        break;
    }

    $this->tableExist = $this->migration->isTableExist();
  }

  public function setTableName($tableName){
    $this->migration->setTableName($tableName);
  }

  public function createTable(){
    $this->migration->up();
  }

  public function dropTable(){
    $this->migration->down();
  }

  public function isTableExist(){
    return $this->tableExist;
  }
} 
