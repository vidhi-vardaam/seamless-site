<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Register all Blade components globally
        $this->registerBladeComponents();
    }

    /**
     * Register all Blade components from the components directory
     */
    protected function registerBladeComponents(): void
    {
        $componentsPath = resource_path('views/components');
        
        if (!is_dir($componentsPath)) {
            return;
        }

        // Register Section components
        $this->registerComponentsFromDirectory($componentsPath . '/Section', 'section');
        
        // Register UI components
        $this->registerComponentsFromDirectory($componentsPath . '/ui', 'ui');
    }

    /**
     * Register components from a specific directory
     */
    protected function registerComponentsFromDirectory(string $path, string $prefix): void
    {
        if (!is_dir($path)) {
            return;
        }

        $files = glob($path . '/*.blade.php');
        
        foreach ($files as $file) {
            $componentName = basename($file, '.blade.php');
            
            // Determine the view path based on the directory structure
            // For Section components: components.Section.{name}
            // For ui components: components.ui.{name}
            $dirName = basename($path);
            $viewPath = "components.{$dirName}.{$componentName}";
            
            // Register component with prefix (e.g., 'section-hero', 'ui-button')
            \Illuminate\Support\Facades\Blade::component($viewPath, $prefix . '-' . $componentName);
        }
    }
}
