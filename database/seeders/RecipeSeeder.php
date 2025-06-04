<?php

namespace Database\Seeders;

use App\Models\Recipe;
use Illuminate\Database\Seeder;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $recipes = [
            [
                'name' => 'Honey Glazed Salmon',
                'description' => 'A delicious and healthy salmon dish with a sweet honey glaze that\'s perfect for dinner.',
                'ingredients' => [
                    '4 salmon fillets',
                    '3 tablespoons honey',
                    '2 cloves garlic, minced',
                    '2 tablespoons soy sauce',
                    '1 tablespoon olive oil',
                    '1 lemon, sliced',
                    'Salt and pepper to taste'
                ],
                'steps' => [
                    'Preheat oven to 400°F (200°C).',
                    'Mix honey, garlic, soy sauce, and olive oil in a bowl.',
                    'Season salmon fillets with salt and pepper.',
                    'Place salmon on a baking sheet lined with parchment paper.',
                    'Brush honey mixture over salmon fillets.',
                    'Top with lemon slices.',
                    'Bake for 12-15 minutes until salmon flakes easily.',
                    'Serve immediately.'
                ],
                'author_email' => 'chef@example.com'
            ],
            [
                'name' => 'Creamy Potato Scallop Gratin',
                'description' => 'Rich and creamy potato gratin with tender scallops - a luxurious side dish or main course.',
                'ingredients' => [
                    '2 lbs potatoes, thinly sliced',
                    '1 lb sea scallops',
                    '2 cups heavy cream',
                    '1 cup gruyere cheese, grated',
                    '3 cloves garlic, minced',
                    '2 tablespoons butter',
                    '1 onion, thinly sliced',
                    'Fresh thyme',
                    'Salt and white pepper'
                ],
                'steps' => [
                    'Preheat oven to 375°F (190°C).',
                    'Butter a large baking dish.',
                    'Layer half the sliced potatoes in the dish.',
                    'Sear scallops in a hot pan for 2 minutes per side.',
                    'Arrange scallops over potato layer.',
                    'Add remaining potato slices on top.',
                    'Heat cream with garlic and thyme, season with salt and pepper.',
                    'Pour cream mixture over potatoes.',
                    'Top with grated cheese.',
                    'Bake for 45-50 minutes until golden and bubbly.',
                    'Let rest for 10 minutes before serving.'
                ],
                'author_email' => 'chef@example.com'
            ],
            [
                'name' => 'Classic Beef Stew',
                'description' => 'Hearty and comforting beef stew with tender vegetables in a rich, savory broth.',
                'ingredients' => [
                    '2 lbs beef chuck, cubed',
                    '4 large potatoes, chunked',
                    '3 carrots, sliced',
                    '2 celery stalks, chopped',
                    '1 large onion, diced',
                    '3 cloves garlic, minced',
                    '4 cups beef broth',
                    '2 tablespoons tomato paste',
                    '2 bay leaves',
                    'Fresh thyme',
                    'Salt and pepper'
                ],
                'steps' => [
                    'Season beef cubes with salt and pepper.',
                    'Brown beef in a large pot over medium-high heat.',
                    'Remove beef and sauté onions until translucent.',
                    'Add garlic and cook for 1 minute.',
                    'Stir in tomato paste and cook for 2 minutes.',
                    'Return beef to pot and add broth, bay leaves, and thyme.',
                    'Bring to a boil, then reduce heat and simmer for 1 hour.',
                    'Add potatoes, carrots, and celery.',
                    'Continue simmering for 30-40 minutes until vegetables are tender.',
                    'Remove bay leaves and adjust seasoning.',
                    'Serve hot with crusty bread.'
                ],
                'author_email' => 'home.cook@gmail.com'
            ],
            [
                'name' => 'Mediterranean Chickpea Salad',
                'description' => 'Fresh and healthy Mediterranean-inspired chickpea salad perfect for lunch or as a side dish.',
                'ingredients' => [
                    '2 cans chickpeas, drained and rinsed',
                    '1 cucumber, diced',
                    '2 tomatoes, chopped',
                    '1/2 red onion, finely diced',
                    '1/2 cup kalamata olives, pitted',
                    '1/2 cup feta cheese, crumbled',
                    '1/4 cup olive oil',
                    '2 tablespoons lemon juice',
                    '2 tablespoons fresh parsley, chopped',
                    '1 tablespoon fresh oregano',
                    'Salt and pepper to taste'
                ],
                'steps' => [
                    'In a large bowl, combine chickpeas, cucumber, tomatoes, and red onion.',
                    'Add olives and feta cheese.',
                    'In a small bowl, whisk together olive oil, lemon juice, parsley, and oregano.',
                    'Pour dressing over salad and toss gently.',
                    'Season with salt and pepper.',
                    'Refrigerate for at least 30 minutes before serving.',
                    'Serve chilled or at room temperature.'
                ],
                'author_email' => 'healthy.chef@outlook.com'
            ],
            [
                'name' => 'Chocolate Chip Cookies',
                'description' => 'Classic homemade chocolate chip cookies that are crispy on the outside and chewy on the inside.',
                'ingredients' => [
                    '2 1/4 cups all-purpose flour',
                    '1 cup butter, softened',
                    '3/4 cup brown sugar',
                    '1/2 cup white sugar',
                    '2 large eggs',
                    '2 teaspoons vanilla extract',
                    '1 teaspoon baking soda',
                    '1 teaspoon salt',
                    '2 cups chocolate chips'
                ],
                'steps' => [
                    'Preheat oven to 375°F (190°C).',
                    'Cream together butter and both sugars until fluffy.',
                    'Beat in eggs one at a time, then vanilla.',
                    'In a separate bowl, whisk together flour, baking soda, and salt.',
                    'Gradually mix dry ingredients into wet ingredients.',
                    'Stir in chocolate chips.',
                    'Drop rounded tablespoons of dough onto ungreased baking sheets.',
                    'Bake for 9-11 minutes until golden brown.',
                    'Cool on baking sheet for 5 minutes before transferring to wire rack.',
                    'Enjoy warm or store in airtight container.'
                ],
                'author_email' => 'baker@sweetreats.com'
            ],
            [
                'name' => 'Thai Green Curry Chicken',
                'description' => 'Aromatic and spicy Thai green curry with tender chicken and vegetables in coconut milk.',
                'ingredients' => [
                    '1 lb chicken breast, sliced',
                    '2 tablespoons green curry paste',
                    '1 can coconut milk',
                    '1 eggplant, cubed',
                    '1 bell pepper, sliced',
                    '1 onion, sliced',
                    '2 tablespoons fish sauce',
                    '1 tablespoon brown sugar',
                    'Thai basil leaves',
                    'Jasmine rice for serving'
                ],
                'steps' => [
                    'Heat oil in a large pan over medium-high heat.',
                    'Add curry paste and cook for 1 minute until fragrant.',
                    'Add chicken and cook until no longer pink.',
                    'Pour in coconut milk and bring to a simmer.',
                    'Add eggplant, bell pepper, and onion.',
                    'Season with fish sauce and brown sugar.',
                    'Simmer for 15-20 minutes until vegetables are tender.',
                    'Stir in fresh basil leaves.',
                    'Serve over jasmine rice.'
                ],
                'author_email' => 'thai.chef@spicekitchen.com'
            ],
            [
                'name' => 'Margherita Pizza',
                'description' => 'Classic Italian pizza with fresh mozzarella, tomatoes, and basil on homemade dough.',
                'ingredients' => [
                    '1 pizza dough ball',
                    '1/2 cup pizza sauce',
                    '8 oz fresh mozzarella, sliced',
                    '2 large tomatoes, sliced',
                    'Fresh basil leaves',
                    '2 tablespoons olive oil',
                    'Salt and pepper',
                    'Parmesan cheese, grated'
                ],
                'steps' => [
                    'Preheat oven to 475°F (245°C).',
                    'Roll out pizza dough on a floured surface.',
                    'Transfer to a pizza stone or baking sheet.',
                    'Spread pizza sauce evenly over dough.',
                    'Arrange mozzarella and tomato slices on top.',
                    'Drizzle with olive oil and season with salt and pepper.',
                    'Bake for 12-15 minutes until crust is golden.',
                    'Top with fresh basil and Parmesan.',
                    'Slice and serve immediately.'
                ],
                'author_email' => 'italian.chef@pizzeria.com'
            ],
            [
                'name' => 'Caesar Salad',
                'description' => 'Crisp romaine lettuce with creamy Caesar dressing, croutons, and Parmesan cheese.',
                'ingredients' => [
                    '2 heads romaine lettuce, chopped',
                    '1/2 cup Caesar dressing',
                    '1 cup croutons',
                    '1/2 cup Parmesan cheese, grated',
                    '2 tablespoons lemon juice',
                    '2 cloves garlic, minced',
                    'Black pepper',
                    'Anchovy fillets (optional)'
                ],
                'steps' => [
                    'Wash and dry romaine lettuce thoroughly.',
                    'Chop lettuce into bite-sized pieces.',
                    'In a large bowl, toss lettuce with Caesar dressing.',
                    'Add croutons and toss gently.',
                    'Sprinkle with Parmesan cheese.',
                    'Season with black pepper.',
                    'Serve immediately with lemon wedges.'
                ],
                'author_email' => 'salad.master@freshgreens.com'
            ],
            [
                'name' => 'Beef Tacos',
                'description' => 'Seasoned ground beef tacos with fresh toppings and warm tortillas.',
                'ingredients' => [
                    '1 lb ground beef',
                    '1 packet taco seasoning',
                    '8 taco shells',
                    '1 cup lettuce, shredded',
                    '1 cup cheddar cheese, shredded',
                    '2 tomatoes, diced',
                    '1/2 cup sour cream',
                    '1/4 cup salsa',
                    'Hot sauce to taste'
                ],
                'steps' => [
                    'Brown ground beef in a large skillet.',
                    'Drain excess fat.',
                    'Add taco seasoning and water according to package directions.',
                    'Simmer for 5 minutes.',
                    'Warm taco shells in oven.',
                    'Fill shells with seasoned beef.',
                    'Top with lettuce, cheese, tomatoes, sour cream, and salsa.',
                    'Serve with hot sauce on the side.'
                ],
                'author_email' => 'mexican.chef@tacotime.com'
            ],
            [
                'name' => 'Chicken Parmesan',
                'description' => 'Breaded chicken breast topped with marinara sauce and melted cheese.',
                'ingredients' => [
                    '4 chicken breasts, pounded thin',
                    '1 cup breadcrumbs',
                    '1/2 cup Parmesan cheese, grated',
                    '2 eggs, beaten',
                    '1 cup flour',
                    '2 cups marinara sauce',
                    '1 cup mozzarella cheese, shredded',
                    'Olive oil for frying',
                    'Italian seasoning'
                ],
                'steps' => [
                    'Set up breading station with flour, eggs, and breadcrumb mixture.',
                    'Season chicken with salt and pepper.',
                    'Dredge chicken in flour, then egg, then breadcrumbs.',
                    'Heat oil in a large skillet.',
                    'Fry chicken until golden brown on both sides.',
                    'Transfer to baking dish and top with marinara sauce.',
                    'Sprinkle with mozzarella cheese.',
                    'Bake at 350°F for 20 minutes until cheese melts.',
                    'Serve with pasta or salad.'
                ],
                'author_email' => 'italian.chef@pizzeria.com'
            ],
            [
                'name' => 'Mushroom Risotto',
                'description' => 'Creamy arborio rice with mixed mushrooms and Parmesan cheese.',
                'ingredients' => [
                    '1 1/2 cups arborio rice',
                    '4 cups chicken broth, warmed',
                    '1 lb mixed mushrooms, sliced',
                    '1 onion, diced',
                    '3 cloves garlic, minced',
                    '1/2 cup white wine',
                    '1/2 cup Parmesan cheese, grated',
                    '3 tablespoons butter',
                    'Fresh thyme'
                ],
                'steps' => [
                    'Sauté mushrooms in butter until golden, set aside.',
                    'In same pan, cook onion until translucent.',
                    'Add garlic and rice, stirring for 2 minutes.',
                    'Pour in wine and stir until absorbed.',
                    'Add warm broth one ladle at a time, stirring constantly.',
                    'Continue until rice is creamy and tender, about 20 minutes.',
                    'Stir in mushrooms, Parmesan, and thyme.',
                    'Season with salt and pepper.',
                    'Serve immediately.'
                ],
                'author_email' => 'italian.chef@risotteria.com'
            ],
            [
                'name' => 'Fish and Chips',
                'description' => 'Beer-battered fish with crispy chips and mushy peas.',
                'ingredients' => [
                    '4 white fish fillets',
                    '2 cups flour',
                    '1 cup beer',
                    '4 large potatoes, cut into chips',
                    '1 cup frozen peas',
                    'Vegetable oil for frying',
                    'Salt and vinegar',
                    'Lemon wedges'
                ],
                'steps' => [
                    'Cut potatoes into thick chips and soak in cold water.',
                    'Make batter by mixing flour and beer until smooth.',
                    'Heat oil to 350°F in a deep fryer.',
                    'Fry chips until golden, remove and drain.',
                    'Dip fish in batter and fry until golden.',
                    'Cook peas and mash lightly for mushy peas.',
                    'Serve fish and chips with mushy peas.',
                    'Garnish with lemon wedges and season with salt and vinegar.'
                ],
                'author_email' => 'british.chef@pubfood.co.uk'
            ],
            [
                'name' => 'Pad Thai',
                'description' => 'Traditional Thai stir-fried noodles with shrimp, tofu, and bean sprouts.',
                'ingredients' => [
                    '8 oz rice noodles',
                    '1/2 lb shrimp, peeled',
                    '4 oz firm tofu, cubed',
                    '2 eggs',
                    '1 cup bean sprouts',
                    '3 green onions, chopped',
                    '1/4 cup tamarind paste',
                    '3 tablespoons fish sauce',
                    '2 tablespoons brown sugar',
                    'Crushed peanuts and lime wedges'
                ],
                'steps' => [
                    'Soak rice noodles in warm water until soft.',
                    'Heat oil in a large wok or pan.',
                    'Add shrimp and tofu, cook until shrimp is pink.',
                    'Push to one side and scramble eggs.',
                    'Add drained noodles and sauce ingredients.',
                    'Toss everything together for 2-3 minutes.',
                    'Add bean sprouts and green onions.',
                    'Serve with crushed peanuts and lime wedges.'
                ],
                'author_email' => 'thai.chef@streetfood.com'
            ],
            [
                'name' => 'French Onion Soup',
                'description' => 'Rich beef broth with caramelized onions topped with cheese and crusty bread.',
                'ingredients' => [
                    '6 large onions, thinly sliced',
                    '4 tablespoons butter',
                    '6 cups beef broth',
                    '1/2 cup dry white wine',
                    '6 slices French bread',
                    '1 1/2 cups Gruyere cheese, grated',
                    'Fresh thyme',
                    'Salt and pepper'
                ],
                'steps' => [
                    'Melt butter in a large pot over medium heat.',
                    'Add onions and cook slowly for 45 minutes until caramelized.',
                    'Add wine and cook for 2 minutes.',
                    'Pour in beef broth and simmer for 30 minutes.',
                    'Season with salt, pepper, and thyme.',
                    'Ladle soup into oven-safe bowls.',
                    'Top with bread slices and cheese.',
                    'Broil until cheese is bubbly and golden.',
                    'Serve immediately.'
                ],
                'author_email' => 'french.chef@bistro.fr'
            ],
            [
                'name' => 'Greek Moussaka',
                'description' => 'Layered casserole with eggplant, meat sauce, and creamy béchamel topping.',
                'ingredients' => [
                    '2 large eggplants, sliced',
                    '1 lb ground lamb',
                    '1 onion, diced',
                    '2 cloves garlic, minced',
                    '1 can diced tomatoes',
                    '1/2 cup red wine',
                    '3 cups béchamel sauce',
                    '1/2 cup Parmesan cheese',
                    'Olive oil',
                    'Cinnamon and oregano'
                ],
                'steps' => [
                    'Salt eggplant slices and let drain for 30 minutes.',
                    'Brush with olive oil and grill until tender.',
                    'Brown lamb with onion and garlic.',
                    'Add tomatoes, wine, and spices, simmer 20 minutes.',
                    'Layer eggplant and meat sauce in baking dish.',
                    'Top with béchamel sauce and Parmesan.',
                    'Bake at 350°F for 45 minutes until golden.',
                    'Let rest 15 minutes before serving.'
                ],
                'author_email' => 'greek.chef@taverna.gr'
            ],
            [
                'name' => 'Sushi Rolls',
                'description' => 'Fresh sushi rolls with cucumber, avocado, and your choice of fish.',
                'ingredients' => [
                    '2 cups sushi rice, cooked',
                    '4 nori sheets',
                    '1/2 lb sashimi-grade tuna',
                    '1 cucumber, julienned',
                    '1 avocado, sliced',
                    '2 tablespoons rice vinegar',
                    'Soy sauce and wasabi',
                    'Pickled ginger'
                ],
                'steps' => [
                    'Season cooked rice with rice vinegar.',
                    'Place nori sheet on bamboo mat.',
                    'Spread rice evenly over nori, leaving 1-inch border.',
                    'Place tuna, cucumber, and avocado in center.',
                    'Roll tightly using bamboo mat.',
                    'Wet knife and slice into 8 pieces.',
                    'Serve with soy sauce, wasabi, and pickled ginger.'
                ],
                'author_email' => 'sushi.chef@tokyo.jp'
            ],
            [
                'name' => 'BBQ Pulled Pork',
                'description' => 'Slow-cooked pork shoulder in tangy BBQ sauce, perfect for sandwiches.',
                'ingredients' => [
                    '3 lbs pork shoulder',
                    '2 tablespoons brown sugar',
                    '1 tablespoon paprika',
                    '1 teaspoon garlic powder',
                    '1 teaspoon onion powder',
                    '1 cup BBQ sauce',
                    '1/2 cup apple cider vinegar',
                    'Hamburger buns',
                    'Coleslaw for serving'
                ],
                'steps' => [
                    'Mix dry rub ingredients and coat pork shoulder.',
                    'Let rest for 2 hours or overnight.',
                    'Place in slow cooker with vinegar.',
                    'Cook on low for 8 hours until tender.',
                    'Remove pork and shred with forks.',
                    'Mix with BBQ sauce.',
                    'Serve on buns with coleslaw.'
                ],
                'author_email' => 'bbq.chef@smokehouse.com'
            ],
            [
                'name' => 'Vegetable Stir Fry',
                'description' => 'Quick and healthy stir-fried vegetables with garlic and ginger.',
                'ingredients' => [
                    '2 cups broccoli florets',
                    '1 bell pepper, sliced',
                    '1 carrot, julienned',
                    '1 cup snap peas',
                    '3 cloves garlic, minced',
                    '1 inch ginger, minced',
                    '3 tablespoons soy sauce',
                    '1 tablespoon sesame oil',
                    'Vegetable oil for cooking'
                ],
                'steps' => [
                    'Heat oil in a large wok over high heat.',
                    'Add garlic and ginger, stir for 30 seconds.',
                    'Add harder vegetables first (broccoli, carrots).',
                    'Stir-fry for 3-4 minutes.',
                    'Add softer vegetables (peppers, snap peas).',
                    'Stir-fry for 2 more minutes.',
                    'Add soy sauce and sesame oil.',
                    'Toss and serve immediately over rice.'
                ],
                'author_email' => 'healthy.chef@veggies.com'
            ],
            [
                'name' => 'Banana Bread',
                'description' => 'Moist and flavorful banana bread perfect for breakfast or dessert.',
                'ingredients' => [
                    '3 ripe bananas, mashed',
                    '1/3 cup melted butter',
                    '3/4 cup sugar',
                    '1 egg, beaten',
                    '1 teaspoon vanilla',
                    '1 teaspoon baking soda',
                    'Pinch of salt',
                    '1 1/2 cups flour',
                    '1/2 cup walnuts (optional)'
                ],
                'steps' => [
                    'Preheat oven to 350°F.',
                    'Mix mashed bananas with melted butter.',
                    'Add sugar, egg, and vanilla.',
                    'Sprinkle baking soda and salt over mixture.',
                    'Add flour and mix until just combined.',
                    'Fold in walnuts if using.',
                    'Pour into greased loaf pan.',
                    'Bake for 60-65 minutes until golden.',
                    'Cool before slicing.'
                ],
                'author_email' => 'baker@sweetreats.com'
            ],
            [
                'name' => 'Chicken Tikka Masala',
                'description' => 'Tender chicken in a creamy tomato and spice sauce, served with rice.',
                'ingredients' => [
                    '2 lbs chicken breast, cubed',
                    '1 cup yogurt',
                    '2 tablespoons tikka masala spice',
                    '1 onion, diced',
                    '3 cloves garlic, minced',
                    '1 can tomato sauce',
                    '1/2 cup heavy cream',
                    'Fresh cilantro',
                    'Basmati rice'
                ],
                'steps' => [
                    'Marinate chicken in yogurt and half the spices for 2 hours.',
                    'Grill chicken until cooked through.',
                    'Sauté onion and garlic until soft.',
                    'Add remaining spices and cook 1 minute.',
                    'Add tomato sauce and simmer 10 minutes.',
                    'Stir in cream and grilled chicken.',
                    'Simmer 5 minutes more.',
                    'Garnish with cilantro and serve over rice.'
                ],
                'author_email' => 'indian.chef@spicehouse.com'
            ],
            [
                'name' => 'Chocolate Lava Cake',
                'description' => 'Individual chocolate cakes with molten chocolate centers.',
                'ingredients' => [
                    '4 oz dark chocolate, chopped',
                    '4 tablespoons butter',
                    '2 large eggs',
                    '2 tablespoons sugar',
                    '2 tablespoons flour',
                    'Pinch of salt',
                    'Butter for ramekins',
                    'Vanilla ice cream'
                ],
                'steps' => [
                    'Preheat oven to 425°F.',
                    'Butter four ramekins and dust with cocoa.',
                    'Melt chocolate and butter together.',
                    'Whisk eggs and sugar until thick.',
                    'Fold in chocolate mixture.',
                    'Add flour and salt.',
                    'Divide between ramekins.',
                    'Bake 12-14 minutes until edges are firm.',
                    'Invert onto plates and serve with ice cream.'
                ],
                'author_email' => 'pastry.chef@desserts.com'
            ],
            [
                'name' => 'Shrimp Scampi',
                'description' => 'Garlic butter shrimp served over pasta with white wine and herbs.',
                'ingredients' => [
                    '1 lb large shrimp, peeled',
                    '8 oz linguine pasta',
                    '6 cloves garlic, minced',
                    '1/2 cup white wine',
                    '4 tablespoons butter',
                    '1/4 cup olive oil',
                    '1/4 cup parsley, chopped',
                    'Red pepper flakes',
                    'Lemon juice'
                ],
                'steps' => [
                    'Cook pasta according to package directions.',
                    'Heat oil and butter in large pan.',
                    'Add garlic and red pepper flakes.',
                    'Cook for 1 minute until fragrant.',
                    'Add shrimp and cook until pink.',
                    'Add wine and simmer 2 minutes.',
                    'Toss with drained pasta.',
                    'Add parsley and lemon juice.',
                    'Serve immediately.'
                ],
                'author_email' => 'seafood.chef@coastline.com'
            ],
            [
                'name' => 'Beef Stroganoff',
                'description' => 'Tender beef strips in a creamy mushroom sauce over egg noodles.',
                'ingredients' => [
                    '1 lb beef sirloin, sliced thin',
                    '8 oz egg noodles',
                    '1 lb mushrooms, sliced',
                    '1 onion, diced',
                    '3 cloves garlic, minced',
                    '1 cup sour cream',
                    '2 cups beef broth',
                    '2 tablespoons flour',
                    'Fresh dill'
                ],
                'steps' => [
                    'Cook egg noodles according to package directions.',
                    'Brown beef strips in batches, set aside.',
                    'Sauté mushrooms and onions until soft.',
                    'Add garlic and flour, cook 1 minute.',
                    'Gradually add beef broth, stirring constantly.',
                    'Return beef to pan and simmer 10 minutes.',
                    'Stir in sour cream and heat through.',
                    'Serve over noodles with fresh dill.'
                ],
                'author_email' => 'russian.chef@moscow.ru'
            ],
            [
                'name' => 'Caprese Salad',
                'description' => 'Fresh mozzarella, tomatoes, and basil drizzled with balsamic glaze.',
                'ingredients' => [
                    '4 large tomatoes, sliced',
                    '1 lb fresh mozzarella, sliced',
                    'Fresh basil leaves',
                    '1/4 cup balsamic vinegar',
                    '2 tablespoons olive oil',
                    'Salt and black pepper',
                    'Balsamic glaze for drizzling'
                ],
                'steps' => [
                    'Arrange tomato and mozzarella slices alternately on a platter.',
                    'Tuck basil leaves between slices.',
                    'Drizzle with olive oil and balsamic vinegar.',
                    'Season with salt and pepper.',
                    'Let sit 15 minutes for flavors to meld.',
                    'Drizzle with balsamic glaze before serving.'
                ],
                'author_email' => 'italian.chef@fresh.it'
            ],
            [
                'name' => 'Chicken Fajitas',
                'description' => 'Seasoned chicken strips with peppers and onions served with tortillas.',
                'ingredients' => [
                    '2 lbs chicken breast, sliced',
                    '2 bell peppers, sliced',
                    '2 onions, sliced',
                    '2 tablespoons fajita seasoning',
                    '8 flour tortillas',
                    'Sour cream',
                    'Shredded cheese',
                    'Salsa',
                    'Lime wedges'
                ],
                'steps' => [
                    'Season chicken with fajita seasoning.',
                    'Heat oil in large skillet over high heat.',
                    'Cook chicken until no longer pink.',
                    'Add peppers and onions to pan.',
                    'Cook until vegetables are tender-crisp.',
                    'Warm tortillas in microwave or dry pan.',
                    'Serve chicken and vegetables with tortillas and toppings.'
                ],
                'author_email' => 'mexican.chef@cantina.com'
            ],
            [
                'name' => 'Lemon Garlic Roast Chicken',
                'description' => 'Whole roasted chicken with lemon, garlic, and herbs.',
                'ingredients' => [
                    '1 whole chicken (3-4 lbs)',
                    '2 lemons, halved',
                    '6 cloves garlic',
                    '2 tablespoons olive oil',
                    'Fresh rosemary and thyme',
                    'Salt and pepper',
                    '1 onion, quartered',
                    'Root vegetables for roasting'
                ],
                'steps' => [
                    'Preheat oven to 425°F.',
                    'Pat chicken dry and season inside and out.',
                    'Stuff cavity with lemon halves, garlic, and herbs.',
                    'Rub skin with olive oil.',
                    'Place on roasting pan with vegetables.',
                    'Roast 60-75 minutes until juices run clear.',
                    'Let rest 10 minutes before carving.',
                    'Serve with roasted vegetables and pan juices.'
                ],
                'author_email' => 'roast.master@sunday.com'
            ],
            [
                'name' => 'Vegetarian Chili',
                'description' => 'Hearty bean and vegetable chili with warm spices.',
                'ingredients' => [
                    '2 cans kidney beans',
                    '1 can black beans',
                    '1 can diced tomatoes',
                    '1 bell pepper, diced',
                    '1 onion, diced',
                    '3 cloves garlic, minced',
                    '2 tablespoons chili powder',
                    '1 teaspoon cumin',
                    'Vegetable broth',
                    'Toppings: cheese, sour cream, green onions'
                ],
                'steps' => [
                    'Sauté onion and bell pepper until soft.',
                    'Add garlic and spices, cook 1 minute.',
                    'Add tomatoes, beans, and broth.',
                    'Simmer 30 minutes, stirring occasionally.',
                    'Season with salt and pepper.',
                    'Serve hot with desired toppings.'
                ],
                'author_email' => 'vegetarian.chef@plants.com'
            ],
            [
                'name' => 'Apple Pie',
                'description' => 'Classic American apple pie with flaky crust and cinnamon spiced apples.',
                'ingredients' => [
                    '6 large apples, peeled and sliced',
                    '2 pie crusts',
                    '3/4 cup sugar',
                    '2 tablespoons flour',
                    '1 teaspoon cinnamon',
                    '1/4 teaspoon nutmeg',
                    '2 tablespoons butter',
                    '1 egg for wash',
                    'Vanilla ice cream for serving'
                ],
                'steps' => [
                    'Preheat oven to 425°F.',
                    'Mix apples with sugar, flour, and spices.',
                    'Line pie dish with bottom crust.',
                    'Fill with apple mixture and dot with butter.',
                    'Cover with top crust and crimp edges.',
                    'Cut vents in top crust and brush with egg wash.',
                    'Bake 45-50 minutes until golden.',
                    'Cool before serving with ice cream.'
                ],
                'author_email' => 'pie.baker@americana.com'
            ],
            [
                'name' => 'Ramen Bowl',
                'description' => 'Rich pork bone broth with ramen noodles and traditional toppings.',
                'ingredients' => [
                    '4 portions fresh ramen noodles',
                    '6 cups pork bone broth',
                    '4 soft-boiled eggs',
                    '1/2 lb pork belly, sliced',
                    'Green onions, chopped',
                    'Nori sheets',
                    'Bamboo shoots',
                    'Miso paste',
                    'Sesame oil'
                ],
                'steps' => [
                    'Heat broth and season with miso paste.',
                    'Cook ramen noodles according to package.',
                    'Char pork belly slices until crispy.',
                    'Soft-boil eggs and peel carefully.',
                    'Divide noodles between bowls.',
                    'Pour hot broth over noodles.',
                    'Top with pork, eggs, and vegetables.',
                    'Drizzle with sesame oil and serve.'
                ],
                'author_email' => 'ramen.chef@noodle.jp'
            ],
            [
                'name' => 'Stuffed Bell Peppers',
                'description' => 'Bell peppers stuffed with rice, ground beef, and cheese.',
                'ingredients' => [
                    '6 large bell peppers, tops cut and seeded',
                    '1 lb ground beef',
                    '1 cup cooked rice',
                    '1 onion, diced',
                    '1 can diced tomatoes',
                    '1 cup shredded cheese',
                    '2 cloves garlic, minced',
                    'Italian seasoning',
                    'Beef broth'
                ],
                'steps' => [
                    'Preheat oven to 350°F.',
                    'Brown ground beef with onion and garlic.',
                    'Add rice, tomatoes, and seasonings.',
                    'Stuff peppers with meat mixture.',
                    'Place in baking dish with a little broth.',
                    'Cover and bake 35 minutes.',
                    'Top with cheese and bake 10 more minutes.',
                    'Let rest 5 minutes before serving.'
                ],
                'author_email' => 'comfort.food@homestyle.com'
            ],
            [
                'name' => 'Clam Chowder',
                'description' => 'Creamy New England clam chowder with potatoes and bacon.',
                'ingredients' => [
                    '2 cans chopped clams with juice',
                    '4 slices bacon, chopped',
                    '1 onion, diced',
                    '2 celery stalks, diced',
                    '3 potatoes, cubed',
                    '2 cups heavy cream',
                    '2 tablespoons flour',
                    'Bay leaves',
                    'Fresh thyme'
                ],
                'steps' => [
                    'Cook bacon until crispy, remove and set aside.',
                    'Sauté onion and celery in bacon fat.',
                    'Add flour and cook 1 minute.',
                    'Add clam juice and potatoes.',
                    'Simmer until potatoes are tender.',
                    'Add cream, clams, and herbs.',
                    'Heat through without boiling.',
                    'Serve garnished with bacon.'
                ],
                'author_email' => 'seafood.chef@newengland.com'
            ],
            [
                'name' => 'Turkey Meatballs',
                'description' => 'Lean turkey meatballs in marinara sauce, perfect with pasta.',
                'ingredients' => [
                    '1 lb ground turkey',
                    '1/2 cup breadcrumbs',
                    '1 egg',
                    '1/4 cup Parmesan cheese',
                    '2 cloves garlic, minced',
                    '2 cups marinara sauce',
                    'Fresh basil',
                    'Pasta for serving'
                ],
                'steps' => [
                    'Mix turkey, breadcrumbs, egg, cheese, and garlic.',
                    'Form into 20 meatballs.',
                    'Brown meatballs in large skillet.',
                    'Add marinara sauce and simmer 15 minutes.',
                    'Cook pasta according to package directions.',
                    'Serve meatballs over pasta.',
                    'Garnish with fresh basil.'
                ],
                'author_email' => 'healthy.chef@lean.com'
            ],
            [
                'name' => 'Breakfast Burrito',
                'description' => 'Scrambled eggs with sausage, cheese, and potatoes wrapped in a tortilla.',
                'ingredients' => [
                    '6 large eggs',
                    '1/2 lb breakfast sausage',
                    '2 cups hash browns',
                    '1 cup shredded cheese',
                    '6 large flour tortillas',
                    'Salsa',
                    'Sour cream',
                    'Hot sauce'
                ],
                'steps' => [
                    'Cook sausage and set aside.',
                    'Cook hash browns until crispy.',
                    'Scramble eggs until just set.',
                    'Warm tortillas in microwave.',
                    'Fill tortillas with eggs, sausage, and potatoes.',
                    'Top with cheese and roll tightly.',
                    'Serve with salsa and sour cream.'
                ],
                'author_email' => 'breakfast.chef@morning.com'
            ],
            [
                'name' => 'Quinoa Salad',
                'description' => 'Nutritious quinoa salad with vegetables and lemon vinaigrette.',
                'ingredients' => [
                    '2 cups cooked quinoa',
                    '1 cucumber, diced',
                    '2 tomatoes, diced',
                    '1/2 red onion, diced',
                    '1/4 cup fresh mint',
                    '1/4 cup fresh parsley',
                    '1/4 cup olive oil',
                    '2 tablespoons lemon juice',
                    'Salt and pepper'
                ],
                'steps' => [
                    'Cook quinoa and let cool completely.',
                    'Dice all vegetables.',
                    'Chop fresh herbs.',
                    'Whisk together oil and lemon juice.',
                    'Combine quinoa with vegetables and herbs.',
                    'Toss with dressing.',
                    'Season with salt and pepper.',
                    'Chill for 30 minutes before serving.'
                ],
                'author_email' => 'healthy.chef@superfood.com'
            ],
            [
                'name' => 'Pancakes',
                'description' => 'Fluffy buttermilk pancakes perfect for weekend breakfast.',
                'ingredients' => [
                    '2 cups flour',
                    '2 tablespoons sugar',
                    '2 teaspoons baking powder',
                    '1 teaspoon salt',
                    '2 cups buttermilk',
                    '2 eggs',
                    '1/4 cup melted butter',
                    'Maple syrup',
                    'Fresh berries'
                ],
                'steps' => [
                    'Mix dry ingredients in large bowl.',
                    'Whisk together wet ingredients.',
                    'Combine wet and dry ingredients until just mixed.',
                    'Heat griddle over medium heat.',
                    'Pour 1/4 cup batter per pancake.',
                    'Cook until bubbles form, then flip.',
                    'Cook until golden brown.',
                    'Serve with syrup and berries.'
                ],
                'author_email' => 'breakfast.chef@fluffy.com'
            ],
            [
                'name' => 'Lamb Curry',
                'description' => 'Tender lamb in aromatic curry sauce with warm spices.',
                'ingredients' => [
                    '2 lbs lamb shoulder, cubed',
                    '2 onions, diced',
                    '4 cloves garlic, minced',
                    '1 inch ginger, minced',
                    '2 tablespoons curry powder',
                    '1 can coconut milk',
                    '1 can diced tomatoes',
                    'Fresh cilantro',
                    'Basmati rice'
                ],
                'steps' => [
                    'Brown lamb pieces in large pot.',
                    'Add onions and cook until soft.',
                    'Add garlic, ginger, and curry powder.',
                    'Cook for 2 minutes until fragrant.',
                    'Add tomatoes and coconut milk.',
                    'Simmer 1.5 hours until lamb is tender.',
                    'Garnish with cilantro.',
                    'Serve over basmati rice.'
                ],
                'author_email' => 'curry.chef@spice.com'
            ],
            [
                'name' => 'Chocolate Chip Muffins',
                'description' => 'Moist bakery-style muffins loaded with chocolate chips.',
                'ingredients' => [
                    '2 cups flour',
                    '1/2 cup sugar',
                    '2 teaspoons baking powder',
                    '1/2 teaspoon salt',
                    '1 cup milk',
                    '1/3 cup vegetable oil',
                    '1 egg',
                    '1 cup chocolate chips',
                    'Coarse sugar for topping'
                ],
                'steps' => [
                    'Preheat oven to 400°F.',
                    'Line muffin tin with paper liners.',
                    'Mix dry ingredients in large bowl.',
                    'Whisk together wet ingredients.',
                    'Fold wet into dry ingredients.',
                    'Add chocolate chips and mix gently.',
                    'Fill muffin cups 2/3 full.',
                    'Sprinkle with coarse sugar.',
                    'Bake 18-20 minutes until golden.'
                ],
                'author_email' => 'baker@muffin.com'
            ],
            [
                'name' => 'Gazpacho',
                'description' => 'Cold Spanish soup with tomatoes, peppers, and cucumber.',
                'ingredients' => [
                    '6 large tomatoes',
                    '1 cucumber, peeled',
                    '1 red bell pepper',
                    '1/4 red onion',
                    '2 cloves garlic',
                    '1/4 cup olive oil',
                    '2 tablespoons sherry vinegar',
                    'Salt and pepper',
                    'Croutons for serving'
                ],
                'steps' => [
                    'Roughly chop all vegetables.',
                    'Combine in blender with oil and vinegar.',
                    'Blend until smooth.',
                    'Season with salt and pepper.',
                    'Chill for at least 2 hours.',
                    'Serve cold with croutons.',
                    'Garnish with diced vegetables if desired.'
                ],
                'author_email' => 'spanish.chef@andalusia.es'
            ],
            [
                'name' => 'Crab Cakes',
                'description' => 'Golden pan-fried crab cakes with minimal filler, maximum crab.',
                'ingredients' => [
                    '1 lb lump crab meat',
                    '1/2 cup breadcrumbs',
                    '1 egg',
                    '2 tablespoons mayonnaise',
                    '1 tablespoon Dijon mustard',
                    '1 green onion, minced',
                    'Lemon juice',
                    'Old Bay seasoning',
                    'Remoulade sauce'
                ],
                'steps' => [
                    'Gently pick through crab meat for shells.',
                    'Mix breadcrumbs, egg, mayo, and mustard.',
                    'Add green onion and seasonings.',
                    'Fold in crab meat gently.',
                    'Form into 6 patties and chill 30 minutes.',
                    'Pan-fry until golden on both sides.',
                    'Serve with remoulade sauce and lemon.'
                ],
                'author_email' => 'seafood.chef@chesapeake.com'
            ],
            [
                'name' => 'Pork Tenderloin',
                'description' => 'Herb-crusted pork tenderloin with rosemary and garlic.',
                'ingredients' => [
                    '2 pork tenderloins',
                    '3 cloves garlic, minced',
                    '2 tablespoons fresh rosemary',
                    '2 tablespoons olive oil',
                    '1 tablespoon Dijon mustard',
                    'Salt and pepper',
                    'Root vegetables for roasting'
                ],
                'steps' => [
                    'Preheat oven to 425°F.',
                    'Mix garlic, rosemary, oil, and mustard.',
                    'Season pork with salt and pepper.',
                    'Rub herb mixture all over pork.',
                    'Sear in oven-safe pan until browned.',
                    'Add vegetables to pan.',
                    'Roast 15-20 minutes until internal temp 145°F.',
                    'Let rest 5 minutes before slicing.'
                ],
                'author_email' => 'chef@finedining.com'
            ],
            [
                'name' => 'Spinach and Feta Quiche',
                'description' => 'Savory quiche with spinach, feta cheese, and fresh herbs.',
                'ingredients' => [
                    '1 pie crust',
                    '6 eggs',
                    '1 cup heavy cream',
                    '2 cups fresh spinach',
                    '1 cup feta cheese, crumbled',
                    '1/4 cup sun-dried tomatoes',
                    '2 green onions, chopped',
                    'Fresh dill',
                    'Salt and pepper'
                ],
                'steps' => [
                    'Preheat oven to 375°F.',
                    'Blind bake pie crust for 10 minutes.',
                    'Sauté spinach until wilted.',
                    'Whisk eggs with cream and seasonings.',
                    'Layer spinach, feta, and tomatoes in crust.',
                    'Pour egg mixture over filling.',
                    'Bake 35-40 minutes until set.',
                    'Cool 10 minutes before serving.'
                ],
                'author_email' => 'brunch.chef@eggs.com'
            ]
        ];

        foreach ($recipes as $recipeData) {
            Recipe::create($recipeData);
        }
    }
}
