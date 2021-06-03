<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model {

    protected $fillable = [
        'username', 'password', 'first_name', 'last_name', 'mobile', 'address', 'postal_code'
    ];

    const ROLE_ADMIN = "Admin";

    const ROLE_USER  = "User";
    
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = password_hash($value, PASSWORD_DEFAULT);
    }

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function isAdmin(): bool
    {
        return (bool) ($this->role == self::ROLE_ADMIN);
    }

    public function isUser(): bool
    {
        return (bool) ($this->role == self::ROLE_USER);
    }

    public function login()
    {
        $user = $this->whereUsername($this->username)->first();

        if(! $user )
        { return false; }

        if(! password_verify($this->passcode, $user->password))
        { return false; }

        session()->set('user_id', $user->id);
        session()->set('username', $user->username);

        return true;
    }

    public function check(): bool
    {
        if(session()->exists('user_id')) {
            $user = $this->find(session()->get('user_id'))->first();
            if( $user )
            { return true; }
            session_destroy();
        }

        return false;
    }

    public function user(): User
    {
        if($this->check()) {
            $user = $this->find(session()->get('user_id'))->first();
            if( $user )
            { return $user; }
        }
        return $this;
    }
}