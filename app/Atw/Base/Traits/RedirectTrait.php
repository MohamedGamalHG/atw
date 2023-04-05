<?php


namespace Atw\Base\Traits;


trait RedirectTrait
{
    function RedirectTraitWithMsg(string $route,string $status,string $msg)
    {
       return redirect()->route($route)->with([$status=>$msg]);
    }
}
