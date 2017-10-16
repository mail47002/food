<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advice extends Model
{

	protected $table = 'advices';

	protected $fillable = [
        'user_id', 'name', 'description', 'ingredient', 'video'
    ];

  protected $casts = [
      'ingredient' => 'array',
      'video'      => 'array'
  ];

 	public function scopeLatest($query)
  {
      return $query->orderBy('created_at', 'desc');
  }

  public function images()
    {
        return $this->hasMany('App\AdviceImage')->orderBy('created_at', 'asc');
    }

}
