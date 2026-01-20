@extends('layouts.admin')

@section('admincontent')

<div class="bg-white p-6 rounded shadow mt-8 w-full">
  <h3 class="text-lg font-bold mb-4">Liste des utilisateurs</h3>

  <div class="overflow-x-auto w-full">
    <table class="min-w-full w-full divide-y divide-gray-200">
      <thead class="bg-gray-100">
        <tr>
          <th class="px-6 py-3 text-left text-gray-600">ID</th>
          <th class="px-6 py-3 text-left text-gray-600">Nom</th>
          <th class="px-6 py-3 text-left text-gray-600">Prénom</th>
          <th class="px-6 py-3 text-left text-gray-600">Email</th>
          <th class="px-6 py-3 text-left text-gray-600">Rôle</th>
          <th class="px-6 py-3 text-left text-gray-600">Actions</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-200">
        @foreach($data as $d)                                             <!-- isi en doit poser la loop  -->
        <tr class="hover:bg-gray-50">
          <td class="px-6 py-4">{{ $d['id'] }}</td>
          <td class="px-6 py-4">{{ $d['prenom'] }}</td>
          <td class="px-6 py-4">{{ $d['nom'] }}</td>
          <td class="px-6 py-4">{{ $d['email'] }}</td>
          <td class="px-6 py-4">
            @if($d['roles']=== "student")
                <span class="px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">Etudiant</span>
            @elseif($d['roles']==="teacher")
                <span class="px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">Formateur</span>
            @else
                <span class="px-3 py-1 rounded-full text-xs font-medium bg-purple-100 text-purple-800">Administrateur</span>
            @endif
          </td>
        <!-- ici en vas faire le formulaire -->
          <td class="px-6 py-4 flex gap-2">
            <button class="px-4 py-2 bg-yellow-400 text-white rounded hover:bg-yellow-500">
              Modifier
            </button>
            <button class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
              Supprimer
            </button>
          </td>
        <!-- ici en vas finir le formulaire -->
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>



@endsection