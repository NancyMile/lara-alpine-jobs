<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    //as it is static can can use without instance
    public static array $experience = ['Entry','Junior','Senior'];
    public static array  $category = ['IT','Finance','Sales','Marketing'];


    public function scopeFilter(Builder | QueryBuilder $query, array $filters) : Builder|QueryBuilder
    {
        return $query->when($filters['search'] ?? null , function($query, $search){
            $query->where( function($query) use ($search){
                $query->where('title','like', '%'.$search.'%')
                    ->orWhere('description','like','%'.$search.'%');
            });
        })->when($filters['min_salary'] ?? null, fn($query, $minSalary) => $query->where('salary','>=', $minSalary)
            )->when($filters['max_salary'] ?? null, fn($query, $maxSalary) => $query->where('salary', '<=', $maxSalary))
            ->when($filters['experience'] ?? null, fn($query, $experience) => $query->where('experience', $experience))
            ->when($filters['category'] ?? null, fn($query, $category) => $query->where('category', $category));
    }
}
