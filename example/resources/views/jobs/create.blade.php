<x-layout>
    <x-slot:heading>
        Create
    </x-slot:heading>
    <form method="post" action="/jobs">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Create new job</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">Job description</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form class="sm:col-span-4">
                        <x-form-label for="title">Username</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="text" name="title" id="title" placeholder="Job Title" required/>
                            <x-form-error name="title"/>
                        </div>
                    </x-form>
                    <x-form class="sm:col-span-4">
                        <x-form-label for="Salary">Salary</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="text" name="salary" id="salary" placeholder="Job Salary" required/>
                            <x-form-error name="title"/>
                        </div>
                    </x-form>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/jobs">Cancel</a>
            <x-form-button>Create</x-form-button>
        </div>
    </form>
</x-layout>

