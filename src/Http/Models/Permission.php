<?php

namespace Junges\ACL\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Junges\ACL\Events\PermissionSaving;
use Junges\ACL\Traits\PermissionsTrait;

class Permission extends Model
{
    use SoftDeletes, PermissionsTrait;

    protected $table;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name', 'description', 'slug',
    ];

    protected $dispatchesEvents = [
        'creating' => PermissionSaving::class
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setTable(config('acl.tables.permissions'));
    }
}
