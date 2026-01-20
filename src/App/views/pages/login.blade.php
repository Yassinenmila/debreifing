<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-indigo-500 to-purple-600 min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <!-- Carte de connexion -->
        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden">
            
            <!-- En-tête -->
            <div class="bg-gradient-to-r from-indigo-600 to-purple-600 p-8 text-center">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-white rounded-full mb-4">
                    <i class="fas fa-user-lock text-3xl text-indigo-600"></i>
                </div>
                <h1 class="text-3xl font-bold text-white mb-2">Connexion</h1>
                <p class="text-indigo-200">Accédez à votre espace personnel</p>
            </div>
            
            <!-- Formulaire -->
            <form action="/login" method="POST" class="p-8 space-y-6">
                <!-- Champ Email -->
                 <p class="text-red-500">{{ $error }}</p>
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">
                        <i class="fas fa-envelope mr-2 text-indigo-500"></i>
                        Adresse Email
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-user text-gray-400"></i>
                        </div>
                        <input type="email" name="email" required placeholder="votre@email.com" class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 focus:outline-none transition-all">
                    </div>
                </div>
                <!-- Champ Mot de passe -->
                <div class="space-y-2">
                    <div class="flex justify-between items-center">
                        <label class="block text-sm font-medium text-gray-700">
                            <i class="fas fa-key mr-2 text-indigo-500"></i>
                            Mot de passe
                        </label>
                        <a href="#" class="text-sm text-indigo-600 hover:text-indigo-800 hover:underline transition-colors"> Mot de passe oublié ?</a>
                    </div>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <input type="password" name="password" required placeholder="Votre mot de passe" class="w-full pl-10 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 focus:outline-none transition-all">
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                            <button type="button" class="text-gray-400 hover:text-gray-600 focus:outline-none">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Bouton de connexion -->
                <button type="submit" class="w-full bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-semibold py-3.5 px-4 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300">
                    <i class="fas fa-sign-in-alt mr-2"></i>
                    Se connecter
                </button>
            </form>
        </div>
    </div>
</body>
</html>    