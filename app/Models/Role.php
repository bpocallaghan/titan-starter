<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends AdminModel
{
    use SoftDeletes;

    protected $table = 'roles';

    protected $guarded = ['id'];

    // base user
    public static $USER = 'user'; // 1
    public static $ADMIN = 'admin'; // 2
    public static $ADMIN_NOTIFY = 'admin_notify'; // 3
    public static $DEVELOPER = 'developer'; // 4

    /**
     * Validation rules for this model
     */
    public static $rules = [
        'name'    => 'required|min:3:max:255',
        'slug'    => 'required|min:1:max:255',
        'keyword' => 'required|min:3:max:255',
    ];

    public function getIconTitleAttribute()
    {
        return '<i class="fa fa-' . $this->attributes['icon'] . '"</i> ' . $this->attributes['name'];
    }

    public function getNameSlugAttribute()
    {
        return $this->attributes['name'] . ' (' . $this->attributes['slug'] . ')';
    }

    /**
     * Get all the rows as an array (ready for dropdowns)
     *
     * @return array
     */
    public static function getAllLists()
    {
        return self::orderBy('name')->get()->pluck('name', 'id')->toArray();
    }
}
