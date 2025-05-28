<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $userId = Auth::user()->id;
        $request['user_id'] = $userId;
        Review::create($request->all());
        return redirect()->back();
    }
    public function destroy(int $id)
    {
        $review = Review::find($id);
        $review->delete();
        return redirect()->back();
    }
}
