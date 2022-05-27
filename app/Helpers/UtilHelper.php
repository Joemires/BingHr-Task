<?php

if (!function_exists('get_initials')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function get_identifier() {
        $ret = '';
        foreach (explode(' ', config('app.name')) as $word)
            $ret .= strtoupper($word[0]);
        return $ret . '-' . generateRandomString(8);
    }

}

function generateRandomString($length = 10) {
    $characters = '0123456789';
    // $str .= 'abcdefghijklmnopqrstuvwxyz';
    $characters .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

    // return substr(str_shuffle(str_repeat($x=$str, ceil($length/strlen($x)) )),1,$length);
    // $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function role_badge($role) {
    $ar = collect(['super_admin' => '<span class="badge bg-danger">Super Admin</span>', 'admin' => '<span class="badge bg-info">Admin</span>', 'hr_admin' => '<span class="badge bg-success">HR Admin</span>', 'employee' => '<span class="badge bg-light">Employee</span>']);
    return $ar->get($role);
}
