<?php

use App\Models\features;
use App\Models\user_permission;
use App\Models\role_feature_permission;
use App\Models\users;

if (!function_exists('hasPermission')) {

    function hasPermission($featureSlug, $action = 'can_view')
    {
        $user = session('admin');
        if (!$user) return false;

        // Super admin bypass
        if ($user->user_type === 'super_admin') {
            return true;
        }

        // Get feature
        $feature = features::where('slug', $featureSlug)->first();
        if (!$feature) return false;

        // 1️⃣ Check user custom permission
        $userPerm = user_permission::where([
            'user_id' => $user->id,
            'feature_id' => $feature->id
        ])->first();

        if ($userPerm) {
            return $userPerm->$action == 1;
        }

        // // 2️⃣ Check role permission
        // $rolePerm = role_feature_permission::where([
        //     'role_id' => $user->role_id,
        //     'feature_id' => $feature->id
        // ])->first();

        // if ($rolePerm) {
        //     return $rolePerm->$action == 1;
        // }

        return false;
    }
}