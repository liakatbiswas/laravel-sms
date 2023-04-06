<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component {
 public $counter = 0;
 public function increment( $value ) {
  $this->counter++;
  flash()->addSuccess( 'Button is Clicked' . $value );
 }
 public function render() {
  return view( 'livewire.counter' );
 }
}