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
        $comments = EventComment::select('event_id', 'description')->get();

        return response()->json($comments);



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

    public function show($eventId)
    {
        $comments = EventComment::where('event_id', $eventId)
            ->select('description', 'user_id')
            ->get();
        if ($comments->isEmpty()) {
            return response()->json(['message' => 'No comments found for this event.'], 404);
        }

        return response()->json($comments);
    }

    public function destroy($id)
    {
        $comment = EventComment::findOrFail($id);

        // Check if the authenticated user is the owner of the comment
        if ($comment->user_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $comment->delete();

        return response()->json(['message' => 'Comment deleted successfully']);
    }

}
