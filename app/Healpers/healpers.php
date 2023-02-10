<?php

use Illuminate\Support\Facades\Auth;

function permission_check( $permission ) {
 if ( !Auth::user()->hasPermissionTo( $permission ) ) {
  flash()->addWarning( "Leads has no permission to see the Leads" );
  return redirect()->route( 'dashboard' )->send();
 }
}