<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    //

    use SoftDeletes;

    protected $dates=['deleted_at'];

    protected $fillable=['nombres','apellidos','documento','num_documento','num_placa','visitado','telefono','empresa','usuario_id'];
}
