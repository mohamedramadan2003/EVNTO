<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\EventComment\StoreEventCommentRequest;
use App\Models\Event\EventComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index()
    {

    }

    public function store(StoreEventCommentRequest $request)
    {
        $comment = EventComment::create([
            'description' => $request->description,
            'user_id' => Auth::id(),
            'event_id' => $request->event_id,
        ]);

        return response()->json($comment, 201);
    }

    public function update(Request $request)
    {

    }
    public function delete(Request $request , string $id)
    {

    }
}
