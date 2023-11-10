<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comment = Comment::orderBy('created_at')->get();
        return view('comments.index',['comments' => $comment]);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('comments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $comment = new Comment();
        $comment->incident_id = $request->input('incident_id');
        $comment->text = $request->input('content');
        $comment->user_id = Auth::id();
        $comment->save();
        return redirect()->route('incidents.show', ['incident' => $comment->incident_id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        return view('comments.show',['comment'=>$comment]);
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        return view('comments.edit',['comment'=>$comment]);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        $comment->text = $request->new_text;
        $comment->save();
        return redirect()->route('incidents.show', ['incident' => $comment->incident_id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('incidents.show', ['incident' => $comment->incident_id]);
    }
}
