<?php

namespace App\Http\Requests\ArtistUser\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class RegisterRequest extends FormRequest
{
  /**
   * バリデーションルール
   */
  public function rules()
  {
    return [
      'name' => ['required', 'string', 'max:255'],
      'email' => ['required', 'string', 'email', 'max:255', 'unique:artist_users'],
      'password' => ['required', 'string', 'min:8', 'confirmed'],
    ];
  }
}
