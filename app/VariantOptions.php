<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class VariantOptions extends Model
{
    use Notifiable;
    protected $fillable = ['name','variant_id'];
}
