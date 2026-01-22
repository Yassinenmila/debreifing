@extends('layouts.admin')

@section('admincontent')

<main class="flex-1 p-8">

  <!-- Header -->
  <div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-800">Gestion des sprints</h2>
    <a href="/admin/addsprint" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
      + Nouveau sprint
    </a>
  </div>
  <!-- Table -->
  <div class="bg-white rounded-xl shadow overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
      <thead class="bg-gray-50">
        <tr>
          <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">ID</th>
          <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Nom du sprint</th>
          <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Début</th>
          <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Fin</th>
          <th class="px-6 py-4 text-center text-sm font-semibold text-gray-600">Statut</th>
          <th class="px-6 py-4 text-center text-sm font-semibold text-gray-600">Actions</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-100">
        @foreach($sprints as $s)
        <tr class="hover:bg-gray-50 transition">
          <td class="px-6 py-4 text-gray-700">
            {{ $s['id'] }}
          </td>
          <td class="px-6 py-4">
            <p class="font-semibold text-gray-800">{{ $s['nom'] }}</p>
            <p class="text-sm text-gray-500">
              Créé le {{ $s['created_at'] }}
            </p>
          </td>

          <td class="px-6 py-4 text-gray-700">
            {{ $s['date_debut'] ?? '—' }}
          </td>

          <td class="px-6 py-4 text-gray-700">
            {{ $s['date_fin'] ?? '—' }}
          </td>

          <!-- Statut -->
          <td class="px-6 py-4 text-center">
            @if($s['date_fin'] === null)
              <span class="px-3 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-700">
                En cours
              </span>
            @else
              <span class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-700">
                Terminé
              </span>
            @endif
          </td>

          <!-- Actions -->
          <td class="px-6 py-4">
            <div class="flex justify-center gap-2">
              <a href="/admin/sprints/edit/{{ $s['id'] }}"
                 class="px-3 py-2 bg-yellow-400 text-white rounded-lg hover:bg-yellow-500">
                <i class="fas fa-edit"></i>
              </a>

              <form method="POST" action="/admin/sprints/delete/{{ $s['id'] }}">
                <button class="px-3 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">
                  <i class="fas fa-trash"></i>
                </button>
              </form>
            </div>
          </td>

        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

</main>

@endsection