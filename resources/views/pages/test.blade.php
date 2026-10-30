<x-layouts.app>
    <x-slot:header>
        Dashboard
    </x-slot:header>

    <div class="space-y-6">

        <div>
            <h2 class="text-2xl font-bold">Welcome to MeetMeinSunset!</h2>
            <p class="text-muted-foreground">
                Here's what's happening with your workspace.
            </p>
        </div>

        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">

            <div class="rounded-xl border border-border bg-card p-5">
                <p class="text-sm text-muted-foreground">Total Users</p>
                <h3 class="mt-2 text-3xl font-bold">120</h3>
            </div>

            <div class="rounded-xl border border-border bg-card p-5">
                <p class="text-sm text-muted-foreground">Active Users</p>
                <h3 class="mt-2 text-3xl font-bold">85</h3>
            </div>

            <div class="rounded-xl border border-border bg-card p-5">
                <p class="text-sm text-muted-foreground">New Registrations</p>
                <h3 class="mt-2 text-3xl font-bold">24</h3>
            </div>

            <div class="rounded-xl border border-border bg-card p-5">
                <p class="text-sm text-muted-foreground">Pending Requests</p>
                <h3 class="mt-2 text-3xl font-bold">11</h3>
            </div>

        </div>

    </div>
</x-layouts.app>