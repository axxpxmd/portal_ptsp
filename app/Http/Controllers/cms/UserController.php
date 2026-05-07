<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display a listing of users.
     */
    public function index(Request $request): View
    {
        $search = $request->string('search')->toString();
        $role = $request->string('role')->toString();

        $users = User::query()
            ->when($search !== '', function ($query) use ($search): void {
                $query->where(function ($query) use ($search): void {
                    $query->where('username', 'like', "%{$search}%")
                        ->orWhere('nama', 'like', "%{$search}%")
                        ->orWhere('no_telp', 'like', "%{$search}%");
                });
            })
            ->when($role !== '', fn ($query) => $query->where('role', $role))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('cms.pages.user.index', [
            'users' => $users,
            'roles' => $this->roles(),
            'search' => $search,
            'role' => $role,
        ]);
    }

    /**
     * Show the form for creating a user.
     */
    public function create(): View
    {
        return view('cms.pages.user.create', [
            'roles' => $this->roles(),
            'user' => new User,
        ]);
    }

    /**
     * Store a newly created user.
     */
    public function store(Request $request): RedirectResponse
    {
        User::query()->create($this->validatedData($request));

        return redirect()
            ->route('cms.users.index')
            ->with('success', 'User berhasil ditambahkan.');
    }

    /**
     * Display the specified user.
     */
    public function show(User $user): View
    {
        return view('cms.pages.user.show', [
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit(User $user): View
    {
        return view('cms.pages.user.edit', [
            'roles' => $this->roles(),
            'user' => $user,
        ]);
    }

    /**
     * Update the specified user.
     */
    public function update(Request $request, User $user): RedirectResponse
    {
        $data = $this->validatedData($request, $user);

        if (! filled($data['password'] ?? null)) {
            unset($data['password']);
        }

        $user->update($data);

        return redirect()
            ->route('cms.users.index')
            ->with('success', 'User berhasil diperbarui.');
    }

    /**
     * Remove the specified user.
     */
    public function destroy(User $user): RedirectResponse
    {
        if ($user->is(auth()->user())) {
            return back()->with('error', 'User yang sedang login tidak dapat dihapus.');
        }

        $user->delete();

        return redirect()
            ->route('cms.users.index')
            ->with('success', 'User berhasil dihapus.');
    }

    /**
     * Validate user payload.
     *
     * @return array<string, mixed>
     */
    private function validatedData(Request $request, ?User $user = null): array
    {
        $passwordRules = $user
            ? ['nullable', 'string', 'min:8', 'confirmed', 'regex:/^[A-Za-z0-9]+$/', 'regex:/[A-Za-z]/', 'regex:/[0-9]/']
            : ['required', 'string', 'min:8', 'confirmed', 'regex:/^[A-Za-z0-9]+$/', 'regex:/[A-Za-z]/', 'regex:/[0-9]/'];

        $usernameRule = Rule::unique('users', 'username');

        if ($user?->exists) {
            $usernameRule->ignore($user->id);
        }

        return $request->validate([
            'username' => [
                'required',
                'string',
                'max:255',
                $usernameRule,
            ],
            'nama' => ['required', 'string', 'max:255'],
            'no_telp' => ['nullable', 'string', 'max:20'],
            'alamat' => ['nullable', 'string'],
            'role' => ['required', Rule::in($this->roles())],
            'password' => $passwordRules,
        ], [
            'password.confirmed' => 'Konfirmasi password tidak sesuai.',
            'password.regex' => 'Password wajib berupa kombinasi huruf dan angka tanpa simbol.',
        ]);
    }

    /**
     * Get valid user roles.
     *
     * @return array<int, string>
     */
    private function roles(): array
    {
        return ['admin', 'verifikator', 'editor'];
    }
}
