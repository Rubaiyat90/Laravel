<x-layout>
    <div class="space-y-10">
        <section>
            <x-section-heading>Featured Jobs</x-section-heading>
            <div class="grid lg:grid-cols-3 gap-8 mt-6">
                <x-job-cards></x-job-cards>
                <x-job-cards></x-job-cards>
                <x-job-cards></x-job-cards>
            </div>
        </section>
        <section>
            <x-section-heading>Tags</x-section-heading>
            <div class="mt-6 space-x-1">
                <x-tags>Tag</x-tags>
                <x-tags>Tag</x-tags>
                <x-tags>Tag</x-tags>
                <x-tags>Tag</x-tags>
                <x-tags>Tag</x-tags>
                <x-tags>Tag</x-tags>
            </div>
        </section>
        <section>
            <x-section-heading>Recent Jobs</x-section-heading>
        </section>
    </div>
</x-layout>