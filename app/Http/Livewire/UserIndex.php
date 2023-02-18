<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserIndex extends Component {
 use WithPagination;

 public function render() {
  $users = User::all();
  return view( 'livewire.user-index', ['users' => $users] );
 }
}
