<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    /**
     * The attributes that are fillable from mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'logo', 'cover', 'about'];

    protected $casts = [
        'user_id' => 'integer'
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
            'name' => 'required|min:3|max:60'
        ];

        $updateRule = [
            'name' => 'min:3|max:60'
        ];

        return $forUpdate ? $updateRule : $createRule;
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class)->select('id', 'name', 'avatar');
    }


}
