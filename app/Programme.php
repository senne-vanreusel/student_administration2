<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Programme
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Programme newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Programme newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Programme query()
 * @method static \Illuminate\Database\Eloquent\Builder|Programme whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Programme whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Programme whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Programme whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Programme extends Model
{
    public function students(){
        return $this->hasMany('App\Student');
    }
    public function courses(){
        return $this->hasMany('App\Course');
    }
}
