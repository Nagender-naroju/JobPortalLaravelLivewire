<nav class="-mx-3 flex flex-1 justify-end items-center space-x-2">
    @auth
        @php
            $user = auth()->user();
        @endphp

        {{-- Admin role --}}
        @if ($user->role == 3)
            <a
                href="{{ url('admin/settings') }}"
                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
            >
                Admin Dashboard
            </a>
        @else
        <a
            href="{{ route('account.settings') }}"
            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
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
