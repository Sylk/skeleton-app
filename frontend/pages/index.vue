<template>
    <div class="min-h-screen bg-gray-50">
        <div class="container mx-auto px-4 py-8">
            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="text-4xl font-bold text-gray-900 mb-4">Recipe Search 3000</h1>
                <p class="text-xl text-gray-600">Discover delicious recipes by ingredients, keywords, or author</p>
            </div>

            <!-- Search Form -->
            <SearchForm @search="handleSearch" />

            <!-- Loading State -->
            <div v-if="isLoading" class="text-center py-12">
                <div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-blue-600"></div>
                <p class="mt-2 text-gray-600">Searching recipes...</p>
            </div>

            <!-- Error State -->
            <div v-else-if="hasError" class="bg-red-50 border border-red-200 rounded-md p-4 mb-6">
                <div class="flex">
                    <svg class="h-5 w-5 text-red-400 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                    </svg>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-red-800">Error loading recipes</h3>
                        <p class="text-sm text-red-700 mt-1">Something went wrong. Please try again.</p>
                        <button
                            @click="loadRecipes"
                            class="mt-2 text-sm text-red-800 underline hover:text-red-900"
                        >
                            Retry
                        </button>
                    </div>
                </div>
            </div>

            <!-- Results -->
            <div v-else-if="recipes">

                <!-- Results Header -->
                <div class="flex justify-between items-center mb-6">
                    <div class="flex items-center">
                        <h2 class="text-2xl font-semibold text-gray-800">
                            {{ hasActiveSearch ? 'Search Results' : 'All Recipes' }}
                        </h2>
                        <span class="ml-3 px-3 py-1 bg-blue-100 text-blue-800 text-sm font-medium rounded-full">
              {{ recipes.meta.total }} {{ recipes.meta.total === 1 ? 'recipe' : 'recipes' }}
            </span>
                    </div>

                    <!-- Results per page selector -->
                    <div class="flex items-center space-x-2">
                        <label for="perPage" class="text-sm text-gray-600">Show:</label>
                        <select
                            id="perPage"
                            v-model="perPage"
                            @change="handlePerPageChange"
                            class="form-select"
                        >
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="50">50</option>
                        </select>
                    </div>
                </div>

                <!-- No Results -->
                <div v-if="recipes.data.length === 0" class="text-center py-12">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">No recipes found</h3>
                    <p class="mt-1 text-sm text-gray-500">Try adjusting your search criteria to find what you're looking for.</p>
                </div>

                <!-- Recipe Grid -->
                <div v-else class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                    <RecipeCard
                        v-for="recipe in recipes.data"
                        :key="recipe.id"
                        :recipe="recipe"
                    />
                </div>

                <!-- Pagination -->
                <RecipePagination
                    v-if="recipes.meta.last_page > 1"
                    :current-page="recipes.meta.current_page"
                    :total-pages="recipes.meta.last_page"
                    :total="recipes.meta.total"
                    :per-page="recipes.meta.per_page"
                    @page-change="handlePageChange"
                />
            </div>
        </div>
    </div>
</template>

<script setup>
// SEO
useHead({
    title: 'Recipe Search 3000',
    meta: [
        {
            name: 'description',
            content: 'Search and discover delicious recipes by ingredients, keywords, or author. Find your next favorite meal!'
        }
    ]
})

// Router and route
const route = useRoute()
const router = useRouter()

// Reactive state
const recipes = ref(null)
const isLoading = ref(true)
const hasError = ref(false)

// Search parameters from URL
const searchParams = reactive({
    author_email: route.query.author_email || '',
    keyword: route.query.keyword || '',
    ingredient: route.query.ingredient || ''
})

// Pagination state
const currentPage = ref(parseInt(route.query.page) || 1)
const perPage = ref(parseInt(route.query.per_page) || 10)

// Computed properties
const hasActiveSearch = computed(() => {
    return !!(searchParams.author_email || searchParams.keyword || searchParams.ingredient)
})

// Load recipes function
const loadRecipes = async () => {
    try {
        isLoading.value = true
        hasError.value = false

        // Build query parameters
        const query = {
            page: currentPage.value,
            per_page: perPage.value
        }

        // Add search parameters if they exist
        if (searchParams.author_email) query.author_email = searchParams.author_email
        if (searchParams.keyword) query.keyword = searchParams.keyword
        if (searchParams.ingredient) query.ingredient = searchParams.ingredient

        // Fetch data
        const response = await $fetch('/api/recipes', {
            baseURL: 'http://localhost:8888',
            query
        })

        recipes.value = response
    } catch (error) {
        console.warn('Failed to load recipes:', error)
        hasError.value = true
        recipes.value = null
    } finally {
        isLoading.value = false
    }
}

// Event handlers
const handleSearch = (newSearchParams) => {
    // Update search parameters
    Object.assign(searchParams, newSearchParams)

    // Reset to first page
    currentPage.value = 1

    // Update URL and load recipes
    updateURL()
    loadRecipes()
}

const handlePageChange = (page) => {
    currentPage.value = page
    updateURL()
    loadRecipes()

    // Scroll to top smoothly
    window.scrollTo({ top: 0, behavior: 'smooth' })
}

const handlePerPageChange = () => {
    currentPage.value = 1
    updateURL()
    loadRecipes()
}

// URL management
const updateURL = () => {
    const query = {}

    // Add search parameters
    if (searchParams.author_email) query.author_email = searchParams.author_email
    if (searchParams.keyword) query.keyword = searchParams.keyword
    if (searchParams.ingredient) query.ingredient = searchParams.ingredient

    // Add pagination parameters
    if (currentPage.value > 1) query.page = currentPage.value
    if (perPage.value !== 10) query.per_page = perPage.value

    // Update URL without navigation
    router.push({ query })
}

// Initialize search parameters from URL
const initializeFromURL = () => {
    searchParams.author_email = route.query.author_email || ''
    searchParams.keyword = route.query.keyword || ''
    searchParams.ingredient = route.query.ingredient || ''
    currentPage.value = parseInt(route.query.page) || 1
    perPage.value = parseInt(route.query.per_page) || 10
}

// Watch for URL changes (browser back/forward)
watch(() => route.query, () => {
    initializeFromURL()
    loadRecipes()
}, { deep: true })

// Initial load
onMounted(() => {
    initializeFromURL()
    loadRecipes()
})
</script>
