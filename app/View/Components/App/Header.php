<?php

namespace App\View\Components\App;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\User as UserResource;

class Header extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('components.layouts.app.header',  [
            'userResource' => new UserResource(Auth::user()),
            ]);
    }
}
