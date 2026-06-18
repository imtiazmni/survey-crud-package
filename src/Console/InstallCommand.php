<?php

namespace Imtiaz\SurveyPackage\Console;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    protected $signature = 'survey:install';

    protected $description = 'Install Survey Package';

    public function handle()
    {
        $this->info('Survey Package Installed Successfully');

        return self::SUCCESS;
    }
}