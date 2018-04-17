<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chapter;

class NovelController extends Controller
{
    public function list(Request $request){
      $chapters = Chapter::where('id','!=',0)->select('id','title')->get();
      return view('list')->withChapters($chapters);
    }

    public function detail(Request $request, Chapter $chapter){
      $preId = Chapter::where('id','<',$chapter->id)->max('id');
      $nextId = Chapter::where('id','>',$chapter->id)->min('id');
      return view('detail')->withChapter($chapter)->withPre($preId)->withNext($nextId);
    }
}
