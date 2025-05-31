<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Query\Builder as QueryBuilder;

class JobListing extends Model
{
     use HasFactory;

     protected $table = 'job_listings';

     public static array $experience = ['entry', 'intermediate', 'senior'];

     public static array $categories = ['IT', 'Marketing', 'Finance', 'Sales'];

     public function employer(): BelongsTo {
        return $this->belongsTo(Employer::class);
     }

     public function jobApplications(): HasMany {
        return $this->hasMany(JobApplication::class);
     }

     public function scopeFilter(Builder|QueryBuilder $query, array $filters): Builder|QueryBuilder {

        return $query->when($filters['search'] ?? null, function($query, $search) use ($filters) {
            $query->where(function($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%')
                    ->orWhereHas('employer', function($query) use ($search) {
                        $query->where('company_name', 'like', '%' . $search . '%');
                    });

            });
                })->when($filters['min_salary'] ?? null, function($query, $minSalary) use ($filters) {
                    $query->where('salary', '>=', $minSalary);
                })->when($filters['max_salary'] ?? null, function($query, $maxSalary) use ($filters) {
                    $query->where('salary', '<=', $maxSalary);
                })->when($filters['experience'] ?? null, function($query, $experience) use ($filters) {
                    $query->where('experience', $experience);
                })->when($filters['category'] ?? null, function($query, $category) use ($filters) {
                    $query->where('category', $category);
                });
     }
}
