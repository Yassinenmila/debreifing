<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduPlateforme - @yield('title') </title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .header-shadow {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        }
        .footer-gradient {
            background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
        }
        .mobile-menu {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s ease;
        }
        .mobile-menu.open {
            max-height: 400px;
        }
        .active-role {
            border-bottom: 3px solid #4f46e5;
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen flex flex-col">

<!-- ================= HEADER ================= -->
<header class="bg-white header-shadow sticky top-0 z-50">
    <div class="container mx-auto px-4">

        <!-- NAVBAR -->
        <div class="flex justify-between items-center py-4">

            <!-- LOGO -->
            <div class="flex items-center space-x-3">
                <div class="bg-indigo-600 w-10 h-10 rounded-lg flex items-center justify-center">
                    <i class="fas fa-graduation-cap text-white text-xl"></i>
                </div>
                <div>
                    <h1 class="text-xl font-bold text-gray-800">
                        Edu<span class="text-indigo-600">Plateforme</span>
                    </h1>
                    <p class="text-xs text-gray-500 hidden md:block">
                        Étudiant • Formateur • Administration
                    </p>
                </div>
            </div>

            <!-- NAV DESKTOP -->
            <nav class="hidden md:flex items-center space-x-8">
                <a href="#" class="hover:text-indigo-600 font-medium">Accueil</a>
                <a href="#" class="hover:text-indigo-600 font-medium">Cours</a>
                <a href="#" class="hover:text-indigo-600 font-medium">Calendrier</a>
                <a href="#" class="hover:text-indigo-600 font-medium">Ressources</a>
                <a href="#" class="hover:text-indigo-600 font-medium">Contact</a>
            </nav>

            <!-- ACTIONS -->
            <div class="flex items-center space-x-4">

                <!-- Notifications -->
                <button aria-label="Notifications" class="relative p-2 rounded-full hover:bg-gray-100">
                    <i class="fas fa-bell text-gray-600 text-lg"></i>
                    <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">3</span>
                </button>

                <!-- Profil -->
                <div class="relative">
                    <button id="profileBtn" class="flex items-center space-x-2">
                        <div class="w-10 h-10 rounded-full bg-indigo-600 flex items-center justify-center text-white font-bold">
                            JD
                        </div>
                        <span class="hidden md:block font-medium">Jean Dupont</span>
                        <i class="fas fa-chevron-down text-sm"></i>
                    </button>

                    <div id="profileMenu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2">
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100">
                            <i class="fas fa-user mr-2"></i> Mon profil
                        </a>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100">
                            <i class="fas fa-cog mr-2"></i> Paramètres
                        </a>
                        <div class="border-t my-2"></div>
                        <a href="#" class="block px-4 py-2 text-red-600 hover:bg-red-50">
                            <i class="fas fa-sign-out-alt mr-2"></i> Déconnexion
                        </a>
                    </div>
                </div>

                <!-- BURGER -->
                <button id="mobileMenuButton" class="md:hidden p-2">
                    <i class="fas fa-bars text-xl"></i>
                </button>

            </div>
        </div>

        <!-- MENU MOBILE -->
        <div id="mobileMenu" class="mobile-menu md:hidden border-t">
            <a href="#" class="block px-4 py-2 hover:bg-indigo-50">Accueil</a>
            <a href="#" class="block px-4 py-2 hover:bg-indigo-50">Cours</a>
            <a href="#" class="block px-4 py-2 hover:bg-indigo-50">Calendrier</a>
            <a href="#" class="block px-4 py-2 hover:bg-indigo-50">Ressources</a>
            <a href="#" class="block px-4 py-2 hover:bg-indigo-50">Contact</a>
        </div>

    </div>
</header>


@yield('content')


<!-- ================= FOOTER ================= -->
<footer class="footer-gradient text-white">
    <div class="container mx-auto px-4 py-10 text-center">
        <p class="text-gray-400 text-sm">
            © 2023 EduPlateforme — Tous droits réservés
        </p>
    </div>
</footer>

<!-- ================= SCRIPTS ================= -->
<script>
    // Menu mobile
    const mobileBtn = document.getElementById('mobileMenuButton');
    const mobileMenu = document.getElementById('mobileMenu');
    mobileBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('open');
    });

    // Menu profil
    const profileBtn = document.getElementById('profileBtn');
    const profileMenu = document.getElementById('profileMenu');
    profileBtn.addEventListener('click', () => {
        profileMenu.classList.toggle('hidden');
    });
</script>

</body>
</html>
