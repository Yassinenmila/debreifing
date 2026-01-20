@extends('layouts.admin')

@section('admincontent')
  <main class="flex-1 p-8">
    <div class="mb-8">
      <h2 class="text-2xl font-bold">Créer un utilisateur</h2>
      <p class="text-gray-500">Ajouter un nouveau compte</p>
      {!! $message !!}
    </div>
    <div class="w-full bg-white p-8 rounded shadow">
        <form method="POST" action="/admin/adduser" class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @csrf
            <div>
                <label class="block text-sm font-medium mb-1">Nom</label>
                <input name="nom" type="text" class="w-full border rounded p-2 focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Prénom</label>
                <input name="prenom" type="text" class="w-full border rounded p-2 focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Email</label>
                <input name="email" type="email" class="w-full border rounded p-2 focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Age</label>
                <input name="age" type="number" class="w-full border rounded p-2 focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Mot de passe</label>
                <input name="password" type="password" class="w-full border rounded p-2 focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Confirmation du Mot de passe</label>
                <input name="confirm" type="password" class="w-full border rounded p-2 focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Rôle</label>
                <select name="role" class="w-full border rounded p-2">
                    <option>student</option>
                    <option>admin</option>
                    <option>teacher</option>
                </select>
            </div>
            <div class="md:col-span-2 flex justify-end gap-3 pt-4">
                    <a href="/admin/dashboard" class="px-4 py-2 border rounded hover:bg-gray-100">Annuler</a>
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Créer</button>
            </div>
        </form>
    </div>
  </main>
  @endsection

