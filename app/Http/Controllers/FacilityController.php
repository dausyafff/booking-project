<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Http\Request;
use PhpParser\Builder\Function_;

class FacilityController extends Controller
{
    public function index()
    {
        $facilities = Facility::all();
        return view('facilities.index', compact('facilities'));
    }

    public function show($slug)
    {
        $facility = Facility::where('slug', $slug)->firstOrFail();
        return view('facilities.show', compact('facility'));
    }
}
