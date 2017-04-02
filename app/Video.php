<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'title', 'description', 'published',
        'url', 'thumbnail', 'allow_comments',
        'channel_id', 'category_id', 'user_id'
    ];

    protected $casts = [
        'published' => 'boolean',
        'allow_comments' => 'boolean'
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
            'title' => 'required|max:200',
            'description' => 'required|min:10',
            'category_id' => 'required|integer',
            'allow_comments' => 'boolean',
            'url' => 'required|url',
            'thumbnail' => 'required|url',
            'channel_id' => 'required|integer'
        ];

        $updateRule = [
            'title' => 'max:200',
            'description' => 'min:10',
            'url' => 'url',
            'thumbnail' => 'url'
        ];

        return $forUpdate ? $updateRule : $createRule;
    }

    public function getCreatedAtAttribute($val)
    {
        return Carbon::parse($val)->diffForHumans();
    }

    public function getUpdatedAtAttribute($val)
    {
        return Carbon::parse($val)->toFormattedDateString();
    }

    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class)->select([
            'id', 'name', 'avatar', 'created_at'
        ]);
    }

    public function category()
    {
        return $this->belongsTo(Category::class)->select('id', 'name');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
