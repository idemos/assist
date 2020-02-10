<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workfromhome extends Model
{
    //
    protected $fillable = ['user_id','request_date','status'];

	/**
	 * Workfromhome belongs to User.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user()
	{
		// belongsTo(RelatedModel, foreignKey = user_id, keyOnRelatedModel = id)
		return $this->belongsTo(User::class);
	}

}
