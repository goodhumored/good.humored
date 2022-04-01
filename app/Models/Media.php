<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    
    /**
     * fillable fields
     *
     * @var array
     */
    protected $fillable = [
        'type'
    ];

    public function getPath()
    {
        return 'media/'.$this->id.'.'.$this->type;
    }
}
