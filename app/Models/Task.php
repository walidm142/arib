<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['task', 'status', 'employee_id'];

    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id', 'id');
    }

    public function getStatusAsStringAttribute()
    {
        if ($this->status == 0)
            return "In active";
        return 'Active';
    }
}
