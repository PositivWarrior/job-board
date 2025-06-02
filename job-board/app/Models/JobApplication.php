<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobApplication extends Model
{
    /** @use HasFactory<\Database\Factories\JobApplicationFactory> */
    use HasFactory;

    protected $fillable = ['expected_salary', 'user_id', 'job_listing_id', 'cv_path'];

    public function job(): BelongsTo {
        return $this->belongsTo(JobListing::class, 'job_listing_id');
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
