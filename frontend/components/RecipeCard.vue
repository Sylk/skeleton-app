<template>
    <NuxtLink :to="`/recipes/${recipe.slug}`" class="block group">
        <div class="bg-white rounded-lg shadow-md hover:shadow-xl hover:scale-[1.02] transition-all duration-300 overflow-hidden h-96 flex flex-col cursor-pointer border border-gray-100 hover:border-blue-200">
            <div class="p-6 flex flex-col h-full">

                <!-- Recipe Header -->
                <div class="mb-4">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2 group-hover:text-blue-600 transition-colors">
                        {{ recipe.name }}
                    </h3>

                    <div class="flex items-center text-sm text-gray-500 mb-3">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                        </svg>
                        <span>{{ recipe.author_email }}</span>
                    </div>
                </div>

                <!-- Description -->
                <div class="mb-4 min-h-[4.5rem]">
                    <p class="text-gray-600 line-clamp-3 group-hover:text-gray-700 transition-colors">
                        {{ recipe.description }}
                    </p>
                </div>

                <!-- Flex spacer -->
                <div class="flex-1"></div>

                <!-- Bottom Content -->
                <div>
                    <!-- Ingredients -->
                    <div class="mb-4">
                        <h4 class="text-sm font-medium text-gray-700 mb-2 group-hover:text-gray-800 transition-colors">
                            Key Ingredients:
                        </h4>
                        <div class="flex flex-wrap gap-1">
              <span
                  v-for="(ingredient, index) in displayIngredients"
                  :key="index"
                  class="inline-block bg-gray-100 text-gray-700 text-xs px-2 py-1 rounded-full group-hover:bg-blue-50 group-hover:text-blue-700 transition-colors"
              >
                {{ ingredient }}
              </span>
                            <span
                                v-if="recipe.ingredients.length > maxIngredientsShow"
                                class="inline-block bg-blue-100 text-blue-700 text-xs px-2 py-1 rounded-full group-hover:bg-blue-200 transition-colors"
                            >
                +{{ recipe.ingredients.length - maxIngredientsShow }} more
              </span>
                        </div>
                    </div>

                    <!-- Recipe Stats -->
                    <div class="flex justify-between items-center text-sm text-gray-500 group-hover:text-gray-600 transition-colors">
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-1 group-hover:text-blue-600 transition-colors" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            <span>{{ recipe.ingredients?.length || 0 }} ingredients</span>
                        </div>

                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1 group-hover:text-blue-600 transition-colors">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.362 5.214A8.252 8.252 0 0 1 12 21 8.25 8.25 0 0 1 6.038 7.047 8.287 8.287 0 0 0 9 9.601a8.983 8.983 0 0 1 3.361-6.867 8.21 8.21 0 0 0 3 2.48Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 18a3.75 3.75 0 0 0 .495-7.468 5.99 5.99 0 0 0-1.925 3.547 5.975 5.975 0 0 1-2.133-1.001A3.75 3.75 0 0 0 12 18Z" />
                            </svg>
                            <span>{{ recipe.steps?.length || 0 }} steps</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </NuxtLink>
</template>

<script setup>
const props = defineProps({
    recipe: {
        type: Object,
        required: true
    }
})

const maxIngredientsShow = 4

const displayIngredients = computed(() => {
    return props.recipe.ingredients.slice(0, maxIngredientsShow)
})
</script>

<style scoped>
.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
