<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
use App\Models\Role as Ro;


class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

     // role is a variable we are passing in our web.php (routes file)
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        // looping over the roles we have inside the web route parameter
        foreach($roles as $role){

            // find the role in our roles table that matches the current role title in loop
            $ro= Ro::where('title',$role)->first(); // will be equal to admin and employee OR could be just one role depending on what argument we pass

            // then we are checking if the user is logged in contains any of the roles we passed as argument
            // if the user does not contain any of the roles we passed as argument we redirect the user
            if($user->roles->contains($ro)){
                return $next($request);
            } else {
                return redirect ('/admin');
            }

            // * if you have any issues with this working return the redirect outside of the if else statment
        }
    }
}

// dd is the console.log equivalent in php

// dd($roles)

/* This is how codingphase handled the roles, not sure why he made it so complicated



*/

/*

$user = Auth::user();
        foreach($roles as $role){
           // we are checking for either one of the roles
            // * This is possible because we set up the relationships

           if($user->roles->contains(1) || $user->roles->contains(2)  ){
               return $next($request);
           } else {
               return 'string';
           }
        }


*/
