<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Job extends Model
{
    use HasFactory;

    protected $fillable = ['title','location','salary','description','experience','category'] ;

    //as it is static can can use without instance
    public static array $experience = ['Entry','Junior','Senior'];
    public static array  $category = ['IT','Finance','Sales','Marketing'];


    public function scopeFilter(Builder | QueryBuilder $query, array $filters) : Builder|QueryBuilder
    {
        return $query->when($filters['search'] ?? null , function($query, $search){
            $query->where( function($query) use ($search){
                $query->where('title','like', '%'.$search.'%')
                    ->orWhere('description','like','%'.$search.'%')
                    ->orWhereHas('employer', function($query) use ($search){
                        $query->where('company_name','like','%'.$search.'%');
                    });
            });
        })->when($filters['min_salary'] ?? null, fn($query, $minSalary) => $query->where('salary','>=', $minSalary)
            )->when($filters['max_salary'] ?? null, fn($query, $maxSalary) => $query->where('salary', '<=', $maxSalary))
            ->when($filters['experience'] ?? null, fn($query, $experience) => $query->where('experience', $experience))
            ->when($filters['category'] ?? null, fn($query, $category) => $query->where('category', $category));
    }

    public function employer() :BelongsTo
    {
        return $this->belongsTo(Employer::class);
    }

    public function jobApplications(): HasMany
    {
        return $this->hasMany(JobApplication::class);
    }

    //logical method
    public function hasUserApplied( Authenticatable|User|int $user): bool
    {
        return $this->where('id', $this->id)
            ->whereHas(
                'jobApplications',
                fn($query) => $query->where('user_id', '=', $user->id ?? $user)
            )->exists();
    }
}
