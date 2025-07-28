<header class="bg-white shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
        <a href="{{ route('home') }}" class="flex items-center space-x-2 text-blue-600 font-bold text-xl">
            <i class="bi bi-mortarboard-fill text-2xl"></i>
            <span>Scholar Hub</span>
        </a>
        <nav class="hidden md:flex space-x-6 items-center">
            <a href="{{ route('storesfront') }}" class="text-gray-600 hover:text-blue-600 transition">Store</a>
            <a href="/schools" class="text-gray-600 hover:text-blue-600 transition">Schools</a>
            <a href="/dashboard" class="text-gray-600 hover:text-blue-600 transition">My Orders</a>
        </nav>
        <div class="hidden md:flex space-x-4">
            <a href="{{ route('login') }}" class="px-4 py-2 rounded border border-blue-600 text-blue-600 hover:bg-blue-50 transition">Login</a>
            <a href="{{ route('signup') }}" class="px-4 py-2 rounded bg-blue-600 text-white hover:bg-blue-700 transition">Sign Up</a>
        </div>
        <!-- Mobile Menu Button -->
        <div class="md:hidden">
            <button id="mobile-menu-btn" class="text-gray-700 text-2xl">
                <i class="bi bi-list"></i>
            </button>
        </div>
    </div>

    <!-- Mobile Menu (hidden by default) -->
    <div id="mobile-menu" class="md:hidden px-4 pb-4 hidden">
        <nav class="flex flex-col space-y-2">
            <a href="{{ route('storesfront') }}" class="text-gray-700 hover:text-blue-600">Store</a>
            <a href="/schools" class="text-gray-700 hover:text-blue-600">Schools</a>
            <a href="/dashboard" class="text-gray-700 hover:text-blue-600">My Orders</a>
            <a href="{{ route('login') }}" class="text-blue-600 border border-blue-600 rounded px-4 py-2 mt-2 text-center">Login</a>
            <a href="{{ route('signup') }}" class="bg-blue-600 text-white rounded px-4 py-2 text-center">Sign Up</a>
        </nav>
    </div>

    <script>
        const menuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        menuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</header>
