@extends('layouts.app')

@section('title', 'Components Demo - Seamless')

@section('content')
<div class="container mx-auto px-6 py-12">
    <!-- Page Header -->
    <div class="text-center mb-16">
        <h1 class="text-5xl font-bold text-foreground mb-4">
            Components Demo
        </h1>
        <p class="text-xl text-muted-foreground">
            All components are now globally available on every page
        </p>
    </div>

    <!-- Section Components Demo -->
    <section class="mb-20">
        <h2 class="text-3xl font-bold text-foreground mb-8">Section Components</h2>
        
        <div class="space-y-12">
            <!-- Hero Section -->
            <div class="border border-border rounded-lg p-4">
                <h3 class="text-xl font-semibold mb-4">Hero Section</h3>
                <x-section-hero />
            </div>

            <!-- Features Section -->
            <div class="border border-border rounded-lg p-4">
                <h3 class="text-xl font-semibold mb-4">Features Section</h3>
                <x-section-features />
            </div>

            <!-- Frustration Section -->
            <div class="border border-border rounded-lg p-4">
                <h3 class="text-xl font-semibold mb-4">Frustration Section</h3>
                <x-section-frustration />
            </div>

            <!-- Better Way Section -->
            <div class="border border-border rounded-lg p-4">
                <h3 class="text-xl font-semibold mb-4">Better Way Section</h3>
                <x-section-better-way />
            </div>

            <!-- Membership Section -->
            <div class="border border-border rounded-lg p-4">
                <h3 class="text-xl font-semibold mb-4">Membership Section</h3>
                <x-section-membership />
            </div>

            <!-- Testimonials Section -->
            <div class="border border-border rounded-lg p-4">
                <h3 class="text-xl font-semibold mb-4">Testimonials Section</h3>
                <x-section-testimonials />
            </div>
        </div>
    </section>

    <!-- UI Components Demo -->
    <section class="mb-20">
        <h2 class="text-3xl font-bold text-foreground mb-8">UI Components</h2>
        
        <div class="grid md:grid-cols-2 gap-8">
            <!-- Buttons -->
            <div class="border border-border rounded-lg p-6">
                <h3 class="text-xl font-semibold mb-4">Buttons</h3>
                <div class="flex flex-wrap gap-4">
                    <x-ui-button>Default Button</x-ui-button>
                    <x-ui-button variant="secondary">Secondary</x-ui-button>
                    <x-ui-button variant="outline">Outline</x-ui-button>
                    <x-ui-button variant="ghost">Ghost</x-ui-button>
                </div>
            </div>

            <!-- Badges -->
            <div class="border border-border rounded-lg p-6">
                <h3 class="text-xl font-semibold mb-4">Badges</h3>
                <div class="flex flex-wrap gap-4">
                    <x-ui-badge>Default</x-ui-badge>
                    <x-ui-badge variant="secondary">Secondary</x-ui-badge>
                    <x-ui-badge variant="outline">Outline</x-ui-badge>
                    <x-ui-badge variant="destructive">Destructive</x-ui-badge>
                </div>
            </div>

            <!-- Card -->
            <div class="border border-border rounded-lg p-6">
                <h3 class="text-xl font-semibold mb-4">Card</h3>
                <x-ui-card>
                    <x-ui-card-header>
                        <x-ui-card-title>Card Title</x-ui-card-title>
                        <x-ui-card-description>This is a card description</x-ui-card-description>
                    </x-ui-card-header>
                    <x-ui-card-content>
                        <p>Card content goes here. You can put any content inside.</p>
                    </x-ui-card-content>
                    <x-ui-card-footer>
                        <x-ui-button>Action</x-ui-button>
                    </x-ui-card-footer>
                </x-ui-card>
            </div>

            <!-- Alert -->
            <div class="border border-border rounded-lg p-6">
                <h3 class="text-xl font-semibold mb-4">Alert</h3>
                <x-ui-alert>
                    <x-ui-alert-title>Heads up!</x-ui-alert-title>
                    <x-ui-alert-description>
                        You can add components to your app using the cli.
                    </x-ui-alert-description>
                </x-ui-alert>
            </div>

            <!-- Form Elements -->
            <div class="border border-border rounded-lg p-6">
                <h3 class="text-xl font-semibold mb-4">Form Elements</h3>
                <div class="space-y-4">
                    <div>
                        <x-ui-label>Email</x-ui-label>
                        <x-ui-input type="email" placeholder="Enter your email" />
                    </div>
                    <div>
                        <x-ui-label>Message</x-ui-label>
                        <x-ui-textarea placeholder="Type your message here" />
                    </div>
                    <div class="flex items-center space-x-2">
                        <x-ui-checkbox id="terms" />
                        <x-ui-label for="terms">Accept terms and conditions</x-ui-label>
                    </div>
                </div>
            </div>

            <!-- Accordion -->
            <div class="border border-border rounded-lg p-6">
                <h3 class="text-xl font-semibold mb-4">Accordion</h3>
                <x-ui-accordion>
                    <x-ui-accordion-item value="item-1">
                        <x-ui-accordion-trigger>Is it accessible?</x-ui-accordion-trigger>
                        <x-ui-accordion-content>
                            Yes. It adheres to the WAI-ARIA design pattern.
                        </x-ui-accordion-content>
                    </x-ui-accordion-item>
                    <x-ui-accordion-item value="item-2">
                        <x-ui-accordion-trigger>Is it styled?</x-ui-accordion-trigger>
                        <x-ui-accordion-content>
                            Yes. It comes with default styles that matches the other components.
                        </x-ui-accordion-content>
                    </x-ui-accordion-item>
                </x-ui-accordion>
            </div>

            <!-- Tabs -->
            <div class="border border-border rounded-lg p-6">
                <h3 class="text-xl font-semibold mb-4">Tabs</h3>
                <x-ui-tabs default-value="account">
                    <x-ui-tabs-list>
                        <x-ui-tabs-trigger value="account">Account</x-ui-tabs-trigger>
                        <x-ui-tabs-trigger value="password">Password</x-ui-tabs-trigger>
                    </x-ui-tabs-list>
                    <x-ui-tabs-content value="account">
                        <p class="text-sm text-muted-foreground">
                            Make changes to your account here.
                        </p>
                    </x-ui-tabs-content>
                    <x-ui-tabs-content value="password">
                        <p class="text-sm text-muted-foreground">
                            Change your password here.
                        </p>
                    </x-ui-tabs-content>
                </x-ui-tabs>
            </div>

            <!-- Avatar -->
            <div class="border border-border rounded-lg p-6">
                <h3 class="text-xl font-semibold mb-4">Avatar</h3>
                <div class="flex gap-4">
                    <x-ui-avatar>
                        <x-ui-avatar-image src="https://github.com/shadcn.png" alt="@shadcn" />
                        <x-ui-avatar-fallback>CN</x-ui-avatar-fallback>
                    </x-ui-avatar>
                    <x-ui-avatar>
                        <x-ui-avatar-fallback>JD</x-ui-avatar-fallback>
                    </x-ui-avatar>
                </div>
            </div>

            <!-- Progress -->
            <div class="border border-border rounded-lg p-6">
                <h3 class="text-xl font-semibold mb-4">Progress</h3>
                <x-ui-progress value="60" />
            </div>

            <!-- Separator -->
            <div class="border border-border rounded-lg p-6">
                <h3 class="text-xl font-semibold mb-4">Separator</h3>
                <div>
                    <div class="space-y-1">
                        <h4 class="text-sm font-medium leading-none">Radix Primitives</h4>
                        <p class="text-sm text-muted-foreground">
                            An open-source UI component library.
                        </p>
                    </div>
                    <x-ui-separator class="my-4" />
                    <div class="flex h-5 items-center space-x-4 text-sm">
                        <div>Blog</div>
                        <x-ui-separator orientation="vertical" />
                        <div>Docs</div>
                        <x-ui-separator orientation="vertical" />
                        <div>Source</div>
                    </div>
                </div>
            </div>

            <!-- Skeleton -->
            <div class="border border-border rounded-lg p-6">
                <h3 class="text-xl font-semibold mb-4">Skeleton</h3>
                <div class="space-y-2">
                    <x-ui-skeleton class="h-4 w-full" />
                    <x-ui-skeleton class="h-4 w-3/4" />
                    <x-ui-skeleton class="h-4 w-1/2" />
                </div>
            </div>

            <!-- Switch -->
            <div class="border border-border rounded-lg p-6">
                <h3 class="text-xl font-semibold mb-4">Switch</h3>
                <div class="flex items-center space-x-2">
                    <x-ui-switch id="airplane-mode" />
                    <x-ui-label for="airplane-mode">Airplane Mode</x-ui-label>
                </div>
            </div>
        </div>
    </section>

    <!-- Table Example -->
    <section class="mb-20">
        <h2 class="text-3xl font-bold text-foreground mb-8">Table Component</h2>
        <div class="border border-border rounded-lg p-6">
            <x-ui-table>
                <x-ui-table-header>
                    <x-ui-table-row>
                        <x-ui-table-head>Name</x-ui-table-head>
                        <x-ui-table-head>Email</x-ui-table-head>
                        <x-ui-table-head>Role</x-ui-table-head>
                        <x-ui-table-head>Status</x-ui-table-head>
                    </x-ui-table-row>
                </x-ui-table-header>
                <x-ui-table-body>
                    <x-ui-table-row>
                        <x-ui-table-cell>John Doe</x-ui-table-cell>
                        <x-ui-table-cell>john@example.com</x-ui-table-cell>
                        <x-ui-table-cell>Admin</x-ui-table-cell>
                        <x-ui-table-cell>
                            <x-ui-badge>Active</x-ui-badge>
                        </x-ui-table-cell>
                    </x-ui-table-row>
                    <x-ui-table-row>
                        <x-ui-table-cell>Jane Smith</x-ui-table-cell>
                        <x-ui-table-cell>jane@example.com</x-ui-table-cell>
                        <x-ui-table-cell>Member</x-ui-table-cell>
                        <x-ui-table-cell>
                            <x-ui-badge variant="secondary">Pending</x-ui-badge>
                        </x-ui-table-cell>
                    </x-ui-table-row>
                </x-ui-table-body>
            </x-ui-table>
        </div>
    </section>

    <!-- Usage Note -->
    <section class="bg-muted/30 rounded-lg p-8 text-center">
        <h2 class="text-2xl font-bold text-foreground mb-4">
            All Components Are Now Global
        </h2>
        <p class="text-muted-foreground mb-4">
            You can use any component on any page without importing or including them.
        </p>
        <p class="text-sm text-muted-foreground">
            Check <code class="bg-muted px-2 py-1 rounded">COMPONENTS_USAGE.md</code> for complete documentation.
        </p>
    </section>
</div>
@endsection
