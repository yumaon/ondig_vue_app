<?php

namespace App\Http\Requests\ArtistUser\Auth;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;

class LoginRequest extends FormRequest
{
  /**
   * 認証ガードを指定
   */
  public function authenticate()
  {
    $this->ensureIsNotRateLimited();

    if (! Auth::guard('artist')->attempt($this->only('email', 'password'), $this->boolean('remember'))) {
      RateLimiter::hit($this->throttleKey());

      throw ValidationException::withMessages([
        'email' => __('auth.failed'),
      ]);
    }

    RateLimiter::clear($this->throttleKey());
  }

  /**
   * レートリミットの設定
   */
  public function ensureIsNotRateLimited()
  {
    if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
      return;
    }

    throw ValidationException::withMessages([
      'email' => __('auth.throttle', [
        'seconds' => RateLimiter::availableIn($this->throttleKey()),
      ]),
    ]);
  }

  public function throttleKey()
  {
    return Str::lower($this->input('email')) . '|' . $this->ip();
  }

  /**
   * バリデーションルール
   */
  public function rules()
  {
    return [
      'email' => ['required', 'email'],
      'password' => ['required'],
    ];
  }
}
