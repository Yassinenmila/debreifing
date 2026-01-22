@extends('layouts.admin')

@section('admincontent')

<main class="flex-1 p-8">
  <!-- Header -->
  <div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-800">Créer un sprint</h2>
    <a href="/admin/sprints"
       class="text-gray-600 hover:text-gray-800">
      ← Retour à la liste
    </a>
  </div>
  <!-- Form -->
  <div class="bg-white rounded-xl shadow p-8 max-w-3xl">
    <form method="POST" action="/admin/addsprint" class="space-y-6">
      <!-- Nom -->
      <div>
        <label class="block text-sm font-semibold text-gray-600 mb-2">
          Nom du sprint
        </label>
        <input type="text" name="nom" placeholder="Sprint 1 - Authentification" required class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
      </div>

      <!-- Dates -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
          <label class="block text-sm font-semibold text-gray-600 mb-2">Date de début</label>
          <input type="date" name="date_debut" class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>
        <div>
          <label class="block text-sm font-semibold text-gray-600 mb-2">
            Date de fin
          </label>
          <input type="date" name="date_fin" class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>
      </div>

      <!-- Actions -->
      <div class="flex justify-end gap-4 pt-4">
        <a href="/admin/sprints"
           class="px-5 py-2 border rounded-lg text-gray-600 hover:bg-gray-100">
          Annuler
        </a>
        <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
          Créer le sprint
        </button>
      </div>
    </form>
  </div>
</main>

@endsection