<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class EmergencyResponse extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\EmergencyResponseFactory> */
    use HasFactory,HasApiTokens,Notifiable;
    protected $fillable = [
        'EmergencyMessage',
        'SeverityLevel',
        'Status',
        'form',
        'Response'
    ];
}
