<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-gray-100">
<div class="flex min-h-screen">

  <!-- Sidebar -->
  <aside class="w-64 bg-white shadow-lg flex flex-col">
    <div class="p-6 border-b">
      <a href="/admin/dashboard" class="flex items-center gap-2 text-blue-600 font-bold text-xl">
        <i class="fas fa-cube"></i>
        Admin Panel
      </a>
    </div>

    <nav class="flex-1 p-4 space-y-2">
      <a href="/admin/dashboard" class="flex items-center gap-3 p-3 rounded-lg bg-blue-600 text-white">
        <i class="fas fa-chart-line"></i> Dashboard
      </a>

      <a href="/admin/users" class="flex items-center gap-3 p-3 rounded-lg hover:bg-blue-50 text-gray-700">
        <i class="fas fa-users"></i> Utilisateurs
      </a>

      <a href="/admin/adduser" class="flex items-center gap-3 p-3 rounded-lg hover:bg-blue-50 text-gray-700">
        <i class="fas fa-user-plus"></i> Créer utilisateur
      </a>

      <a href="/admin/sprints" class="flex items-center gap-3 p-3 rounded-lg hover:bg-blue-50 text-gray-700">
        <i class="fas fa-flag"></i> Sprints
      </a>

      <a href="/admin/competences" class="flex items-center gap-3 p-3 rounded-lg hover:bg-blue-50 text-gray-700">
        <i class="fas fa-lightbulb"></i> Compétences
      </a>
    </nav>

    <!-- Admin footer -->
    <div class="p-4 border-t flex items-center gap-3">
      <div class="w-10 h-10 bg-blue-600 text-white rounded-full flex items-center justify-center">
        <i class="fas fa-user"></i>
      </div>
      <div>
        <p class="font-semibold">Admin</p>
        <p class="text-sm text-gray-500">Administrateur</p>
      </div>
    </div>
  </aside>

  @yield('admincontent')

  </div>
</body>
</html>
