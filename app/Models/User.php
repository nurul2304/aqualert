<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users'; // atau 'admins' jika pakai tabel admin
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'username', 'email', 'password_hash', 'full_name', 'role', 'status'
    ];

    protected $hidden = ['password_hash'];
    
    public function getAuthPassword()
    {
        return $this->password_hash;
    }
    public function getIsOnlineAttribute()
{
    return $this->last_activity && now()->diffInMinutes($this->last_activity) < 3;
}


}
