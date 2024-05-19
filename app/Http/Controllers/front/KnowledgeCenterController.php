<?php

namespace App\Http\Controllers\front;

use App\Models\Knowledge;
use Illuminate\Http\Request;
use App\Models\KnowledgeCategory;
use App\Http\Controllers\Controller;

class KnowledgeCenterController extends Controller
{
    public function index(){
        $categories = KnowledgeCategory::paginate(6);
        $knowledge_center  = Knowledge::paginate(6);
        $last_knowledge_center  = Knowledge::latest()->get();
        // dd(categories);
        return view('front.knowledge_center' , compact(['categories' , 'knowledge_center' , 'last_knowledge_center']));
    }
}
