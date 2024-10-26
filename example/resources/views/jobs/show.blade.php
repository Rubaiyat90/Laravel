<x-layout>
    <x-slot:heading>
        Job
    </x-slot:heading>
    <h2>{{$job->title}}</h2>
    <p>{{$job->salary}}</p>
    @can('edit',$job)
        <x-button href="/jobs/{{$job->id}}/edit">
            Edit job
        </x-button>
    @endcan
</x-layout>
