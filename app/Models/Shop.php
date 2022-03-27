<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * 絞り込み・キーワード検索
 * @param \Illuminate\Database\Eloquent\Builder
 * @param array
 * @return \Illuminate\Database\Eloquent\Builder
 */


class Shop extends Model
{
    use HasFactory;

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function reserves()
    {
        return $this->hasMany(Reservation::class);
    }

    public function prefecture()
    {
        return $this->belongsTo(Prefecture::class);
    }

    public function scopeSerach(Builder $query, array $params): Builder
    {
        if (!empty($params['prefecture_id'])) $query->where('prefecture_id', $params['prefecture_id']);

        if (!empty($params['shop_name'])){
            $esc_key = addcslashes($params['shop_name'], '%_\\');
            $query->where('name', 'like', '%'.$esc_key.'%');
        }

        return $query;
    }
}
