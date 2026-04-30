<?php

function has_permission($permission_name, $action = 'can_view')
{
    $CI = &get_instance();
    $permissions = $CI->session->userdata('permissions') ?? [];

    // Support new format: ['link_name' => ['can_view'=>1, 'can_edit'=>0, 'can_delete'=>0]]
    if (isset($permissions[$permission_name])) {
        if ($action === null) {
            return true; // just check if link is assigned
        }
        return !empty($permissions[$permission_name][$action]);
    }

    // Legacy fallback: simple array of link names
    if (is_array($permissions) && in_array($permission_name, $permissions)) {
        return true;
    }

    return false;
}
