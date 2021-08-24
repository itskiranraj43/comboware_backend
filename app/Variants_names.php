<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Variants_names extends Model
{
    use Notifiable;
    protected $fillable = ['name'];
}
