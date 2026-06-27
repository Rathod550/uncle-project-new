<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ContactUs extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name', 'contact_number', 'email', 'contact_us_categories_id', 'message'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(ContactUsCategories::class, 'contact_us_categories_id', 'id');
    }

}
