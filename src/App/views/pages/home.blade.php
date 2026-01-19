@extends('layouts.app')

@section('title')
Home
@endsection
<!-- ================= MAIN ================= -->
@section('content')
<main class="flex-grow container mx-auto px-4 py-10">
    <div class="bg-white rounded-xl shadow-md p-8 text-center">
        <h2 class="text-2xl font-bold mb-4">Contenu de la plateforme</h2>
        <p class="text-gray-600 mb-6">
            Cette zone est prête à recevoir votre application.
        </p>

        <div class="grid md:grid-cols-3 gap-6">
            <div class="bg-indigo-50 p-6 rounded-lg">
                <i class="fas fa-user-graduate text-indigo-600 text-3xl mb-3"></i>
                <h3 class="font-bold">Espace Étudiant</h3>
            </div>
            <div class="bg-green-50 p-6 rounded-lg">
                <i class="fas fa-chalkboard-teacher text-green-600 text-3xl mb-3"></i>
                <h3 class="font-bold">Espace Formateur</h3>
            </div>
            <div class="bg-purple-50 p-6 rounded-lg">
                <i class="fas fa-user-tie text-purple-600 text-3xl mb-3"></i>
                <h3 class="font-bold">Administration</h3>
            </div>
        </div>
    </div>
</main>
@endsection

