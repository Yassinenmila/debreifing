@extends('layouts.admin')

@section('admincontent')
  <!-- Main -->
  <main class="flex-1 p-8">

    <!-- Header -->
    <div class="flex justify-between items-center mb-8">
      <h2 class="text-2xl font-bold">Dashboard</h2>
      <span class="text-gray-600">Admin</span>
    </div>

    <!-- Stats -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
      <div class="bg-white p-5 rounded shadow">
        <p class="text-gray-500">Utilisateurs</p>
        <h3 class="text-2xl font-bold">147</h3>
      </div>

      <div class="bg-white p-5 rounded shadow">
        <p class="text-gray-500">Nouveaux</p>
        <h3 class="text-2xl font-bold">24</h3>
      </div>

      <div class="bg-white p-5 rounded shadow">
        <p class="text-gray-500">Actifs</p>
        <h3 class="text-2xl font-bold">132</h3>
      </div>

      <div class="bg-white p-5 rounded shadow">
        <p class="text-gray-500">Inactifs</p>
        <h3 class="text-2xl font-bold">15</h3>
      </div>
    </div>

    <!-- Actions -->
    <div class="bg-white p-6 rounded shadow">
      <h3 class="text-lg font-bold mb-4">Actions rapides</h3>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <a href="/admin/adduser" class="p-4 bg-blue-50 rounded text-center hover:bg-blue-100">
          <i class="fas fa-user-plus text-blue-600 text-2xl mb-2"></i>
          <p class="font-semibold">Créer utilisateur</p>
        </a>

        <a href="/admin/users" class="p-4 bg-green-50 rounded text-center hover:bg-green-100">
          <i class="fas fa-list text-green-600 text-2xl mb-2"></i>
          <p class="font-semibold">Liste utilisateurs</p>
        </a>

        <a href="#" class="p-4 bg-gray-50 rounded text-center hover:bg-gray-100">
          <i class="fas fa-cog text-gray-600 text-2xl mb-2"></i>
          <p class="font-semibold">Paramètres</p>
        </a>
      </div>
    </div>
  </main>
@endsection
