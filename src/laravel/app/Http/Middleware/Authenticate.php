<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            // return route('/admin/login');
            return url( Config('app.url').'/admin/login');
        }
    }

    public function username() // このメソッドを追記
    {
        return 'email'; // 対象のカラム名に。後述するように view も変えます
    }
}
