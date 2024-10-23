<x-layout>
    <x-slot:heading>
        Job
    </x-slot:heading>
    <h2>{{$job->title}}</h2>
    <p>{{$job->salary}}</p>
    <x-button href="/jobs/{{$job->id}}/edit">
        Edit job
    </x-button>
</x-layout>
