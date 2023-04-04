<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class genrateData extends Model
{
    use HasFactory;

    protected $table = 'generate_data';

    protected $fillable = [
        'id',
        'email',
        'title',
        'description',
        'created_at',
        'updated_at',
    ];

    protected $hidden = [];


    public function getCreatedAtAttribute( $value ) {
        return Carbon::parse($value)->format('Y-m-d H:i:s');
    }
    public function getUpdatedAtAttribute( $value ) {
        return Carbon::parse($value)->format('Y-m-d H:i:s');
    }

}
