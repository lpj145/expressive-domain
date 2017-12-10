<?php
namespace ApiBase\Domains\Consumers\Migration;

use ExpressiveMigrations\Migrations\BaseMigrations;
use Jenssegers\Mongodb\Schema\Blueprint;

class CreateTableConsumers extends BaseMigrations
{
    protected $tableName = 'consumers';

    /**
     * @param $table Blueprint
     */
    protected function up($table)
    {
        $table->string('key');
        $table->string('name');
        $table->string('identifier');
        $table->boolean('active');
        $table->unique('key');
        $table->unique('identifier');
        $table->primary('key');
    }

    protected function down($table)
    {
        return;
    }
}
