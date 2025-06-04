<!-- pages/recipes/index.vue -->
<template>
    <div class="min-h-screen bg-gray-50">
        <div class="container mx-auto px-4 py-8">
            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="text-4xl font-bold text-gray-900 mb-4">All Recipes</h1>
                <p class="text-xl text-gray-600">Browse our complete collection of delicious recipes</p>
            </div>

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
                            <span class="ml-4 text-sm font-medium text-gray-500">All Recipes</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Search Link -->
            <div class="mb-8">
                <NuxtLink
                    to="/"
                    class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 transition-colors"
                >
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                    </svg>
                    Search Recipes
                </NuxtLink>
            </div>

            <!-- Loading State -->
            <div v-if="pending" class="text-center py-12">
                <div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-blue-600"></div>
                <p class="mt-2 text-gray-600">Loading recipes...</p>
            </div>

            <!-- Error State -->
            <div v-else-if="error" class="bg-red-50 border border-red-200 rounded-md p-4 mb-6">
                <div class="flex">
                    <svg class="h-5 w-5 text-red-400 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                    </svg>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-red-800">Error loading recipes</h3>
                        <p class="text-sm text-red-700 mt-1">{{ error.message || 'Something went wrong. Please try again.' }}</p>
                    </div>
                </div>
            </div>

            <!-- Results -->
            <div v-else>
                <!-- Results Header -->
                <div v-if="data?.data" class="flex justify-between items-center mb-6">
                    <div class="flex items-center">
                        <h2 class="text-2xl font-semibold text-gray-800">All Recipes</h2>
                        <span class="ml-3 px-3 py-1 bg-blue-100 text-blue-800 text-sm font-medium rounded-full">
              {{ data.meta.total }} {{ data.meta.total === 1 ? 'recipe' : 'recipes' }}
            </span>
                    </div>

                    <!-- Results per page selector -->
                    <div class="flex items-center space-x-2">
                        <label for="perPage" class="text-sm text-gray-600">Show:</label>
                        <select
                            id="perPage"
                            v-model="perPage"
                            @change="handlePerPageChange"
                            class="border border-gray-300 rounded-md px-3 py-1 pr-8 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white appearance-none bg-no-repeat bg-right"
                            style="background-image: url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTIiIGhlaWdodD0iOCIgdmlld0JveD0iMCAwIDEyIDgiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxwYXRoIGQ9Ik0xIDFMNiA2TDExIDEiIHN0cm9rZT0iIzZCNzI4MCIgc3Ryb2tlLXdpZHRoPSIxLjUiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCIvPgo8L3N2Zz4K'); background-position: right 8px center; background-size: 12px 8px;"
                        >
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="50">50</option>
                        </select>
                    </div>
                </div>

                <!-- No Results -->
                <div v-if="data?.data?.length === 0" class="text-center py-12">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">No recipes found</h3>
                    <p class="mt-1 text-sm text-gray-500">There are no recipes in the database yet.</p>
                </div>

                <!-- Recipe Grid -->
                <div v-else-if="data?.data" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                    <RecipeCard
                        v-for="recipe in data.data"
                        :key="recipe.id"
                        :recipe="recipe"
                    />
                </div>

                <!-- Pagination -->
                <RecipePagination
                    v-if="data?.meta && data.meta.last_page > 1"
                    :current-page="data.meta.current_page"
                    :total-pages="data.meta.last_page"
                    :total="data.meta.total"
                    :per-page="data.meta.per_page"
                    @page-change="handlePageChange"
                />
            </div>
        </div>
    </div>
</template>

<script setup>
// SEO
useHead({
    title: 'All Recipes - Recipe Search 3000',
    meta: [
        {
            name: 'description',
            content: 'Browse our complete collection of delicious recipes'
        }
    ]
})

const route = useRoute()
const router = useRouter()

// No search parameters - just get all recipes
const currentPage = ref(parseInt(route.query.page) || 1)
const perPage = ref(parseInt(route.query.per_page) || 10) // Changed default from 12 to 10

// Simple reactive data
const data = ref(null)
const pending = ref(false)
const error = ref(null)

// Function to fetch recipes
const fetchRecipes = async () => {
    try {
        pending.value = true
        error.value = null

        const query = {
            page: currentPage.value,
            per_page: perPage.value
        }

        const response = await $fetch('/api/recipes', {
            baseURL: 'http://localhost:8888',
            query
        })

        data.value = response
    } catch (err) {
        error.value = err
        data.value = null
    } finally {
        pending.value = false
    }
}

// Initial fetch
await fetchRecipes()

// Manual refresh function
const refresh = () => {
    fetchRecipes()
}

const handlePageChange = (page) => {
    currentPage.value = page
    updateURL()
    fetchRecipes()

    // Scroll to top
    window.scrollTo({ top: 0, behavior: 'smooth' })
}

const handlePerPageChange = () => {
    currentPage.value = 1 // Reset to first page when changing per page
    updateURL()
    fetchRecipes()
}

const updateURL = () => {
    const query = {}

    if (currentPage.value > 1) query.page = currentPage.value
    if (perPage.value !== 10) query.per_page = perPage.value

    router.push({ query })
}

// Watch for URL changes
watch(() => route.query, (newQuery) => {
    currentPage.value = parseInt(newQuery.page) || 1
    perPage.value = parseInt(newQuery.per_page) || 10

    // Fetch new data when URL changes
    fetchRecipes()
}, { immediate: false }) // Don't run immediately since we already fetched on mount
</script>
