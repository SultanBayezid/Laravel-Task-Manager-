<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public function taskUser()
    {
        return $this->belongsTo(User::class, 'user_id');
     
    }
    public function taskDeveloper()
    {
        return $this->belongsTo(User::class, 'developer_id');
     
    }
    public function taskCategory()
    {
        return $this->belongsTo(Category::class, 'category_id');
     
    }
}
