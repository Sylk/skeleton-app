<!-- components/SearchForm.vue -->
<template>
    <div class="bg-white rounded-lg shadow-md p-6 mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Search Recipes</h2>

        <form @submit.prevent="handleSubmit" class="space-y-4">
            <!-- Author Email Search -->
            <div>
                <label for="author_email" class="block text-sm font-medium text-gray-700 mb-2">
                    Author Email
                </label>
                <input
                    id="author_email"
                    v-model="searchForm.author_email"
                    type="email"
                    placeholder="chef@example.com"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                />
                <p class="text-xs text-gray-500 mt-1">Search for recipes by exact author email</p>
            </div>

            <!-- Keyword Search -->
            <div>
                <label for="keyword" class="block text-sm font-medium text-gray-700 mb-2">
                    Keyword
                </label>
                <input
                    id="keyword"
                    v-model="searchForm.keyword"
                    type="text"
                    placeholder="salmon, honey, delicious..."
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                />
                <p class="text-xs text-gray-500 mt-1">Search in recipe name, description, ingredients, and steps</p>
            </div>

            <!-- Ingredient Search -->
            <div>
                <label for="ingredient" class="block text-sm font-medium text-gray-700 mb-2">
                    Ingredient
                </label>
                <input
                    id="ingredient"
                    v-model="searchForm.ingredient"
                    type="text"
                    placeholder="potato, chicken, cheese..."
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                />
                <p class="text-xs text-gray-500 mt-1">Search for specific ingredients (partial matches allowed)</p>
            </div>

            <!-- Search Actions -->
            <div class="flex gap-3 pt-4">
                <button
                    type="submit"
                    class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors"
                >
                    Search Recipes
                </button>

                <button
                    type="button"
                    @click="clearForm"
                    class="bg-gray-500 text-white px-6 py-2 rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-colors"
                >
                    Clear
                </button>
            </div>

            <!-- Active Filters Display -->
            <div v-if="hasActiveFilters" class="pt-4 border-t border-gray-200">
                <p class="text-sm font-medium text-gray-700 mb-2">Active Filters:</p>
                <div class="flex flex-wrap gap-2">
          <span
              v-if="searchForm.author_email"
              class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800"
          >
            Author: {{ searchForm.author_email }}
            <button
                @click="searchForm.author_email = ''"
                class="ml-2 text-blue-600 hover:text-blue-800"
            >
              ×
            </button>
          </span>

                    <span
                        v-if="searchForm.keyword"
                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800"
                    >
            Keyword: {{ searchForm.keyword }}
            <button
                @click="searchForm.keyword = ''"
                class="ml-2 text-green-600 hover:text-green-800"
            >
              ×
            </button>
          </span>

                    <span
                        v-if="searchForm.ingredient"
                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800"
                    >
            Ingredient: {{ searchForm.ingredient }}
            <button
                @click="searchForm.ingredient = ''"
                class="ml-2 text-yellow-600 hover:text-yellow-800"
            >
              ×
            </button>
          </span>
                </div>
            </div>
        </form>
    </div>
</template>

<script setup>
const emit = defineEmits(['search'])

const searchForm = reactive({
    author_email: '',
    keyword: '',
    ingredient: ''
})

const hasActiveFilters = computed(() => {
    return searchForm.author_email || searchForm.keyword || searchForm.ingredient
})

// Initialize from URL parameters if present
onMounted(() => {
    const route = useRoute()
    if (route.query.author_email) searchForm.author_email = route.query.author_email
    if (route.query.keyword) searchForm.keyword = route.query.keyword
    if (route.query.ingredient) searchForm.ingredient = route.query.ingredient
})

const handleSubmit = () => {
    // Update URL with search parameters
    const router = useRouter()
    const query = {}

    if (searchForm.author_email) query.author_email = searchForm.author_email
    if (searchForm.keyword) query.keyword = searchForm.keyword
    if (searchForm.ingredient) query.ingredient = searchForm.ingredient

    router.push({ query })

    // Emit search event
    emit('search', { ...searchForm })
}

const clearForm = () => {
    searchForm.author_email = ''
    searchForm.keyword = ''
    searchForm.ingredient = ''

    // Clear URL parameters
    const router = useRouter()
    router.push({ query: {} })

    // Emit search with empty parameters
    emit('search', { ...searchForm })
}

// Watch for changes in URL parameters
watch(() => useRoute().query, (newQuery) => {
    searchForm.author_email = newQuery.author_email || ''
    searchForm.keyword = newQuery.keyword || ''
    searchForm.ingredient = newQuery.ingredient || ''
}, { immediate: true })
</script>
