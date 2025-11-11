<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasName;
use Filament\Panel;
use Filament\Auth\MultiFactor\App\Contracts\HasAppAuthentication;
use Filament\Auth\MultiFactor\App\Contracts\HasAppAuthenticationRecovery;

class User extends Authenticatable implements FilamentUser, HasName, HasAppAuthentication, HasAppAuthenticationRecovery
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'user_id';

    protected $fillable = [
        'username',
        'password',
        'email',
        'phone',
        'role',
        'full_name',
        'is_active',
        'last_login',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'app_authentication_secret',
        'app_authentication_recovery_codes',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'last_login' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
        'app_authentication_secret' => 'encrypted',
        'app_authentication_recovery_codes' => 'encrypted:array',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            if (empty($user->username)) {
                $emailUsername = explode('@', $user->email)[0];
                $username = $emailUsername;

                $counter = 1;
                while (User::where('username', $username)->exists()) {
                    $username = $emailUsername . $counter;
                    $counter++;
                }

                $user->username = $username;
            }

            if (empty($user->role)) {
                $user->role = 'customer';
            }
        });
    }

    public function getFilamentName(): string
    {
        return (string) ($this->full_name ?? $this->username ?? $this->email);
    }

    public function canAccessPanel(\Filament\Panel $panel): bool
    {
        $panelId = $panel->getId();

        if ($panelId === 'admin') {
            return $this->role === 'admin' && $this->is_active;
        }

        if ($panelId === 'production') {
            return in_array($this->role, ['admin', 'production']) && $this->is_active;
        }

        if ($panelId === 'customer-service') {
            return in_array($this->role, ['admin', 'customer_service']) && $this->is_active;
        }

        if ($panelId === 'designer') {
            return in_array($this->role, ['admin', 'designer']) && $this->is_active;
        }

        if ($panelId === 'customer') {
            return in_array($this->role, ['customer', 'admin']) && $this->is_active;
        }

        return false;
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function setPasswordAttribute($value)
    {
        if (!empty($value)) {
            if (preg_match('/^\$2[ayb]\$.{56}$/', $value)) {
                $this->attributes['password'] = $value;
            } else {
                $this->attributes['password'] = Hash::make($value);
            }
        }
    }

    public function getRoleNameAttribute()
    {
        $roles = [
            'customer' => 'Customer',
            'customer_service' => 'Customer Service',
            'production' => 'Production Staff',
            'designer' => 'Designer',
            'admin' => 'Administrator',
        ];
        return $roles[$this->role] ?? $this->role;
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByRole($query, $role)
    {
        return $query->where('role', $role);
    }

    public function getAppAuthenticationSecret(): ?string
    {
        return $this->app_authentication_secret;
    }

    public function saveAppAuthenticationSecret(?string $secret): void
    {
        $this->app_authentication_secret = $secret;
        $this->save();
    }

    public function getAppAuthenticationHolderName(): string
    {
        return $this->email;
    }

    public function getAppAuthenticationRecoveryCodes(): ?array
    {
        return $this->app_authentication_recovery_codes;
    }

    public function saveAppAuthenticationRecoveryCodes(?array $codes): void
    {
        $this->app_authentication_recovery_codes = $codes;
        $this->save();
    }

    public function customer()
    {
        return $this->hasOne(Customer::class, 'user_id', 'user_id');
    }

    public function designedOrders()
    {
        return $this->hasMany(Order::class, 'assigned_designer', 'user_id');
    }

    public function productionOrders()
    {
        return $this->hasMany(Order::class, 'assigned_production', 'user_id');
    }

    public function createdOrders()
    {
        return $this->hasMany(Order::class, 'created_by', 'user_id');
    }

    public function updatedOrders()
    {
        return $this->hasMany(Order::class, 'updated_by', 'user_id');
    }

    public function uploadedDesignFiles()
    {
        return $this->hasMany(DesignFile::class, 'uploaded_by', 'user_id');
    }

    public function approvedDesignFiles()
    {
        return $this->hasMany(DesignFile::class, 'approved_by', 'user_id');
    }

    public function receivedPayments()
    {
        return $this->hasMany(Payment::class, 'received_by', 'user_id');
    }

    public function verifiedPayments()
    {
        return $this->hasMany(Payment::class, 'verified_by', 'user_id');
    }

    public function handledProgress()
    {
        return $this->hasMany(ProductionProgress::class, 'handled_by', 'user_id');
    }

    public function handledInventoryTransactions()
    {
        return $this->hasMany(InventoryTransaction::class, 'handled_by', 'user_id');
    }

    public function approvedInventoryTransactions()
    {
        return $this->hasMany(InventoryTransaction::class, 'approved_by', 'user_id');
    }

    public function generatedReports()
    {
        return $this->hasMany(SalesReport::class, 'generated_by', 'user_id');
    }
}