<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    /** @use HasFactory<\Database\Factories\JobFactory> */
    use HasFactory;

    protected $table = 'job_listings';

    public static array $experience = ['entry', 'intermediate', 'senior'];

    public static array $categories = ['IT', 'Marketing', 'Finance', 'Sales'];
}
