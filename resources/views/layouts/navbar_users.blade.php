<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YOT Jogja</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .nav-links a {
            position: relative;
        }
        .nav-links a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 0;
            background-color: #facc15;
            transition: width 0.3s ease;
        }
        .nav-links a:hover::after {
            width: 100%;
        }
        .mobile-menu {
            transition: all 0.3s ease-in-out;
        }
    </style>
</head>
<body class="font-sans">
    <!-- Navbar -->
    <nav id="navbar" class="bg-transparent font-sans fixed w-full top-0 left-0 z-50 transition-all duration-500">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between py-3">
                <!-- Logo -->
                <div class="logo flex items-center">
                    <img src="{{ asset('images/logos/Jogja_logo.png') }}" alt="YOT Logo" class="h-[77px] w-auto">
                </div>
                
                <!-- Desktop Menu -->
                <ul class="hidden md:flex list-none items-center space-x-6 lg:space-x-8 m-0 p-0">
                    <li><a href="{{ route('aboutus') }}" class="text-black no-underline font-semibold transition-colors duration-300 hover:text-yellow-500">About Us</a></li>
                    <li><a href="{{ route('division') }}" class="text-black no-underline font-semibold transition-colors duration-300 hover:text-yellow-500">Division</a></li>
                    <li><a href="#" class="text-black no-underline font-semibold transition-colors duration-300 hover:text-yellow-500">Event</a></li>
                    <li><a href="#" class="text-black no-underline font-semibold transition-colors duration-300 hover:text-yellow-500">Contact Us</a></li>
                    <li><a href="{{ route('login') }}" class="login-btn bg-yellow-400 font-bold text-black py-2 px-6 rounded-full no-underline transition-all duration-300 hover:bg-yellow-500 hover:shadow-md">Login</a></li>
                </ul>
                
                <!-- Mobile Menu Button -->
                <button id="mobile-menu-button" class="md:hidden text-black focus:outline-none">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
            
            <!-- Mobile Menu -->
            <div id="mobile-menu" class="mobile-menu md:hidden bg-white shadow-lg rounded-lg mt-2 py-4 px-6 hidden">
                <ul class="flex flex-col space-y-4">
                    <li><a href="#" class="text-black no-underline font-semibold transition-colors duration-300 hover:text-yellow-500 block py-2">About Us</a></li>
                    <li><a href="#" class="text-black no-underline font-semibold transition-colors duration-300 hover:text-yellow-500 block py-2">Division</a></li>
                    <li><a href="#" class="text-black no-underline font-semibold transition-colors duration-300 hover:text-yellow-500 block py-2">Event</a></li>
                    <li><a href="#" class="text-black no-underline font-semibold transition-colors duration-300 hover:text-yellow-500 block py-2">Contact Us</a></li>
                    <li><a href="#" class="login-btn bg-yellow-400 font-bold text-black py-2 px-6 rounded-full no-underline transition-all duration-300 hover:bg-yellow-500 text-center block mt-2">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <script>
        // Scroll effect untuk navbar
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('bg-white', 'shadow-md', 'py-2');
                navbar.classList.remove('bg-transparent');
            } else {
                navbar.classList.add('bg-transparent');
                navbar.classList.remove('bg-white', 'shadow-md', 'py-2');
            }
        });

        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
            
            // Ganti ikon menu
            const icon = this.querySelector('i');
            if (icon.classList.contains('fa-bars')) {
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-times');
            } else {
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            }
        });

        // Tutup mobile menu ketika klik di luar
        document.addEventListener('click', function(event) {
            const mobileMenu = document.getElementById('mobile-menu');
            const menuButton = document.getElementById('mobile-menu-button');
            
            if (!mobileMenu.contains(event.target) && !menuButton.contains(event.target)) {
                mobileMenu.classList.add('hidden');
                menuButton.querySelector('i').classList.remove('fa-times');
                menuButton.querySelector('i').classList.add('fa-bars');
            }
        });
    </script>
</body>
</html>