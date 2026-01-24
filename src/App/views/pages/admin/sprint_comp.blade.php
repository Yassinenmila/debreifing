@extends('layouts.admin')

@section('admincontent')
  <main class="flex-1 p-6 md:p-8 overflow-y-auto">
    
    <!-- Header -->
    <div class="mb-8">
      <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-4">
        <div>
          <h1 class="text-3xl font-bold text-gray-800 mb-2">Assignation des compétences aux sprints</h1>
          <p class="text-gray-500">Gérez les compétences assignées à chaque sprint</p>
        </div>
        <a href="/admin/dashboard" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200">
          <i class="fas fa-arrow-left mr-2"></i>Retour
        </a>
      </div>
      
      @if(isset($_GET['success']))
        <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-4">
          <i class="fas fa-check-circle mr-2"></i>Opération réussie !
        </div>
      @endif
      
      @if(isset($_GET['error']))
        <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-4">
          <i class="fas fa-exclamation-circle mr-2"></i>
          @if($_GET['error'] == '1')
            Erreur : Données manquantes !
          @elseif($_GET['error'] == '2')
            Erreur : Cette compétence est déjà assignée à ce sprint !
          @else
            Une erreur s'est produite !
          @endif
        </div>
      @endif
    </div>

    <!-- Liste des sprints avec leurs compétences -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
      <div class="p-6 border-b border-gray-200">
        <h2 class="text-xl font-bold text-gray-800">
          <i class="fas fa-list text-indigo-600 mr-2"></i>Liste des sprints
        </h2>
      </div>
      
      @if($sprints && count($sprints) > 0)
        <div class="overflow-x-auto">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase">ID</th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase">Nom du sprint</th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase">Dates</th>
                <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase">Compétences</th>
                <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase">Actions</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
              @foreach($sprints as $s)
              <tr class="hover:bg-gray-50 transition">
                <td class="px-6 py-4 text-gray-700">{{ $s['id'] }}</td>
                <td class="px-6 py-4">
                  <p class="font-semibold text-gray-800">{{ $s['nom'] }}</p>
                </td>
                <td class="px-6 py-4 text-gray-700">
                  <p class="text-sm">{{ $s['date_debut'] ?? '—' }}</p>
                  <p class="text-sm text-gray-500">{{ $s['date_fin'] ?? '—' }}</p>
                </td>
                <td class="px-6 py-4 text-center">
                  <span class="px-3 py-1 text-sm font-medium rounded-full bg-blue-100 text-blue-700">
                    {{ $s['nb_comp'] ?? 0 }} compétence(s)
                  </span>
                </td>
                <td class="px-6 py-4">
                  <div class="flex justify-center gap-2">
                    <form action="/admin/viewsprintcomp" method="POST" class="inline">
                      <input type="hidden" name="sprint_id" value="{{ $s['id'] }}">
                      <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                        <i class="fas fa-eye mr-2"></i>Voir/Gérer
                      </button>
                    </form>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      @else
        <div class="p-8 text-center text-gray-500">
          <i class="fas fa-inbox text-4xl mb-4 text-gray-300"></i>
          <p>Aucun sprint enregistré</p>
        </div>
      @endif
    </div>
  </main>
@endsection
