<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $casts = ['id' => 'string'];
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'name',
        'created_at',
    ];

    public function domains()
    {
        return $this->hasMany(Domain::class, 'id', 'account_id');
    }
}
