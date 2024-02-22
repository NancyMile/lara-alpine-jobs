<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class JobTagController extends Controller
{
    public function index($tag)
    {
        $tag = Tag::findOrFail($tag);
        return view("jobs.index",['jobs' => $tag->jobs]);
    }
}
