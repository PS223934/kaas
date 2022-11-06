<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\kaas;

class KaasSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //source: https://www.usdairy.com/news-articles/cheese-types-what-you-need-to-know-about-cheese
        $kazen = [
            ['id' => 1, 'name' => "American", 'origin' => "America", 'description' => "American is a creamy, smooth cheese made from blending natural cheeses. It comes in several forms including individually wrapped cheese slices, small pre-sliced blocks and large blocks. It melts well."],
            ['id' => 2, 'name' => "Asiago", 'origin' => "Italy", 'description' => "Asiago, a nutty-flavored cheese, comes in two forms: fresh and mature. The fresh has an off-white color and is smoother and milder, while mature Asiago is yellowish and somewhat crumbly. Depending on its age, Asiago can be grated, melted or sliced."],
            ['id' => 3, 'name' => "Blue Cheese", 'origin' => "France", 'description' => "Blue is a general name for cheeses that were made with Penicillium cultures, which creates “blue” spots or veins. Blue cheese has a distinct smell and, what some consider, an acquired taste. Blue cheeses can be eaten crumbed or melted. Check our our Blue Cheese Deviled Eggs for a fun blue cheese recipe."],
            ['id' => 4, 'name' => "Bocconcini", 'origin' => "Naples, Italy", 'description' => "Meaning “little bites,” bocconcini are egg-sized balls of mozzarella cheese. The cheese is white, rindless, unripened, and elastic in texture with a sweet, buttery taste. Bocconcini can be enjoyed as they are or melted."],
            ['id' => 5, 'name' => "Brie", 'origin' => "France", 'description' => "Brie is a soft, white cheese. It comes in a wheel, sometimes in a small wooden box, and is considered a great dessert cheese. Experts recommend enjoying it at room temperature. Learn more about how to best enjoy and eat brie along with other cheeses that have a rind."],
            ['id' => 6, 'name' => "Burrata", 'origin' => "Italy", 'description' => "Burrata is a fresh cheese featuring a thin layer of cheese with a mixture of stringy curd and fresh cream on the inside. It has a rich flavor and goes well with salads, crusty bread and Italian dishes."],
            ['id' => 7, 'name' => "Cotija", 'origin' => "Mexico", 'description' => "This hard, crumbly cheese begins as mild and salty, and becomes tangier as it ages. It doesn’t melt, so it’s used for grating on soups, tacos, tostadas, and more."],
            ['id' => 8, 'name' => "Gouda", 'origin' => "the Netherlands", 'description' => "A semi-hard to hard cheese with a smooth flavor, Gouda comes in several types, depending on its age. Gouda can be grated, sliced, cubed and melted. Check out our article, What is Gouda Cheese to learn more about this great cheese."],
            ['id' => 9, 'name' => "Feta", 'origin' => "Greece", 'description' => "Feta (Greek: φέτα, féta) is a Greek brined white cheese made from sheep's milk or from a mixture of sheep and goat's milk. It is soft, with small or no holes, a compact touch, few cuts, and no skin. Crumbly with a slightly grainy texture, it is formed into large blocks and aged in brine."],
            ['id' => 10, 'name' => "Gruyère", 'origin' => "Switzerland", 'description' => "Gruyère is a hard, nutty cheese that comes in several forms, including grated, sliced, cubed and melted. It’s a great cheese for cooking and baking."],
            ['id' => 11, 'name' => "Mozzarella", 'origin' => "Italy", 'description' => "Mozzarella is a soft, white cheese that is made from cow’s milk. It is a fresh cheese that is often used in Italian dishes. Mozzarella is a great cheese for grating, melting and slicing."],
            ['id' => 12, 'name' => "Parmesan", 'origin' => "Italy", 'description' => "Parmesan is a hard, granular cheese that is made from cow’s milk. It is a great cheese for grating, melting and slicing. Parmesan is a great cheese for cooking and baking."],
            ['id' => 13, 'name' => "Provolone", 'origin' => "Italy", 'description' => "Provolone is a semi-hard cheese that is made from cow’s milk. It is a great cheese for grating, melting and slicing. Provolone is a great cheese for cooking and baking."],
            ['id' => 14, 'name' => "Ricotta", 'origin' => "Italy", 'description' => "Ricotta is a fresh cheese that is made from cow’s milk. It is a great cheese for grating, melting and slicing. Ricotta is a great cheese for cooking and baking."],
            ['id' => 15, 'name' => "Romano", 'origin' => "Italy", 'description' => "Romano is a hard, granular cheese that is made from cow’s milk. It is a great cheese for grating, melting and slicing. Romano is a great cheese for cooking and baking."],
            ['id' => 16, 'name' => "Swiss", 'origin' => "Switzerland", 'description' => "Swiss is a semi-hard cheese that is made from cow’s milk. It is a great cheese for grating, melting and slicing. Swiss is a great cheese for cooking and baking."],
            ['id' => 17, 'name' => "Cheddar", 'origin' => "England", 'description' => "Cheddar is a hard, granular cheese that is made from cow’s milk. It is a great cheese for grating, melting and slicing. Cheddar is a great cheese for cooking and baking."],
            ['id' => 18, 'name' => "Colby", 'origin' => "United States", 'description' => "Colby is a semi-hard cheese that is made from cow’s milk. It is a great cheese for grating, melting and slicing. Colby is a great cheese for cooking and baking."],
            ['id' => 19, 'name' => "Edam", 'origin' => "Netherlands", 'description' => "Edam is a semi-hard cheese that is made from cow’s milk. It is a great cheese for grating, melting and slicing. Edam is a great cheese for cooking and baking."],
            ['id' => 21, 'name' => "Monterey Jack", 'origin' => "United States", 'description' => "Monterey Jack is a semi-hard cheese that is made from cow’s milk. It is a great cheese for grating, melting and slicing. Monterey Jack is a great cheese for cooking and baking."],
            ['id' => 22, 'name' => "Muenster", 'origin' => "United States", 'description' => "Muenster is a semi-hard cheese that is made from cow’s milk. It is a great cheese for grating, melting and slicing. Muenster is a great cheese for cooking and baking."],
            ['id' => 23, 'name' => "Pepper Jack", 'origin' => "United States", 'description' => "Pepper Jack is a semi-hard cheese that is made from cow’s milk. It is a great cheese for grating, melting and slicing. Pepper Jack is a great cheese for cooking and baking."],
        ];

        foreach ($kazen as $kaas) {
            kaas::create($kaas);
        }
    }
}