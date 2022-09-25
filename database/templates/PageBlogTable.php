<?php
namespace Database\templates;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;



class PageBlogTable
{
    private $table;
    
    
    public function __construct($tableName)
    {
        $this->table = 'gen_'.$tableName;
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('title');
            $table->longText('description');
            $table->string('image');
            $table->string('author',100);
            $table->string('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->table);
    }

    public function setTableName($tableName){
        $this->table = $tableName;
    }

    public function isTableExist(){
        return Schema::hasTable($this->table);
    }
}
