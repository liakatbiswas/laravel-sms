<?php

namespace App\Http\Livewire;

use App\Models\Lead;
use Livewire\Component;
use Livewire\WithPagination;

class LeadIndex extends Component {
  use WithPagination;
  public function render() {
    $leads = Lead::paginate( 10 );
    return view( 'livewire.lead-index', ['leads' => $leads] );
  }

  public function leadDelete( $id ) {
    /** no need if we want as a double security */
    //   permission_check( 'lead-management' );
    $lead = Lead::findOrFail( $id );
    $lead->delete();
    flash()->addSuccess( "Lead Successfully Deleted!" );
  }
}