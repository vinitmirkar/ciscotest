<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RouterInfo extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'router_info';

    protected $fillable = ['sapid', 'hostname', 'loopback', 'mac_address', 'type', 'status', 'inet_aton'];
}
