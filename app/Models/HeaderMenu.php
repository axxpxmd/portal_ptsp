<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HeaderMenu extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'header_menus';

    protected $fillable = [
        'parent_id',
        'label',
        'url',
        'route_name',
        'route_parameters',
        'target',
        'icon',
        'display_type',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'route_parameters' => 'array',
        'is_active' => 'boolean',
    ];

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id')->orderBy('sort_order');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
