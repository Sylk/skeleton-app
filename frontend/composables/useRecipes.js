// composables/useRecipes.js
export const useRecipes = () => {
    const config = useRuntimeConfig()
    const baseURL = config.public.apiBase || 'http://localhost:8888/api'

    // Simple helper functions if needed
    const buildRecipeUrl = (slug) => `${baseURL}/recipes/${slug}`
    const buildRecipesUrl = () => `${baseURL}/recipes`

    return {
        buildRecipeUrl,
        buildRecipesUrl,
        baseURL
    }
}
