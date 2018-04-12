<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Config;
use Illuminate\Contracts\Filesystem\Factory;

class FilesystemMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function __construct(Factory $filesystem){
        $this->filesystem = $filesystem;
    }

    public function handle($request, Closure $next)
    {

        if(!auth()->check()){
            return $next($request);
        }

        $this->filesystem->set('user', $this->createDriver($this->getFilesystemConfig()));

        return $next($request);
    }

    protected function getFilesystemConfig(){
        $config = config('filesystems.disks.'. config('filesystems.default'));
        
        $config['root'] = public_path('uploads/'). auth()->id();

        return $config;
    }

    protected function createDriver($config){
        $method = $this->getCreationMethod();

        if (!method_exists($this->filesystem, $method)){
            throw new \Exception("method no found");
        }

        return $this->filesystem->{$method}($config);
    }

    protected function getCreationMethod(){

        return "create" . ucfirst(config('filesystems.default')). "Driver";
    }
}
