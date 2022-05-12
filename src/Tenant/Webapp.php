<?php

namespace DigitalsiteSaaS\Progresiveapp\Tenant;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;

class Webapp extends Model
{
	use UsesTenantConnection;
	protected $table = 'webapps';
	public $timestamps = false;
}
