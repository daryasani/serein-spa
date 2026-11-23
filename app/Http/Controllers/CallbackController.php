<?php

namespace App\Http\Controllers;

use App\Models\Callback;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CallbackController extends Controller
{
    public function store(Request $request): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => ['required', 'string', 'max:50', 'regex:/^\+375(?:[ -]?\([0-9]{2}\)|[ -]?[0-9]{2})(?:[ -]?[0-9]){7}$/D'],
            'comment' => 'nullable|string|max:1000',
        ], [
            'name.required' => 'Укажите ваше имя.',
            'name.max' => 'Имя должно содержать не больше 255 символов.',
            'phone.required' => 'Укажите номер телефона.',
            'phone.max' => 'Номер телефона слишком длинный.',
            'phone.regex' => 'Укажите белорусский номер в формате +375 (29) 123-45-67.',
            'comment.max' => 'Комментарий должен содержать не больше 1000 символов.',
        ]);

        Callback::create($validated);

        if ($request->expectsJson()) {
            return response()->json(['success' => true]);
        }

        return to_route('callback.form')->with('callbackSubmitted', true);
    }
}
