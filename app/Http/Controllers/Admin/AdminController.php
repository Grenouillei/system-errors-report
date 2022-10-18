<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    protected $vars = array();
    protected $title = FALSE;
    protected $description = FALSE;
    protected $template = FALSE;
    protected $locale;
    protected $user;
    protected $service = null;
    protected $content;
    protected $route = '';

    public function __construct()
    {
        Paginator::useBootstrap();

        $this->template = 'admin.pages';

        $this->middleware(function ($request, $next) {
            $this->user = \Auth::user();

            return $next($request);
        });
    }

    /**
     * @return $this
     * @throws \Throwable
     */
    protected function renderOutput()
    {
        $this->vars = Arr::add($this->vars,  'menu',$this->getMenu());
            if ($this->content)
                $this->vars = Arr::add($this->vars, 'content', $this->content);

        return view($this->template)->with($this->vars);
    }

    private function getMenu(){
        $collect = [];
            array_push($collect,['title'=>'Reports','link'=>'reports.index']);
            array_push($collect,['title'=>'Projects','link'=>'projects.index']);
            array_push($collect,['title'=>'Telegram','link'=>'telegrams.index']);
            array_push($collect,['title'=>'Users','link'=>'users.index']);
            array_push($collect,['title'=>'Roles','link'=>'roles.index']);
        return $collect;
    }

}
