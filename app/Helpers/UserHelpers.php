<?php
namespace App\Helpers;

// Models
use App\Models\UserAuth;

class UserHelpers
{
    public static function get($id = null)
    {
        $user = UserAuth::where('is_active', 1);
        if ($id != null) {
            $data = $user->where('id', $id);   
        }
        $data = $user->first();
        return $data;    
    }
}

?>