@extends('layouts.admin')

@section('admincontent')
  <main class="flex-1 p-6 md:p-8 overflow-y-auto">
    
    <!-- Header -->
    <div class="mb-8">
      <div class="flex items-center justify-between mb-4">
        <div>
          <h1 class="text-3xl font-bold text-gray-800 mb-2">Compétences du sprint : {{ $sprint['nom'] ?? '' }}</h1>
          <p class="text-gray-500">Gérez les compétences assignées à ce sprint</p>
        </div>
        <a href="/admin/sprintcomp" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200">
          <i class="fas fa-arrow-left mr-2"></i>Retour
        </a>
      </div>
    </div>

    <!-- Compétences assignées -->
    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8">
      <h2 class="text-xl font-bold text-gray-800 mb-6">
        <i class="fas fa-check-circle text-green-600 mr-2"></i>Compétences assignées
      </h2>
      
      @if($comps && count($comps) > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
          @foreach($comps as $c)
          <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition">
            <div class="flex items-start justify-between mb-2">
              <div class="flex-1">
                <span class="font-mono text-xs bg-blue-50 text-blue-700 px-2 py-1 rounded">{{ $c['code'] }}</span>
                <h3 class="font-semibold text-gray-800 mt-2">{{ $c['label'] }}</h3>
                <div class="mt-2">
                  @if($c['niveau'] === 'IMITER')
                    <span class="px-2 py-1 text-xs font-medium rounded-full bg-green-100 text-green-700">IMITER</span>
                  @elseif($c['niveau'] === 'SADAPTER')
                    <span class="px-2 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-700">SADAPTER</span>
                  @else
                    <span class="px-2 py-1 text-xs font-medium rounded-full bg-purple-100 text-purple-700">TRANSPOSER</span>
                  @endif
                </div>
              </div>
              <form action="/admin/removecomp" method="POST" class="inline" 
                    onsubmit="return confirm('Voulez-vous retirer cette compétence du sprint ?');">
                <input type="hidden" name="sprint_id" value="{{ $sprint['id'] }}">
                <input type="hidden" name="comp_id" value="{{ $c['id'] }}">
                <button type="submit" class="text-red-500 hover:text-red-700">
                  <i class="fas fa-times-circle"></i>
                </button>
              </form>
            </div>
          </div>
          @endforeach
        </div>
      @else
        <div class="text-center py-8 text-gray-500">
          <i class="fas fa-inbox text-4xl mb-4 text-gray-300"></i>
          <p>Aucune compétence assignée à ce sprint</p>
        </div>
      @endif
    </div>

    <!-- Assigner de nouvelles compétences -->
    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
      <h2 class="text-xl font-bold text-gray-800 mb-6">
        <i class="fas fa-plus-circle text-blue-600 mr-2"></i>Assigner des compétences
      </h2>
      
      @if($available_comps && count($available_comps) > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
          @foreach($available_comps as $ac)
          <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition">
            <div class="mb-3">
              <span class="font-mono text-xs bg-gray-50 text-gray-700 px-2 py-1 rounded">{{ $ac['code'] }}</span>
              <h3 class="font-semibold text-gray-800 mt-2">{{ $ac['label'] }}</h3>
              <div class="mt-2">
                @if($ac['niveau'] === 'IMITER')
                  <span class="px-2 py-1 text-xs font-medium rounded-full bg-green-100 text-green-700">IMITER</span>
                @elseif($ac['niveau'] === 'SADAPTER')
                  <span class="px-2 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-700">SADAPTER</span>
                @else
                  <span class="px-2 py-1 text-xs font-medium rounded-full bg-purple-100 text-purple-700">TRANSPOSER</span>
                @endif
              </div>
            </div>
            <form action="/admin/assigncomp" method="POST" class="mt-3">
              <input type="hidden" name="sprint_id" value="{{ $sprint['id'] }}">
              <input type="hidden" name="comp_id" value="{{ $ac['id'] }}">
              <button type="submit" class="w-full px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors text-sm">
                <i class="fas fa-plus mr-2"></i>Assigner
              </button>
            </form>
          </div>
          @endforeach
        </div>
      @else
        <div class="text-center py-8 text-gray-500">
          <i class="fas fa-check-circle text-4xl mb-4 text-green-300"></i>
          <p>Toutes les compétences sont déjà assignées à ce sprint</p>
        </div>
      @endif
    </div>
  </main>
@endsection
