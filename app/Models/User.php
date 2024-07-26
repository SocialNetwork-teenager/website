<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use LaravelIdea\Helper\App\Models\_IH_Friends_C;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function friendRequest(){
        return $this->hasMany(Friends::class,'userrequest_id');
    }

    public function friendreceive(){
        return $this->hasMany(Friends::class,'userreceiver_id');
    }


    public function friend($id )
    {
       return User::whereHas('friendreceive',function($q) use ($id) {
            $q->where('userrequest_id',$id)->where('accepted',1);
        })->orWhereHas('friendRequest',function($q) use ($id) {
            $q->where('userreceiver_id',$id)->where('accepted',1);
       })->get();
    }

    public function addFriend($id){
        return Friends::create(['userreceiver_id' => $id,'userrequest_id' => Auth::id()]);
    }

    public function removeFriend($id)
    {
        Friends::where('userreceiver_id',Auth::id())->where('userrequest_id',$id)->orWhere('userrequest_id',Auth::id())->where('userreceiver_id',$id)->update(['accepted'=>0]);
    }
    public function status_user(){
        if ($this->status == 0){
            return 'disconnectd';
        }else{
            return 'connected';
        }
    }

    public function isfriend($id){
     return User::whereHas('friendreceive',function($q) use ($id) {
            $q->where('userrequest_id',$id)->where('accepted',1);
        })->orWhereHas('friendRequest',function($q) use ($id) {
            $q->where('userreceiver_id',$id)->where('accepted',1);
       })->exists();    }
}
