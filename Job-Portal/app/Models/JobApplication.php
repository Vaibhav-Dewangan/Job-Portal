<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobApplication extends Model
{

    use HasFactory;

    protected $table = 'applications';
    protected $fillable = [
        'user_id',
        'posted_job_id',
        'cover_letter',
        'resume',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function job()
    {
        return $this->belongsTo(PostedJob::class, 'posted_job_id');
    }
}
