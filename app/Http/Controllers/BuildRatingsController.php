<?php

namespace App\Http\Controllers;

use App\Build;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuildRatingsController extends Controller
{
    public function store(Request $request, Build $build)
    {
        $this->validate($request, [
            'rating' => 'required|integer|min:1|max:5'
        ]);
        $build->ratings()->syncWithoutDetaching([Auth::id() => ['rating' => $request->get('rating')]]);
        return redirect()->back()->with("message", "Rated the build with a ".$request->get('rating'));
    }
}
