<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $primaryKey = 'emp_no';
    public $timestamps = false;

    /**
     * Retourne le ou les employés pour un salaire donné
     */

    protected $fillable = [
        'emp_no','salary','from_date','to_date'
    ];

    public function employee()
    {
        return $this->belongsTo('App\Employee','emp_no');
    }
}
