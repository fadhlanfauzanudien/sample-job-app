<?php 

use Illuminate\Support\Facades\Auth;

function current_user()
{
  return Auth::user();
}
