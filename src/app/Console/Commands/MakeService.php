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
    protected $signature = 'make:service {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new service class';

    /**
     * Execute the console command.
     */
    public function handle()
    {
         $name = $this->argument('name');

        $path = app_path("Services/{$name}.php");

        if (File::exists($path)) {
            $this->error("Service already exists");
            return;
        }

        if (!File::isDirectory(app_path('Services'))) {
            File::makeDirectory(app_path('Services'), 0755, true);
        }

        $content = "<?php

namespace App\Services;

class {$name}
{
    public function __construct()
    {
        //
    }
}
";

        File::put($path, $content);

        $this->info("Service {$name} created successfully.");
    }
}
