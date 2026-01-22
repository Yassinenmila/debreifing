@extends('layouts.admin')

@section('admincontent')

<!-- Main content -->
  <main class="flex-1 p-8">

    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
      <h2 class="text-2xl font-bold text-gray-800">Gestion des utilisateurs</h2>
      <a href="/admin/adduser" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
        + Ajouter
      </a>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-xl shadow overflow-hidden">
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
          <tr>
            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">ID</th>
            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Utilisateur</th>
            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Rôle</th>
            <th class="px-6 py-4 text-center text-sm font-semibold text-gray-600">Actions</th>
          </tr>
        </thead>

        <tbody class="divide-y divide-gray-100">
          @foreach($data as $d)
          <tr class="hover:bg-gray-50 transition">
            <td class="px-6 py-4 text-gray-700">{{ $d['id'] }}</td>

            <td class="px-6 py-4">
              <div class="flex items-center gap-4">
                <div class="w-10 h-10 bg-blue-500 text-white rounded-full flex items-center justify-center">
                  <i class="fas fa-user"></i>
                </div>
                <div>
                  <p class="font-semibold">{{ $d['prenom'] }} {{ $d['nom'] }}</p>
                  <p class="text-sm text-gray-500">{{ $d['email'] }}</p>
                </div>
              </div>
            </td>

            <td class="px-6 py-4">
              @if($d['roles'] === "student")
                <span class="px-3 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-700">Étudiant</span>
              @elseif($d['roles'] === "teacher")
                <span class="px-3 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-700">Formateur</span>
              @else
                <span class="px-3 py-1 text-xs font-medium rounded-full bg-purple-100 text-purple-700">Admin</span>
              @endif
            </td>

            <td class="px-6 py-4">
              <div class="flex justify-center gap-2">
                <form action="/admin/user" method="POST">
                  <input type="hidden" name="id" value="{{ $d['id'] }}">
                  <button type="submit" class="px-3 py-2 bg-yellow-400 text-white rounded-lg hover:bg-yellow-500">
                    <i class="fas fa-edit"></i>
                  </button>
                </form>
                <form action="/admin/user_d" method="POST">
                  <input type="hidden" name="id" value="{{ $d['id'] }}">
                  <button type="submit" class="px-3 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">
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