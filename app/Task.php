<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// ask.php には　$fillable の設定が必要です

class Task extends Model
{
    protected $fillable = ['content', 'user_id', 'status'];
}