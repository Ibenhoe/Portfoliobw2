<x-app-layout>
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-bold">{{ $user->username ?? $user->name }}'s Profiel</h2>

        <div class="profile-info mt-4">
            <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profielfoto" class="w-24 h-24 rounded-full">
            <p><strong>Gebruikersnaam:</strong> {{ $user->username ?? 'Niet opgegeven' }}</p>
            <p><strong>Verjaardag:</strong> {{ $user->birthday ? $user->birthday->format('d-m-Y') : 'Niet opgegeven' }}</p>
            <p><strong>Over mij:</strong> {{ $user->about ?? 'Geen informatie beschikbaar' }}</p>
        </div>
    </div>
</x-app-layout>