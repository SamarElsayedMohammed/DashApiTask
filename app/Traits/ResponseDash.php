<?php

namespace App\Traits;

trait ResponseDash
{

    public function success($message, $route)
    {
        return redirect()->route($route)
            ->with('success', $message);
    }

    public function error($message, $route)
    {
        return redirect()->route($route)
            ->with('danger', $message);
    }
}
