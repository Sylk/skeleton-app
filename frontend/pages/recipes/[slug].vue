<!-- pages/recipes/[slug].vue -->
<template>
    <div class="min-h-screen bg-gray-50">
        <div class="container mx-auto px-4 py-8">
            <!-- Loading State -->
            <div v-if="pending" class="text-center py-12">
                <div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-blue-600"></div>
                <p class="mt-2 text-gray-600">Loading recipe...</p>
            </div>

            <!-- Error State -->
            <div v-else-if="error" class="max-w-2xl mx-auto">
                <div class="bg-red-50 border border-red-200 rounded-md p-6 text-center">
                    <svg class="mx-auto h-12 w-12 text-red-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 15.5c-.77.833.192 2.5 1.732 2.5z" />
                    </svg>
                    <h1 class="text-2xl font-bold text-gray-900 mb-2">Recipe Not Found</h1>
                    <p class="text-gray-600 mb-6">The recipe you're looking for doesn't exist or may have been removed.</p>
                    <NuxtLink
                        to="/"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 transition-colors"
                    >
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"></path>
                        </svg>
                        Back to Search
                    </NuxtLink>
                </div>
            </div>

            <!-- Recipe Content -->
            <div v-else-if="data && !pending" class="max-w-4xl mx-auto">
                <!-- Breadcrumb -->
                <nav class="flex mb-6" aria-label="Breadcrumb">
                    <ol class="flex items-center space-x-4">
                        <li>
                            <NuxtLink to="/" class="text-gray-400 hover:text-gray-500">
                                <svg class="flex-shrink-0 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                                </svg>
                                <span class="sr-only">Home</span>
                            </NuxtLink>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="flex-shrink-0 h-5 w-5 text-gray-300" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                                <span class="ml-4 text-sm font-medium text-gray-500">{{ data.name }}</span>
                            </div>
                        </li>
                    </ol>
                </nav>

                <!-- Recipe Header -->
                <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                    <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ data.name }}</h1>

                    <div class="flex flex-wrap items-center gap-4 text-sm text-gray-600 mb-6">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="font-medium">Author:</span>
                            <span class="ml-1">{{ data.author_email }}</span>
                        </div>

                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            <span>{{ data.ingredients?.length || 0 }} ingredients</span>
                        </div>

                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z" clip-rule="evenodd"></path>
                            </svg>
                            <span>{{ data.steps?.length || 0 }} steps</span>
                        </div>
                    </div>

                    <p class="text-gray-700 text-lg leading-relaxed">{{ data.description }}</p>
                </div>

                <!-- Recipe Content Grid -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Ingredients -->
                    <div class="lg:col-span-1">
                        <div class="bg-white rounded-lg shadow-md p-6 sticky top-8">
                            <h2 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                Ingredients
                            </h2>

                            <ul class="space-y-3">
                                <li
                                    v-for="(ingredient, index) in data.ingredients || []"
                                    :key="index"
                                    class="flex items-start"
                                >
                                    <input
                                        type="checkbox"
                                        :id="`ingredient-${index}`"
                                        class="mt-1 h-4 w-4 text-green-600 border-gray-300 rounded focus:ring-green-500"
                                    >
                                    <label
                                        :for="`ingredient-${index}`"
                                        class="ml-3 text-gray-700 cursor-pointer"
                                    >
                                        {{ ingredient }}
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Instructions -->
                    <div class="lg:col-span-2">
                        <div class="bg-white rounded-lg shadow-md p-6">
                            <h2 class="text-xl font-semibold text-gray-900 mb-6 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z" clip-rule="evenodd"></path>
                                </svg>
                                Instructions
                            </h2>

                            <ol class="space-y-6">
                                <li
                                    v-for="(step, index) in data.steps || []"
                                    :key="index"
                                    class="flex"
                                >
                                    <div class="flex-shrink-0 w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center text-sm font-semibold mr-4 mt-1">
                                        {{ index + 1 }}
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-gray-700 leading-relaxed">{{ step }}</p>
                                    </div>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>

                <!-- Back to Search Button -->
                <div class="mt-8 text-center">
                    <NuxtLink
                        to="/"
                        class="inline-flex items-center px-6 py-3 bg-gray-600 text-white font-medium rounded-md hover:bg-gray-700 transition-colors"
                    >
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"></path>
                        </svg>
                        Back to Recipe Search
                    </NuxtLink>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
const route = useRoute()

// Fetch recipe data directly with useFetch
const { data: response, pending, error } = await useFetch(`/api/recipes/${route.params.slug}`, {
    baseURL: 'http://localhost:8888',
    key: `recipe-${route.params.slug}`
})

// Extract the recipe data from the response
const data = computed(() => response.value?.data)

// SEO
useHead(() => ({
    title: data.value?.name ? `${data.value.name} - Recipe Search 3000` : 'Recipe Not Found',
    meta: [
        {
            name: 'description',
            content: data.value?.description || 'Recipe not found'
        }
    ]
}))

// Handle errors
if (error.value) {
    throw createError({
        statusCode: error.value.statusCode || 404,
        statusMessage: 'Recipe Not Found'
    })
}
</script>
