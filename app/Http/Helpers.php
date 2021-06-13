<?php

use App\Employee;
use Illuminate\Support\Facades\Auth;

if (! function_exists('my_asset')) {
    
    function my_asset($path, $secure = null)
    {
        return app('url')->asset('/'.$path, $secure);
    }

    function account()
    {
        $id     = Auth::user()->employee_id;
        $data   = Employee::where('id',$id)->first();
        return $data;
    }

    // for add your helper, change "files": ["app/Helpers/helpers.php"  ] in composer json
    // then run in terminal composer dump-autoload
}
