@extends('layouts.admin')

@section('admincontent')
  <main class="flex-1 p-6 md:p-8 overflow-y-auto">
    
    <!-- Header -->
    <div class="mb-8">
      <div class="flex items-center justify-between mb-4">
        <div>
          <h1 class="text-3xl font-bold text-gray-800 mb-2">Modifier une compétence</h1>
          <p class="text-gray-500">Modifiez les informations de la compétence</p>
        </div>
        <a href="/admin/competence" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200">
          <i class="fas fa-arrow-left mr-2"></i>Retour
        </a>
      </div>
      
      {!! $message ?? '' !!}
    </div>

    <!-- Formulaire de modification -->
    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
      <form method="POST" action="/admin/compedit" class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Code *</label>
          <input name="code" type="text" required value="{{ $comp['code'] }}" 
                 class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                 placeholder="Ex: COMP001">
        </div>
        
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Label *</label>
          <input name="label" type="text" required value="{{ $comp['label'] }}" 
                 class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                 placeholder="Nom de la compétence">
        </div>
        
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Niveau *</label>
          <select name="niveau" required 
                  class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            <option value="">Sélectionner un niveau</option>
            <option value="IMITER" {{ $comp['niveau'] === 'IMITER' ? 'selected' : '' }}>IMITER</option>
            <option value="SADAPTER" {{ $comp['niveau'] === 'SADAPTER' ? 'selected' : '' }}>SADAPTER</option>
            <option value="TRANSPOSER" {{ $comp['niveau'] === 'TRANSPOSER' ? 'selected' : '' }}>TRANSPOSER</option>
          </select>
        </div>
        
        <input name="id" type="hidden" value="{{ $comp['id'] }}">
        
        <div class="md:col-span-3 flex justify-end gap-3 pt-4 border-t border-gray-200">
          <a href="/admin/competence" class="px-6 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
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
