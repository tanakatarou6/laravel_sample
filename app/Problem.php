<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    // fillableでロックをかける
    protected $fillable = ['drills_id', 'problem_0', 'problem_1', 'problem_2', 'problem_3', 'problem_4', 'problem_5', 'problem_6', 'problem_7', 'problem_8', 'problem_9'];

    // リレーションを張る
    public function drill()
    {
        return $this->BelongsTo('App\Drill');
    }
}
