<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class UserDetail extends Model
{
    use HasFactory;
    protected $fillable = ['first_name', 'last_name', 'email', 'phone'];

    public function getUserDetails()
    {
        return static::orderBy('created_at', 'desc')->get();
    }
    public function storeNewUserDetailData($input)
    {
        return static::create($input);
    }
    public function updateUserDetail($input)
    {
        return static::where('id', $input->id)->update([
            'first_name' => $input->first_name,
            'last_name' => $input->last_name,
            'email' => $input->email,
            'phone' => $input->phone
        ]);
    }
    public function deleteUser($id)
    {
        return static::find($id)->delete();
    }
    public function findUserDetailById($id)
    {
        return static::find($id);
    }
    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = Crypt::encryptString($value);
    }
    public function setLastNameAttribute($value)
    {
        $this->attributes['last_name'] = Crypt::encryptString($value);
    }
    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = Crypt::encryptString($value);
    }
    public function setPhoneAttribute($value)
    {
        $this->attributes['phone'] = Crypt::encryptString($value);
    }
    public function getFirstNameAttribute($value)
    {
        try {
            return Crypt::decryptString($value);
        } catch (\Exception $ex) {
            return $ex;
        }
    }
    public function getLastNameAttribute($value)
    {
        try {
            return Crypt::decryptString($value);
        } catch (\Exception $ex) {
            return $ex;
        }
    }
    public function getEmailAttribute($value)
    {
        try {
            return Crypt::decryptString($value);
        } catch (\Exception $ex) {
            return $ex;
        }
    }
    public function getPhoneAttribute($value)
    {
        try {
            return Crypt::decryptString($value);
        } catch (\Exception $ex) {
            return $ex;
        }
    }
}
