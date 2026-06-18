<?php

namespace Imtiaz\SurveyPackage\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class InstallCommand extends Command
{
    protected $signature = 'survey:install';

    protected $description = 'Install Survey Package';

    public function handle()
    {
        $this->publishDirectory(
            __DIR__.'/../../stubs/Controllers',
            app_path('Http/Controllers')
        );

        $this->publishDirectory(
            __DIR__.'/../../stubs/Models',
            app_path('Models')
        );

        $migrationSource =
            __DIR__.'/../../stubs/Migrations/create_surveys_table.php';

        $timestamp = date('Y_m_d_His');

        $migrationDestination =
            database_path(
                'migrations/' .
                $timestamp .
                '_create_surveys_table.php'
            );

        copy(
            $migrationSource,
            $migrationDestination
        );

        $this->publishDirectory(
            __DIR__.'/../../stubs/Routes',
            base_path('routes')
        );

        $webRoutes = base_path('routes/web.php');
        $content = file_get_contents($webRoutes);

        $routeRequire = "\nrequire __DIR__.'/survey.php';\n";

        if (! str_contains($content, "require __DIR__.'/survey.php';")) {
            file_put_contents(
                $webRoutes,
                $content . $routeRequire
            );
        }

        $this->publishDirectory(
            __DIR__.'/../../stubs/Views',
            resource_path('views')
        );



        $this->info('Survey Package Installed Successfully');

        return self::SUCCESS;
    }

    protected function publishDirectory($source, $destination)
    {
        if (! File::exists($source)) {
            return;
        }

        foreach (File::allFiles($source) as $file) {

            $relativePath = $file->getRelativePathname();

            $target = $destination.'/'.$relativePath;

            File::ensureDirectoryExists(
                dirname($target)
            );

            File::copy(
                $file->getPathname(),
                $target
            );
        }
    }
}