<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;

    protected $guarded=[];

    protected $casts = [

        'options'=> 'json',
    ];

    public function enable()
    {
        $this->update(['status' => 'active']);
    }

    public function disable()
    {
        $this->update(['status' => 'inactive']);
    }

    public function getEnabledAttribute()
    {
        return $this->staus === 'active';
    }
}
