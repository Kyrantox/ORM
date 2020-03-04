<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    protected $primaryKey = 'emp_no';
    public $timestamps = false;

    /**
     * Retourne l'employés pour un titre donné et à une date donné
     */

    protected $fillable = [
        'emp_no','title','from_date','to_date'
    ];

    public function employee()
    {
        return $this->belongsTo('App\Employee','emp_no','emp_no');
    }
}
