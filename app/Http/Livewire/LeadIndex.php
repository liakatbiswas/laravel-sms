<?php

namespace App\Http\Livewire;

use App\Models\Lead;
use Livewire\Component;

class LeadIndex extends Component {
 public function render() {
  $leads = Lead::paginate( 8 );
  return view( 'livewire.lead-index', ['leads' => $leads] );
 }

 public function leadDelete( $id ) {
  $lead = Lead::findOrFail( $id );
  $lead->delete();
  flash()->addSuccess( "Lead Successfully Deleted!" );
 }
}