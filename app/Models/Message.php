<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'text', 'attachment_id', 'peer_id', 'from_id'
    ];

    public function edit(mixed $data)
    {
        $this->text = $data['text'];
        $this->attachment_id = $data['attachment_id'];
    }

    public function author()
    {
        return $this->hasOne(User::class, 'id', 'from_id')->get()->first();
    }
}
