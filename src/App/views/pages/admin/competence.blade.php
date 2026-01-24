@extends('layouts.admin')

@section('admincontent')
  <main class="flex-1 p-6 md:p-8 overflow-y-auto">
    
    <!-- Header -->
    <div class="mb-8">
      <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-4">
        <div>
          <h1 class="text-3xl font-bold text-gray-800 mb-2">Gestion des Compétences</h1>
          <p class="text-gray-500">Ajouter, modifier ou supprimer des compétences</p>
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
          <i class="fas fa-exclamation-circle mr-2"></i>Une erreur s'est produite !
        </div>
      @endif
      
      {!! $message ?? '' !!}
    </div>

    <!-- Formulaire d'ajout -->
    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8">
      <h2 class="text-xl font-bold text-gray-800 mb-6">
        <i class="fas fa-plus-circle text-blue-600 mr-2"></i>Ajouter une compétence
      </h2>
      
      <form method="POST" action="/admin/addcomp" class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Code *</label>
          <input name="code" type="text" required 
                 class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                 placeholder="Ex: COMP001">
        </div>
        
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Label *</label>
          <input name="label" type="text" required 
                 class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                 placeholder="Nom de la compétence">
        </div>
        
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Niveau *</label>
          <select name="niveau" required 
                  class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            <option value="">Sélectionner un niveau</option>
            <option value="IMITER">IMITER</option>
            <option value="SADAPTER">SADAPTER</option>
            <option value="TRANSPOSER">TRANSPOSER</option>
          </select>
        </div>
        
        <div class="md:col-span-3 flex justify-end gap-3 pt-4">
          <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
            <i class="fas fa-save mr-2"></i>Ajouter
          </button>
        </div>
      </form>
    </div>

    <!-- Liste des compétences -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
      <div class="p-6 border-b border-gray-200">
        <h2 class="text-xl font-bold text-gray-800">
          <i class="fas fa-list text-indigo-600 mr-2"></i>Liste des compétences
        </h2>
      </div>
      
      @if($comp && count($comp) > 0)
        <div class="overflow-x-auto">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase">ID</th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase">Code</th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase">Label</th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase">Niveau</th>
                <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase">Actions</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
              @foreach($comp as $c)
              <tr class="hover:bg-gray-50 transition">
                <td class="px-6 py-4 text-gray-700">{{ $c['id'] }}</td>
                <td class="px-6 py-4">
                  <span class="font-mono text-sm bg-blue-50 text-blue-700 px-3 py-1 rounded">{{ $c['code'] }}</span>
                </td>
                <td class="px-6 py-4 text-gray-800 font-medium">{{ $c['label'] }}</td>
                <td class="px-6 py-4">
                  @if($c['niveau'] === 'IMITER')
                    <span class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-700">IMITER</span>
                  @elseif($c['niveau'] === 'SADAPTER')
                    <span class="px-3 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-700">SADAPTER</span>
                  @else
                    <span class="px-3 py-1 text-xs font-medium rounded-full bg-purple-100 text-purple-700">TRANSPOSER</span>
                  @endif
                </td>
                <td class="px-6 py-4">
                  <div class="flex justify-center gap-2">
                    <form action="/admin/compedit" method="POST" class="inline">
                      <input type="hidden" name="id" value="{{ $c['id'] }}">
                      <button type="submit" class="px-3 py-2 bg-yellow-400 text-white rounded-lg hover:bg-yellow-500 transition-colors">
                        <i class="fas fa-edit"></i>
                      </button>
                    </form>
                    <form action="/admin/compdelete" method="POST" class="inline" 
                          onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette compétence ?');">
                      <input type="hidden" name="id" value="{{ $c['id'] }}">
                      <button type="submit" class="px-3 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors">
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
      @else
        <div class="p-8 text-center text-gray-500">
          <i class="fas fa-inbox text-4xl mb-4 text-gray-300"></i>
          <p>Aucune compétence enregistrée</p>
        </div>
      @endif
    </div>
  </main>
@endsection