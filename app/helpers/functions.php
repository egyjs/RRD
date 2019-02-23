<?php

use \Illuminate\Support\Facades\Auth as Auth;
use \App\User as User;

function hasRole($roleName){
    $role = User::Find(auth()->user()->id)->hasAnyRole([$roleName]);
    return $role;
}
