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
                            <svg class="w-4 h-4 mr-1 group-hover:text-blue-600 transition-colors" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 217 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z" clip-rule="evenodd"></path>
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
