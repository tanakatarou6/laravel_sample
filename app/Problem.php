<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    // fillableでロックをかける
    protected $fillable = ['drill_id', 'problem0', 'problem1', 'problem2', 'problem3', 'problem4', 'problem5', 'problem6', 'problem7', 'problem8', 'problem9'];

    // リレーションを張る
    public function drill()
    {
        return $this->BelongsTo('App\Drill');
    }
}
