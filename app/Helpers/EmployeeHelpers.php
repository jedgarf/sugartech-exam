<?php
namespace App\Helpers;

use Illuminate\Support\Facades\DB;

// Models
use App\Models\Employees;

class EmployeeHelpers
{
    public static function get($id = null)
    {
        $employee = Employees::where('id', '<>', 0);
        if ($id != null) {
            $data = $employee->where('id', $id)->first();   
        } else {
            $data = $employee->get();
        }
        return $data;
    }

    public static function get_genderCount()
    {
        $employeeCountByGender = Employees::select('gender', DB::raw('COUNT(*) as count'))
                            ->groupBy('gender')
                            ->get();

        return $employeeCountByGender;
    }

    public static function get_avgAge()
    {
        $employeeAvgAge = Employees::select(DB::raw('AVG(DATEDIFF(CURDATE(), birthdate) / 365) AS average_age'))
                            ->first();

        return $employeeAvgAge;
    }

    public static function get_allMonthlySalarySum()
    {
        $uemployeeSumOfMonthlySalary = Employees::select(DB::raw('SUM(monthly_salary) as total_monthly_salary'))
                            ->where('monthly_salary', '!=', '')
                            ->first();

        return $uemployeeSumOfMonthlySalary;
    }
}

?>