<?php

use Illuminate\Support\Facades\Route;

require_once('includes/auth.php');

Route::group([
    'middleware' => 'auth',
], function() {
    require_once('includes/dashboard.php');
    require_once('includes/user.php');
    require_once('includes/pegawai.php');

});
