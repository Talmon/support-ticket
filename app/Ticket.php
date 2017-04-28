<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use App\Category;
//use App\Comment;

class Ticket extends Model
{
    protected $fillable = [
        'user_id',
        'category_id',
        'ticket_id',
        'title',
        'priority',
        'message',
        'status'
    ];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function Comment(){
        return $this->hasMany(Comment::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
