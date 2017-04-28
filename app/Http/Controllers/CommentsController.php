<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Ticket;
use App\Comment;
use App\Mailers\AppMailer;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function postComment(Request $request,Appmailer $mailer){
        $this->validate ($request, [
            'comment' => 'required'
        ]);
        $comment = Comment::create([
            'ticket_id' => $request->input('ticket_id'),
            'user_id' => Auth::user()->id,
            'comment' => $request->input('comment')
        ]);
        //send mail if comment is not from ticket user 
        if( $comment->ticket->user_id != Auth::user()->id){
            $mailer->sendTicketComments($comment->ticket->user, Auth::user(), $comment->ticket, $comment);
        }
        return redirect()->back()->with('status','Your comment has been submitted');
    }
}
