<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    //as it is static can can use without instance
    public static array $experience = ['Entry','Junior','Senior'];
    public static array  $category = ['IT','Finance','Sales','Marketing'];
}
