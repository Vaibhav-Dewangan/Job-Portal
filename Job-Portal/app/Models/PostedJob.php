<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostedJob extends Model
{
    //
    protected $fillable = [
        'job_title',
        'company_name',
        'location',
        'min_salary',
        'max_salary',
        'contract_length',
        'experience',
        'job_type',
        'schedule',
        'description',
        'responsibilities',
        'qualifications',
        'industry_sector',
        'skills',
        'employer_id',
    ];

    protected $casts = [
        'min_salary' => 'integer',
        'max_salary' => 'integer',
        'schedule' => 'array',
    ];

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function applications()
    {
        return $this->hasMany(JobApplication::class);
    }

    public function savedByUsers()
    {
        return $this->hasMany(SavedJob::class, 'posted_job_id');
    }
}
