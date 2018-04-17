<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DiDom\Document;
use DiDom\Query;
use App\Url;
use App\Chapter;

class Novel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'novel:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // $document = new Document('http://www.26ksw.com/txt/7/7415/',true);
        // $urls = $document->find('dd');
        // foreach($urls as $url){
        //     $list = new Url;
        //     $list->url = 'http://www.26ksw.com' . $url->find('a')[0]->attr('href');
        //     $list->title = $url->text();
        //     $list->save();
        // }

        $urls = Url::orderBy('id','asc')->where('completed',0)->limit(10)->get();
        foreach($urls as $url){
            $document = new Document($url['url'], true);
            $chapter = new Chapter;
            $chapter->title = $url['title'];
            $chapter->content = $document->find('#BookText')[0]->html();
            $chapter->save();
            $url->completed = 1;
            $url->save();
            usleep(600000);
        }
    }
}
