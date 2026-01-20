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
  <aside class="w-60 bg-white shadow">
    <div class="p-6 border-b">
        <a href="/admin/dashboard">
          <h1 class="text-xl font-bold text-blue-600">
            <i class="fas fa-cube mr-2"></i>Admin
          </h1>
        </a>
    </div>

    <nav class="p-4 space-y-2">
      <a href="/admin/dashboard" class="flex items-center gap-3 p-3 bg-blue-600 text-white rounded">
        <i class="fas fa-chart-line"></i> Dashboard
      </a>
      <a href="/admin/users" class="flex items-center gap-3 p-3 hover:bg-gray-100 rounded">
        <i class="fas fa-users"></i> Utilisateurs
      </a>
      <a href="/admin/adduser" class="flex items-center gap-3 p-3 hover:bg-gray-100 rounded">
        <i class="fas fa-user-plus"></i> Créer
      </a>
    </nav>
  </aside>

  @yield('admincontent')

  </div>
</body>
</html>