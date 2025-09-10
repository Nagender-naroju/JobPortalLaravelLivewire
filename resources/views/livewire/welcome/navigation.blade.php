<nav class="-mx-3 flex flex-1 justify-end items-center space-x-2">
    @auth
        @php
            $user = auth()->user();
        @endphp

        {{-- Admin role --}}
        @if ($user->role == 3)
            <a
                href="{{ url('admin/settings') }}"
                class="btn btn-outline-primary"
            >
                Admin Dashboard
            </a>
        @else
        <a
            href="{{ route('account.settings') }}"
           class="btn btn-outline-primary"
        >
            Account Settings
        </a>
        @endif
    @else
        {{-- Guest: Login --}}
        <a
            href="{{ route('login') }}"
            class="btn btn-outline-primary"
        >
            Log in
        </a>

        {{-- Guest: Register (if route exists) --}}
        @if (Route::has('register'))
            <a
                href="{{ route('register') }}"
                class="btn btn-primary"
            >
                Register
            </a>
        @endif
    @endauth
</nav>
