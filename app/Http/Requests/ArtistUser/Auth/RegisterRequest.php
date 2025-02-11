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
      'genre_id' => ['required', 'exists:genres,id'],
      'prefecture_id' => ['required', 'exists:prefectures,id'],
      'city_name' => ['required', 'string', 'max:255'],
      'address_detail' => ['nullable', 'string', 'max:255'],
      'latitude' => ['nullable', 'decimal:10,7'],
      'longitude' => ['nullable', 'decimal:10,7'],
      'artist_name' => ['required', 'string', 'max:255'],
      'introduction' => ['nullable', 'string', 'max:255'],
      'youtube_url' => ['nullable', 'string', 'max:255'],
      'profile_image' => ['nullable', 'string', 'max:255'],
      'background_image' => ['nullable', 'string', 'max:255'],
      'email' => ['required', 'string', 'email', 'max:255', 'unique:artist_users'],
      'password' => ['required', 'string', 'min:8', 'confirmed'],
    ];
  }
}
