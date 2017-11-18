<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Advice extends Model
{

	protected $table = 'advices';

	protected $fillable = [
        'user_id',
        'name',
        'description',
        'image',
        'video'
    ];

  public function reviews()
  {
    return $this->hasMany('App\Review');
  }

  public function images()
  {
      return $this->hasMany('App\AdviceImage')->orderBy('created_at', 'asc');
  }

  public function user()
  {
    return $this->belongsTo('App\User');
  }
}
