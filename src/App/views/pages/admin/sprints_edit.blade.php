@extends('layouts.admin')

@section('admincontent')
  <main class="flex-1 p-6 md:p-8 overflow-y-auto">
    
    <!-- Header -->
    <div class="mb-8">
      <div class="flex items-center justify-between mb-4">
        <div>
          <h1 class="text-3xl font-bold text-gray-800 mb-2">Modifier un sprint</h1>
          <p class="text-gray-500">Modifiez les informations du sprint</p>
        </div>
        <a href="/admin/sprints" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200">
          <i class="fas fa-arrow-left mr-2"></i>Retour
        </a>
      </div>
      
      {!! $message ?? '' !!}
    </div>

    <!-- Formulaire de modification -->
    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 max-w-3xl">
      <form method="POST" action="/admin/sprintedit" class="space-y-6">
        <div>
          <label class="block text-sm font-semibold text-gray-600 mb-2">
            Nom du sprint *
          </label>
          <input type="text" name="nom" required value="{{ $sprint['nom'] }}" 
                 class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                 placeholder="Sprint 1 - Authentification">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <label class="block text-sm font-semibold text-gray-600 mb-2">Date de début *</label>
            <input type="date" name="date_debut" required value="{{ $sprint['date_debut'] }}" 
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
          </div>
          <div>
            <label class="block text-sm font-semibold text-gray-600 mb-2">Date de fin *</label>
            <input type="date" name="date_fin" required value="{{ $sprint['date_fin'] }}" 
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
          </div>
        </div>

        <input name="id" type="hidden" value="{{ $sprint['id'] }}">
        
        <div class="flex justify-end gap-4 pt-4 border-t border-gray-200">
          <a href="/admin/sprints" class="px-6 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
            Annuler
          </a>
          <button name="sub_u" type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
            <i class="fas fa-save mr-2"></i>Enregistrer
          </button>
        </div>
      </form>
    </div>
  </main>
@endsection
