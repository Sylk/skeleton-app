<!-- app.vue -->
<template>
    <div>
        <!-- Navigation Header -->
        <nav class="bg-white shadow-sm border-b border-gray-200">
            <div class="container mx-auto px-4">
                <div class="flex justify-between items-center h-16">
                    <!-- Logo/Brand -->
                    <div class="flex items-center">
                        <NuxtLink to="/" class="flex items-center space-x-2">
                            <span class="text-xl font-bold text-gray-900">Recipe Search 3000</span>
                        </NuxtLink>
                    </div>

                    <!-- Navigation Links -->
                    <div class="flex items-center space-x-6">
                        <NuxtLink
                            to="/"
                            class="text-gray-600 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium transition-colors"
                            :class="{ 'text-blue-600 bg-blue-50': $route.path === '/' }"
                        >
                            Search
                        </NuxtLink>
                        <NuxtLink
                            to="/recipes"
                            class="text-gray-600 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium transition-colors"
                            :class="{ 'text-blue-600 bg-blue-50': $route.path === '/recipes' }"
                        >
                            All Recipes
                        </NuxtLink>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main>
            <NuxtPage />
        </main>

        <!-- Footer -->
        <footer class="bg-gray-800 text-white py-8 mt-16">
            <div class="container mx-auto px-4 text-center">
                <p>&copy; 2024 Recipe Search 3000. Built with Laravel & Nuxt 3.</p>
            </div>
        </footer>
    </div>
</template>

<script setup>
// Any app-level logic can go here
</script>

<style>
/* Global styles can go here if needed */
</style>
