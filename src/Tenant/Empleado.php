<?php

namespace DigitalsiteSaaS\Progresiveapp\Tenant;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model{ 
 use UsesTenantConnection;
 protected $table = 'empleados';
 public $timestamps = true;
}

