<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\EventComment\StoreEventCommentRequest;
use App\Http\Requests\api\EventComment\UpdateEventCommentRequest;
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

    public function update(UpdateEventCommentRequest $request, $id)
    {
        $comment = EventComment::findOrFail($id);

        // Check if the authenticated user is the owner of the comment
        if ($comment->user_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $comment->update($request->only('description'));

        return response()->json($comment);

    }
    public function delete(Request $request , string $id)
    {

    }
}
