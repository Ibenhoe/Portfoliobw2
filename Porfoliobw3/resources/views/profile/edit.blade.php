<!-- resources/views/profile/edit.blade.php -->
<x-app-layout>
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-bold">Profiel bewerken</h2>

        @if (session('success'))
            <div class="text-green-500">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
            @csrf

            <!-- Gebruikersnaam -->
            <div class="mt-4">
                <label for="username">Gebruikersnaam</label>
                <input type="text" name="username" id="username" value="{{ old('username', $user->username) }}" class="block mt-1 w-full">
            </div>

            <!-- Verjaardag -->
            <div class="mt-4">
                <label for="birthday">Verjaardag</label>
                <input type="date" name="birthday" id="birthday" value="{{ old('birthday', $user->birthday) }}" class="block mt-1 w-full">
            </div>

            <!-- Over mij -->
            <div class="mt-4">
                <label for="about">Over mij</label>
                <textarea name="about" id="about" class="block mt-1 w-full">{{ old('about', $user->about) }}</textarea>
            </div>

            <!-- Profielfoto -->
            <div class="mt-4">
                <label for="profile_picture">Profielfoto</label>
                <input type="file" name="profile_picture" id="profile_picture" class="block mt-1 w-full">
            </div>

            <div class="mt-4">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white">Opslaan</button>
            </div>
        </form>
    </div>
</x-app-layout>

