<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $primaryKey = 'emp_no';
    public $incrementing = false;
    public $timestamps = false;

    /**
     * Retourne le ou les salaires qu'a / qu'a eu l'employé
     */

    public function salaries()
    {
        return $this->hasMany('App\Salary','emp_no');
    }

    /**
     * Retourne le ou les départements qu'a / qu'a eu l'employé (plus ou moins, c'est très bancal)
     */

    public function Departments()
    {
        return $this->belongsToMany('App\Department','dept_emp','emp_no','dept_no')->withPivot('from_date','to_date');
    }

    public function managedDepartments()
    {
        return $this->belongsToMany('App\Department','dept_manager','emp_no','dept_no')->withPivot('from_date','to_date');
    }


    /**
     * Retourne le ou les titres qu'a / qu'a eu l'employé
     */

    public function titles()
    {
        return $this->HasMany('App\Title','emp_no');
    }




}
