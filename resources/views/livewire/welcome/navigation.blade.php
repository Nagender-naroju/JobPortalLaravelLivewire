<nav class="-mx-3 flex flex-1 justify-end">
    @auth
        <a
            href="{{ route('account.settings') }}"
            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
        >
            Account Settings
        </a>
    @else
        <a
            href="{{ route('login') }}"
            class="btn btn-outline-primary me-2" 
        >
            Log in
        </a>

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
