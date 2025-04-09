<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employer extends Authenticatable
{
    use HasFactory, Notifiable;
    //
    protected $fillable = [
        'company_name',
        'name',
        'email',
        'user_type',
        'company_address',
        'industry_sector',
        'cover_image',
        'profile_image',
        'password',
        'company_website',
        'about'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function postedJobs()
    {
        return $this->hasMany(PostedJob::class);
    }
}
