<template>
    <div class="min-h-screen bg-gray-50">

        <!-- Loading State -->
        <div v-if="isLoading" class="flex items-center justify-center min-h-screen">
            <div class="text-center">
                <div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-blue-600"></div>
                <p class="mt-2 text-gray-600">Loading recipe...</p>
            </div>
        </div>

        <!-- Error State -->
        <div v-else-if="hasError" class="flex items-center justify-center min-h-screen">
            <div class="max-w-md mx-auto text-center">
                <div class="bg-red-50 border border-red-200 rounded-md p-6">
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
        </div>

        <!-- Recipe Content -->
        <div v-else-if="recipe" class="container mx-auto px-4 py-8">

            <!-- Breadcrumb -->
            <nav class="flex mb-6" aria-label="Breadcrumb">
                <ol class="flex items-center space-x-4">
                    <li>
                        <NuxtLink to="/" class="text-gray-400 hover:text-gray-500 transition-colors">
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
                            <span class="ml-4 text-sm font-medium text-gray-500 truncate">{{ recipe.name }}</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Recipe Header -->
            <div class="bg-white rounded-lg shadow-md p-8 mb-8">
                <h1 class="text-4xl font-bold text-gray-900 mb-4">{{ recipe.name }}</h1>

                <div class="flex flex-wrap items-center gap-6 text-sm text-gray-600 mb-6">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="font-medium">Author:</span>
                        <span class="ml-1">{{ recipe.author_email }}</span>
                    </div>

                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                        </svg>
                        <span>{{ recipe.ingredients.length }} ingredients</span>
                    </div>

                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="w-5 h-5 mr-2 text-orange-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.362 5.214A8.252 8.252 0 0 1 12 21 8.25 8.25 0 0 1 6.038 7.047 8.287 8.287 0 0 0 9 9.601a8.983 8.983 0 0 1 3.361-6.867 8.21 8.21 0 0 0 3 2.48Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 18a3.75 3.75 0 0 0 .495-7.468 5.99 5.99 0 0 0-1.925 3.547 5.975 5.975 0 0 1-2.133-1.001A3.75 3.75 0 0 0 12 18Z" />
                        </svg>
                        <span>{{ recipe.steps.length }} steps</span>
                    </div>
                </div>

                <p class="text-gray-700 text-lg leading-relaxed">{{ recipe.description }}</p>
            </div>

            <!-- Recipe Content Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <!-- Ingredients Sidebar -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-lg shadow-md p-6 sticky top-8">
                        <h2 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                            <svg class="w-6 h-6 mr-2 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            Ingredients
                        </h2>

                        <ul class="space-y-3">
                            <li
                                v-for="(ingredient, index) in recipe.ingredients"
                                :key="index"
                                class="flex items-start group"
                            >
                                <input
                                    type="checkbox"
                                    :id="`ingredient-${index}`"
                                    v-model="completedIngredients[index]"
                                    class="mt-1 h-4 w-4 text-green-600 border-gray-300 rounded focus:ring-green-500"
                                >
                                <label
                                    :for="`ingredient-${index}`"
                                    class="ml-3 cursor-pointer leading-relaxed transition-all duration-200"
                                    :class="completedIngredients[index]
                    ? 'text-gray-500 line-through'
                    : 'text-gray-700 group-hover:text-gray-900'"
                                >
                                    {{ ingredient }}
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Instructions Main Content -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h2 class="text-xl font-semibold text-gray-900 mb-6 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="w-7 h-7 mr-2 text-orange-600">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.362 5.214A8.252 8.252 0 0 1 12 21 8.25 8.25 0 0 1 6.038 7.047 8.287 8.287 0 0 0 9 9.601a8.983 8.983 0 0 1 3.361-6.867 8.21 8.21 0 0 0 3 2.48Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 18a3.75 3.75 0 0 0 .495-7.468 5.99 5.99 0 0 0-1.925 3.547 5.975 5.975 0 0 1-2.133-1.001A3.75 3.75 0 0 0 12 18Z" />
                            </svg>
                            Instructions
                        </h2>

                        <ol class="space-y-6">
                            <li
                                v-for="(step, index) in recipe.steps"
                                :key="index"
                                class="flex group"
                            >
                                <div class="flex-shrink-0 w-8 h-8 bg-orange-600 text-white rounded-full flex items-center justify-center text-sm font-semibold mr-4 mt-1 group-hover:bg-orange-700 transition-colors">
                                    {{ index + 1 }}
                                </div>
                                <div class="flex-1 flex items-start">
                                    <input
                                        type="checkbox"
                                        :id="`step-${index}`"
                                        v-model="completedSteps[index]"
                                        class="mt-2 h-4 w-4 text-orange-600 border-gray-300 rounded focus:ring-orange-500 mr-3"
                                    >
                                    <label
                                        :for="`step-${index}`"
                                        class="cursor-pointer leading-relaxed transition-all duration-200"
                                        :class="completedSteps[index]
                      ? 'text-gray-500 line-through'
                      : 'text-gray-700 group-hover:text-gray-900'"
                                    >
                                        {{ step }}
                                    </label>
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
</template>

<script setup>
// Get the recipe slug from the route
const route = useRoute()
const slug = route.params.slug

// Reactive state
const recipe = ref(null)
const isLoading = ref(true)
const hasError = ref(false)

// Checkbox states for ingredients and steps
const completedIngredients = ref({})
const completedSteps = ref({})

// Load recipe function
const loadRecipe = async () => {
    try {
        isLoading.value = true
        hasError.value = false

        const response = await $fetch(`/api/recipes/${slug}`, {
            baseURL: 'http://localhost:8888'
        })

        recipe.value = response.data
    } catch (error) {
        console.warn('Failed to load recipe:', error)
        hasError.value = true

        // Handle 404 specifically for better UX
        if (error.status === 404 || error.statusCode === 404) {
            throw createError({
                statusCode: 404,
                statusMessage: 'Recipe Not Found'
            })
        }
    } finally {
        isLoading.value = false
    }
}

// Dynamic SEO based on recipe data
const pageTitle = computed(() =>
    recipe.value ? `${recipe.value.name} - Recipe Search 3000` : 'Recipe - Recipe Search 3000'
)

const pageDescription = computed(() =>
    recipe.value ? recipe.value.description : 'View recipe details and cooking instructions'
)

// Set up head with reactive data
useHead(() => ({
    title: pageTitle.value,
    meta: [
        {
            name: 'description',
            content: pageDescription.value
        },
        {
            property: 'og:title',
            content: pageTitle.value
        },
        {
            property: 'og:description',
            content: pageDescription.value
        }
    ]
}))

// Load recipe on mount
onMounted(() => {
    loadRecipe()
})
</script>
