<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function showLogin(): View
    {
        return view('admin.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'password' => ['required', 'string'],
        ]);

        if (! hash_equals((string) config('portfolio.admin_password'), $credentials['password'])) {
            return back()->withErrors(['password' => 'Incorrect password.']);
        }

        $request->session()->put('admin_authenticated', true);

        return redirect()->route('admin.index');
    }

    public function logout(Request $request): RedirectResponse
    {
        $request->session()->forget('admin_authenticated');

        return redirect()->route('admin.login');
    }

    public function index(): View
    {
        $certificates = Certificate::query()->orderBy('sort_order')->get();

        return view('admin.certificates', ['certificates' => $certificates]);
    }

    public function update(Request $request, Certificate $certificate): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'org' => ['nullable', 'string', 'max:255'],
            'year' => ['nullable', 'string', 'max:20'],
            'sort_order' => ['required', 'integer', 'min:1'],
        ]);

        $certificate->update($validated);

        return back()->with('status', 'Certificate updated.');
    }
}
