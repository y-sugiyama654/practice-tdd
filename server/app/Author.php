<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    /**
     * 複数代入しない属性
     * @var array
     */
    protected $guarded = [];

    /**
     * 日付を変形する属性
     * @var array
     */
    protected $dates = ['dob'];

    /**
     * 引数の値の型をcarbonに設定
     * @param $dob
     */
    public function setDobAttribute($dob)
    {
        // dobの型をCarbonに変換
        $this->attributes['dob'] = Carbon::parse($dob);
    }
}
