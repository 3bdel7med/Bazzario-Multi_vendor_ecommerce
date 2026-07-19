<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MakeCRUD extends Command
{
    // The name and signature of the console command
    // We expect the argument to be the Model name (e.g., Product)
    protected $signature = 'make:crud {name}';

    // The console command description
    protected $description = 'Create a Model, Migration, Resource Controller, and add lines to web.php';

    public function handle()
    {
        $name = ucfirst($this->argument('name'));

        if (!$name) {
            $this->error('Please provide a name for the CRUD!');
            return;
        }

        $this->info("🚀 Starting generation for {$name} CRUD...");

        // 1. Create Model, Migration, and Resource Controller
        // -m: migration, -c: controller, -r: resource methods
        $this->call('make:model', [
            'name' => $name,
            '-m' => true,
            '-c' => true,
            '-r' => true,
            '--force' => true, // Force overwrite if files already exist

        ]);

        // 2. Automatically register the route in web.php
        $this->addRoute($name);

        $this->info("✨ CRUD for {$name} created successfully!");
    }

    protected function addRoute($name)
    {
        $routePath = base_path('routes/web.php');

        // Convert model name to plural lowercase for the URL (e.g., Product -> products)
        $routeUri = Str::plural(strtolower($name));
        $controllerName = "{$name}Controller";

        // The route line we want to append
        $routeLine = "\nRoute::resource('{$routeUri}', \\App\Http\Controllers\\{$controllerName}::class);";

        // Read the current web.php file
        $currentContent = File::get($routePath);

        // Check if the route already exists to avoid duplicates
        if (str_contains($currentContent, "Route::resource('{$routeUri}'")) {
            $this->warn("⚠️ Route for {$routeUri} already exists in web.php.");
            return;
        }

        // Append the new route line to the end of the file
        File::append($routePath, $routeLine);
        $this->info("🛣️ Appended route to routes/web.php: Route::resource('{$routeUri}', ...)");
    }
}
