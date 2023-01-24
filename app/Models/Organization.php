<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Orchid\Support\Facades\Dashboard;

class Organization extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'is_active',
        'owner_id',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [

    ];

    /**
     * The attributes for which you can use filters in url.
     *
     * @var array
     */
    protected $allowedFilters = [

    ];

    /**
     * The attributes for which can use sort in url.
     *
     * @var array
     */
    protected $allowedSorts = [

    ];

    public static function boot()
    {
        parent::boot();

        self::creating(function($model) {
            if ($model->slug === null) {
                $model->slug = Str::slug($model->name, "_");
            }
        });
    }
    public static function createOrganization(string $name)
    {

        static::create([
            'name'        => $name,
            'is_active'   => true,
        ]);
    }
}
