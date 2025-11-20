<nav id="navbar" class="bg-transparent font-sans fixed w-full top-0 left-0 z-50 transition-all duration-700"> 
    <div class="flex items-center justify-between px-15 py-1"> 
        <div class="logo flex items-center gap-2.5"> 
            <img src="{{ asset('images/logos/Jogja_logo.png') }}" alt="YOT Logo" class="h-[77px] w-auto max-w-[350px]"> 
        </div> <ul class="nav-links flex list-none items-center gap-[25px] m-0 p-0"> 
            <li><a href="#" class="text-black no-underline font-bold transition-colors duration-300 hover:text-yellow-400">About Us</a></li> 
            <li><a href="#" class="text-black no-underline font-bold transition-colors duration-300 hover:text-yellow-400">Division</a></li> 
            <li><a href="#" class="text-black no-underline font-bold transition-colors duration-300 hover:text-yellow-400">Event</a></li> 
            <li><a href="#" class="text-black no-underline font-bold transition-colors duration-300 hover:text-yellow-400">Contact Us</a></li> 
            <li><a href="#" class="login-btn bg-[#FFF000] font-bold text-black py-1.5 px-6 rounded-full no-underline transition-all duration-300 hover:bg-opacity/50 hover:text-black">Login</a></li> 
        </ul> 
    </div> 
</nav>

<script>
    window.addEventListener('scroll', function() {
        const navbar = document.getElementById('navbar');
        if (window.scrollY > 50) {
            navbar.classList.add('bg-white', 'shadow-md');
            navbar.classList.remove('bg-transparent');
        } else {
            navbar.classList.add('bg-transparent');
            navbar.classList.remove('bg-white', 'shadow-md');
        }
    });
</script>
