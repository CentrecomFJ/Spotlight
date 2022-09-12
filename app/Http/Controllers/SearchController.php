<?php

namespace App\Http\Controllers;

use App\Helpers\Search;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $data = $request->all();
        $search = new Search($data['keywords']);
        $search_results = $search->fetch();
        
        return view('search.show')->with(array('articles' => $search_results, 'keywords' => $data['keywords']));;
    }

    public function select_search(Request $request)
    {
    	$search_results = [];
        if($request->has('q')){
            $keywords = $request->q;
            $search = new Search($keywords);

            $search_results = $search->selectfetch();
        }
        
        return response()->json($search_results);
    }

    // public function index()
    // {
    // $content = $data['content'];
    // $indexing = new Indexing($content);

    // $data['content'] = $indexing->metaphone;
    // return response()->json(['success' => 'Ajax request submitted successfully', 'data' => $data]);
    // dd($this->test);
    // }   

    // public function show(Request $request)
    // {
    //     $articles = session()->get('_sresults');
    //     $keywords = session()->get('keywords');

    //     if(is_null($articles) && is_null($keywords)){
    //         dd($articles = $request->session()->get('sess_articles'));
    //         $keywords = $request->session()->get('sess_keywords');
    //     }else{
    //         $request->session()->put('sess_articles', $articles);
    //         $request->session()->put('sess_keywords', $keywords);
    //     }

    //     return view('search.show')->with(array('articles' => $articles, 'keywords' => $keywords));;
    // }
}
