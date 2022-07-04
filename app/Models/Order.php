<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Articles;
use App\Models\User;
use App\Models\Legal;



class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function article()
    {
        return $this->belongsTo(Articles::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function legal()
    {
        return $this->belongsTo(Legal::class);
    }
}
