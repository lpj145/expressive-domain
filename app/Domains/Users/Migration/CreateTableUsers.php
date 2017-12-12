<?php
namespace App\Domains\Users\Migration;

use ExpressiveMigrations\Migrations\BaseMigrations;
use Jenssegers\Mongodb\Schema\Blueprint;

class CreateTableUsers extends BaseMigrations
{

    protected $tableName = 'users';

    /**
     * @param $table Blueprint
     */
    protected function up($table)
    {
        $table->uuid('id');
        $table->string('name');
        $table->string('username');
        $table->string('password');
        $table->boolean('active');
        $table->rememberToken();
        $table->softDeletes();
        $table->uuid('id');
        $table->unique('username');
        $table->primary('username');
    }

    protected function down($table)
    {
        return;
    }

}
