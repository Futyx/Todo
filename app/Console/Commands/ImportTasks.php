<?php

namespace App\Console\Commands;

use App\Models\Todo;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class ImportTasks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-tasks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $retort= Http::get('https://mocki.io/v1/afef2a14-a19c-48dd-8fa3-16f2c1a80134');

        $array=$retort->json();

        foreach($array as $todo)
        {
            Todo::create([

                'title' =>$todo['title'],
                'slug' => Str::slug($todo['title']),
                'description' =>$todo['description'],
                'dueDate' =>$todo['dueDate'],
                'priority' =>$todo['priority'],
                'completed' =>$todo['completed'],
            ]);



        }

        $this->info('success');
        
    }
}
