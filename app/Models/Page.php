<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    // Mass assignable fields
    protected $fillable = ['parent_id', 'slug', 'title', 'content'];

    /**
     * Relationship with the parent page.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(Page::class, 'parent_id');
    }

    /**
     * Relationship with child pages.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
{
    return $this->hasMany(Page::class, 'parent_id', 'id')->with('children');
}

}
