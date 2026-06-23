<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EditModeMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        session([
            'editMode' => $request->has('edit') 
                ? true 
                : session('editMode', false)
        ]);

        return $next($request);
    }
}