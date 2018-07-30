<?php

namespace JaronSteenson\App;

use Illuminate\Database\Capsule\Manager as Capsule;

class AppBootstrap
{

    const DATABASE_CONFIG_FILE_PATH = __DIR__ . '/../../config/database.json';

    public function bootApp()
    {
        $this->bootEloquentORM();
    }

    private function bootEloquentORM()
    {
        $capsule = new Capsule;
        $capsule->addConnection($this->getDatabaseConfig());
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }

    private function getDatabaseConfig()
    {
        $jsonConfig = file_get_contents(static::DATABASE_CONFIG_FILE_PATH);
        return json_decode($jsonConfig, true);
    }

}