<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeService extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // protected $signature = 'app:make-service';

    /**
     * The console command description.
     *
     * @var string
     */
    // protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    protected $signature = 'make:service {name}';
    protected $description = 'Create a new service class';

    public function handle()
    {
        $name = $this->argument('name');
        $servicePath = app_path('Services/' . $name . '.php');

        if (File::exists($servicePath)) {
            $this->error('Service already exists!');
            return;
        }

        File::put($servicePath, $this->generateServiceContent($name));
        $this->info('Service created successfully: ' . $name);
    }

    protected function generateServiceContent($name)
    {
        // Define the content for your service class here.
        return "<?php\n\nnamespace App\Services;\n\nclass {$name}\n{\n    // Your service logic here\n}\n";
    }
}
