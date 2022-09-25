<?php

namespace App\Models;

trait Generator
{

    public function setTable($tableName){
        $this->table = $tableName;
    }

}
