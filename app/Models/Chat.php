<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Chat extends Model
{
    use HasFactory;
        
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'avatar_id'
    ];
    
    /**
     * default attribut values
     *
     * @var array
     */
    protected $attributes = [
        'name' => 'Новая беседа',
        'avatar_id' => 1
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
    ];
    
    /**
     * Returns chat avatar
     *
     * @return Media
     */
    public function avatar(): Media
    {
        return Media::firstWhere('id', $this->avatar_id);
    }
    
    /**
     * Sets chat avatar
     *
     * @param  Media $media
     * @return void
     */
    public function setAvatar(Media $media): void
    {
        $this->avatar_id = $media->id;
    }
    
    /**
     * Returns chat members
     *
     * @return HasMany
     */
    public function members(): HasMany
    {
        return $this->hasMany(ChatMember::class);
    }
    
    /**
     * Adds member to chat
     *
     * @param  User $user
     * @return ChatMember
     */
    public function addMember(User $user): ChatMember
    {
        return $this->members()->create([
            'user_id' => $user->id
        ]);
    }
    
    /**
     * Removes chat member
     *
     * @param  mixed $user
     * @return void
     */
    public function removeMember(User $user)
    {
        $this->members()->find($user->id)->delete();
    }
    
    /**
     * Returns true if user in that chat
     *
     * @param  mixed $user
     * @return void
     */
    public function isUserInChat(User $user) 
    {
        return boolval($this->members()->where('user_id', '=', $user->id)->get());
    }

    public function messages()
    {
        return $this->hasMany(Message::class, 'peer_id', 'id')->get();
    }
}
