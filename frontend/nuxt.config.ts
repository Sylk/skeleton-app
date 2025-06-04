// nuxt.config.ts
export default defineNuxtConfig({
    devtools: {
      enabled: true,

      timeline: {
        enabled: true
      }
    },

    // CSS Framework
    css: ['~/assets/css/main.css'],

    // Runtime Configuration
    runtimeConfig: {
        public: {
            apiBase: process.env.NUXT_PUBLIC_API_BASE || 'http://localhost:8888/api'
        }
    },

    // Auto-import components
    components: true,

    // SEO & Meta
    app: {
        head: {
            title: 'Recipe Search 3000',
            meta: [
                { charset: 'utf-8' },
                { name: 'viewport', content: 'width=device-width, initial-scale=1' },
                {
                    name: 'description',
                    content: 'Search and discover delicious recipes by ingredients, keywords, or author'
                }
            ],
            link: [
                { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' }
            ]
        }
    },

    // PostCSS for Tailwind
    postcss: {
        plugins: {
            tailwindcss: {},
            autoprefixer: {},
        },
    },

    // SSR Configuration
    ssr: true,

    // Nitro Configuration for API proxy (optional)
    nitro: {
        devProxy: {
            '/api': {
                target: 'http://localhost:8888/api',
                changeOrigin: true
            }
        }
    }
})