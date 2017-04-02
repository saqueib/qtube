<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['body', 'video_id'];

    protected $casts = [
        'video_id' => 'integer',
        'user_id' => 'integer',
        'approved' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @param bool $forUpdate
     * @return array
     */
    public function getValidationRules($forUpdate = false)
    {
        $createRule = [
            'video_id' => 'required|integer|exists:videos,id',
            'body' => 'required|min:3'
        ];

        $updateRule = [
            'body' => 'required|min:3'
        ];

        return $forUpdate ? $updateRule : $createRule;
    }

    public function getCreatedAtAttribute($val)
    {
        return Carbon::parse($val)->diffForHumans();
    }

    public function user()
    {
        return $this->belongsTo(User::class)->select('id', 'name', 'avatar');
    }

    public function video()
    {
        return $this->belongsTo(Video::class);
    }
}
