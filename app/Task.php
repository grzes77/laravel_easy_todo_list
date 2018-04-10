<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [ 'to_do', 'user_id','unique_code'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
