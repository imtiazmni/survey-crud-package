<?php

namespace Imtiaz\SurveyPackage;

use Illuminate\Support\ServiceProvider;
use Imtiaz\SurveyPackage\Console\InstallCommand;

class SurveyServiceProvider extends ServiceProvider
{
    public function register()
    {
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
            ]);
        }
    }
}