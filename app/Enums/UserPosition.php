<?php

namespace App\Enums;

use BenSampo\Enum\Enum;
use Illuminate\Support\Str;

/**
 * @method static static CEO_AND_FOUNDER()
 * @method static static TEAM_LEAD()
 * @method static static HR()
 * @method static static APP_DESIGNER()
 * @method static static WEB_DEVELOPER()
 */
final class UserPosition extends Enum
{
    # Description('Super admin')
    # Description('Super OK')
    const CEO_AND_FOUNDER   =   1;
    const TEAM_LEAD         =   2;
    const HR                =   3;
    const APP_DESIGNER      =   4;
    const WEB_DEVELOPER     =   5;

    static function getTitle($key)
    {
        $ar = collect(['CEO_AND_FOUNDER' => 'CEO And Founder', 'TEAM_LEAD' => 'Team Lead', 'HR' => 'HR', 'APP_DESIGNER' => 'App Designer', 'WEB_DEVELOPER' => 'Web Developer']);
        return $ar->get($key);
    }


    static function getRole($key)
    {
        $roles = collect([
            'super_admin' => ['CEO_AND_FOUNDER'],
            'admin' => ['TEAM_LEAD'],
            'hr_admin' => ['HR'],
            'employee' => ['APP_DESIGNER', 'WEB_DEVELOPER'],
        ])->recursive();

        if(self::hasKey($key)) {
            return $roles->search( fn ($position) => $position->search($key) !== false);
        }
    }
}
