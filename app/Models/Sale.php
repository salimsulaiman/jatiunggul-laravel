<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sale extends Model
{
    /** @use HasFactory<\Database\Factories\SaleFactory> */
    use HasFactory;
    protected $table = 'sales';
    protected $primaryKey = 'id';
    protected $guarded = [];

    protected $with = ['user', 'customer'];

    public function customer():BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
