<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            ['productname' => 'Organic Face Wash', 'description' => 'A gentle face wash made from organic ingredients.', 'price' => 15.99, 'stock' => 100, 'imageurl' => 'images/face_wash.jpg', 'color' => 'White', 'rating' => 4.5, 'discount' => 10.00],
            ['productname' => 'Herbal Shampoo', 'description' => 'A herbal shampoo that revitalizes your hair.', 'price' => 10.99, 'stock' => 200, 'imageurl' => 'images/shampoo.jpg', 'color' => 'Green', 'rating' => 4.7, 'discount' => 5.00],
            ['productname' => 'Moisturizing Lotion', 'description' => 'A lotion that keeps your skin hydrated all day.', 'price' => 12.50, 'stock' => 150, 'imageurl' => 'images/lotion.jpg', 'color' => 'Pink', 'rating' => 4.6, 'discount' => 7.50],
            ['productname' => 'Vitamin C Serum', 'description' => 'Brightens your skin with natural vitamin C.', 'price' => 25.00, 'stock' => 80, 'imageurl' => 'images/vitamin_c_serum.jpg', 'color' => 'Orange', 'rating' => 4.8, 'discount' => 5.00],
            ['productname' => 'Anti-Aging Cream', 'description' => 'Reduces the appearance of fine lines and wrinkles.', 'price' => 30.00, 'stock' => 60, 'imageurl' => 'images/anti_aging_cream.jpg', 'color' => 'White', 'rating' => 4.9, 'discount' => 15.00],
            ['productname' => 'Lip Balm', 'description' => 'Keeps your lips moisturized and soft.', 'price' => 3.99, 'stock' => 300, 'imageurl' => 'images/lip_balm.jpg', 'color' => 'Red', 'rating' => 4.5, 'discount' => 1.00],
            ['productname' => 'Green Tea Cleanser', 'description' => 'A cleanser with antioxidant properties of green tea.', 'price' => 18.00, 'stock' => 120, 'imageurl' => 'images/green_tea_cleanser.jpg', 'color' => 'Green', 'rating' => 4.7, 'discount' => 2.00],
            ['productname' => 'Sunscreen SPF 50', 'description' => 'Protects your skin from harmful UV rays.', 'price' => 20.00, 'stock' => 130, 'imageurl' => 'images/sunscreen.jpg', 'color' => 'Yellow', 'rating' => 4.8, 'discount' => 5.00],
            ['productname' => 'Charcoal Face Mask', 'description' => 'Detoxifies your skin with natural charcoal.', 'price' => 8.99, 'stock' => 140, 'imageurl' => 'images/charcoal_face_mask.jpg', 'color' => 'Black', 'rating' => 4.6, 'discount' => 1.50],
            ['productname' => 'Aloe Vera Gel', 'description' => 'Soothes and moisturizes your skin.', 'price' => 6.99, 'stock' => 250, 'imageurl' => 'images/aloe_vera_gel.jpg', 'color' => 'Green', 'rating' => 4.7, 'discount' => 2.00],
            ['productname' => 'Hair Growth Oil', 'description' => 'Promotes hair growth with natural oils.', 'price' => 15.00, 'stock' => 90, 'imageurl' => 'images/hair_growth_oil.jpg', 'color' => 'Yellow', 'rating' => 4.8, 'discount' => 5.00],
            ['productname' => 'Coconut Oil', 'description' => 'Multi-purpose oil for hair and skin.', 'price' => 10.00, 'stock' => 180, 'imageurl' => 'images/coconut_oil.jpg', 'color' => 'Clear', 'rating' => 4.9, 'discount' => 3.00],
            ['productname' => 'Collagen Supplements', 'description' => 'Supports skin elasticity and joint health.', 'price' => 25.99, 'stock' => 70, 'imageurl' => 'images/collagen_supplements.jpg', 'color' => 'White', 'rating' => 4.7, 'discount' => 7.00],
            ['productname' => 'Eye Cream', 'description' => 'Reduces dark circles and puffiness.', 'price' => 20.00, 'stock' => 50, 'imageurl' => 'images/eye_cream.jpg', 'color' => 'Blue', 'rating' => 4.6, 'discount' => 5.00],
            ['productname' => 'Nail Strengthener', 'description' => 'Strengthens and protects your nails.', 'price' => 8.00, 'stock' => 110, 'imageurl' => 'images/nail_strengthener.jpg', 'color' => 'Clear', 'rating' => 4.5, 'discount' => 1.50],
            ['productname' => 'Tea Tree Oil', 'description' => 'Natural oil for acne-prone skin.', 'price' => 12.00, 'stock' => 160, 'imageurl' => 'images/tea_tree_oil.jpg', 'color' => 'Green', 'rating' => 4.7, 'discount' => 2.50],
            ['productname' => 'Whitening Toothpaste', 'description' => 'Brightens your smile with natural ingredients.', 'price' => 5.99, 'stock' => 140, 'imageurl' => 'images/whitening_toothpaste.jpg', 'color' => 'White', 'rating' => 4.6, 'discount' => 1.00],
            ['productname' => 'Body Scrub', 'description' => 'Exfoliates and rejuvenates your skin.', 'price' => 10.50, 'stock' => 90, 'imageurl' => 'images/body_scrub.jpg', 'color' => 'Brown', 'rating' => 4.7, 'discount' => 3.00],
            ['productname' => 'Rose Water Toner', 'description' => 'Hydrates and refreshes your skin.', 'price' => 7.99, 'stock' => 150, 'imageurl' => 'images/rose_water_toner.jpg', 'color' => 'Pink', 'rating' => 4.8, 'discount' => 1.50],
            ['productname' => 'Anti-Dandruff Shampoo', 'description' => 'Prevents dandruff and soothes the scalp.', 'price' => 12.00, 'stock' => 120, 'imageurl' => 'images/anti_dandruff_shampoo.jpg', 'color' => 'Blue', 'rating' => 4.5, 'discount' => 2.00],
            ['productname' => 'Foot Cream', 'description' => 'Moisturizes and repairs cracked heels.', 'price' => 8.50, 'stock' => 130, 'imageurl' => 'images/foot_cream.jpg', 'color' => 'White', 'rating' => 4.6, 'discount' => 2.00],
            ['productname' => 'Lip Scrub', 'description' => 'Exfoliates and softens your lips.', 'price' => 5.00, 'stock' => 170, 'imageurl' => 'images/lip_scrub.jpg', 'color' => 'Red', 'rating' => 4.7, 'discount' => 1.00],
            ['productname' => 'Eucalyptus Oil', 'description' => 'Aromatic oil for relaxation and skincare.', 'price' => 9.99, 'stock' => 100, 'imageurl' => 'images/eucalyptus_oil.jpg', 'color' => 'Clear', 'rating' => 4.8, 'discount' => 1.50],
            ['productname' => 'Aloe Vera Juice', 'description' => 'Hydrates and nourishes from within.', 'price' => 14.99, 'stock' => 80, 'imageurl' => 'images/aloe_vera_juice.jpg', 'color' => 'Green', 'rating' => 4.9, 'discount' => 2.00],
            ['productname' => 'Clay Face Mask', 'description' => 'Detoxifies and tightens pores.', 'price' => 7.50, 'stock' => 140, 'imageurl' => 'images/clay_face_mask.jpg', 'color' => 'Gray', 'rating' => 4.7, 'discount' => 1.50],
            ['productname' => 'Hydrating Serum', 'description' => 'Deeply hydrates and plumps the skin.', 'price' => 22.00, 'stock' => 70, 'imageurl' => 'images/hydrating_serum.jpg', 'color' => 'Blue', 'rating' => 4.8, 'discount' => 3.00],
            ['productname' => 'Shea Butter', 'description' => 'Natural moisturizer for dry skin.', 'price' => 11.00, 'stock' => 150, 'imageurl' => 'images/shea_butter.jpg', 'color' => 'Yellow', 'rating' => 4.9, 'discount' => 2.50],
            ['productname' => 'Detox Tea', 'description' => 'A blend of herbs for detoxification.', 'price' => 9.99, 'stock' => 90, 'imageurl' => 'images/detox_tea.jpg', 'color' => 'Green', 'rating' => 4.6, 'discount' => 1.00],
            ['productname' => 'Night Cream', 'description' => 'Nourishes and repairs skin overnight.', 'price' => 18.50, 'stock' => 60, 'imageurl' => 'images/night_cream.jpg', 'color' => 'White', 'rating' => 4.7, 'discount' => 3.00],
            ['productname' => 'Hair Conditioner', 'description' => 'Softens and strengthens your hair.', 'price' => 12.00, 'stock' => 130, 'imageurl' => 'images/hair_conditioner.jpg', 'color' => 'Pink', 'rating' => 4.5, 'discount' => 2.00],
            ['productname' => 'Vitamin E Oil', 'description' => 'Nourishes and revitalizes skin and hair.', 'price' => 14.00, 'stock' => 110, 'imageurl' => 'images/vitamin_e_oil.jpg', 'color' => 'Clear', 'rating' => 4.8, 'discount' => 1.50],
            ['productname' => 'Cleansing Balm', 'description' => 'Removes makeup and impurities.', 'price' => 20.00, 'stock' => 50, 'imageurl' => 'images/cleansing_balm.jpg', 'color' => 'Yellow', 'rating' => 4.9, 'discount' => 2.00],
            ['productname' => 'Probiotic Supplements', 'description' => 'Supports digestive health.', 'price' => 16.99, 'stock' => 80, 'imageurl' => 'images/probiotic_supplements.jpg', 'color' => 'White', 'rating' => 4.7, 'discount' => 2.50],
            ['productname' => 'Hand Cream', 'description' => 'Moisturizes and protects your hands.', 'price' => 6.50, 'stock' => 120, 'imageurl' => 'images/hand_cream.jpg', 'color' => 'Pink', 'rating' => 4.6, 'discount' => 1.00],
            ['productname' => 'Body Lotion', 'description' => 'Hydrates and softens your skin.', 'price' => 10.99, 'stock' => 140, 'imageurl' => 'images/body_lotion.jpg', 'color' => 'White', 'rating' => 4.7, 'discount' => 2.00],
            ['productname' => 'Collagen Face Mask', 'description' => 'Boosts skin elasticity and hydration.', 'price' => 5.50, 'stock' => 160, 'imageurl' => 'images/collagen_face_mask.jpg', 'color' => 'Clear', 'rating' => 4.8, 'discount' => 1.00],
            ['productname' => 'Brightening Serum', 'description' => 'Improves skin tone and radiance.', 'price' => 25.00, 'stock' => 70, 'imageurl' => 'images/brightening_serum.jpg', 'color' => 'Orange', 'rating' => 4.9, 'discount' => 3.00],
            ['productname' => 'Lavender Oil', 'description' => 'Calming oil for relaxation and skincare.', 'price' => 12.00, 'stock' => 90, 'imageurl' => 'images/lavender_oil.jpg', 'color' => 'Purple', 'rating' => 4.8, 'discount' => 1.50],
            ['productname' => 'Exfoliating Scrub', 'description' => 'Removes dead skin cells for a smooth finish.', 'price' => 10.00, 'stock' => 130, 'imageurl' => 'images/exfoliating_scrub.jpg', 'color' => 'Brown', 'rating' => 4.6, 'discount' => 2.00],
            ['productname' => 'Rosehip Oil', 'description' => 'Nourishes and rejuvenates the skin.', 'price' => 15.00, 'stock' => 70, 'imageurl' => 'images/rosehip_oil.jpg', 'color' => 'Red', 'rating' => 4.9, 'discount' => 2.00],
            ['productname' => 'Conditioning Mask', 'description' => 'Deeply conditions and repairs hair.', 'price' => 18.00, 'stock' => 80, 'imageurl' => 'images/conditioning_mask.jpg', 'color' => 'White', 'rating' => 4.7, 'discount' => 2.50],
            ['productname' => 'Aloe Vera Moisturizer', 'description' => 'Soothes and hydrates the skin.', 'price' => 9.99, 'stock' => 150, 'imageurl' => 'images/aloe_vera_moisturizer.jpg', 'color' => 'Green', 'rating' => 4.8, 'discount' => 1.00],
            ['productname' => 'Anti-Frizz Serum', 'description' => 'Controls frizz and adds shine to hair.', 'price' => 14.00, 'stock' => 100, 'imageurl' => 'images/anti_frizz_serum.jpg', 'color' => 'Clear', 'rating' => 4.6, 'discount' => 2.00],
            ['productname' => 'Face Toner', 'description' => 'Balances and refreshes the skin.', 'price' => 11.00, 'stock' => 140, 'imageurl' => 'images/face_toner.jpg', 'color' => 'Blue', 'rating' => 4.7, 'discount' => 1.50],
            ['productname' => 'Cleansing Water', 'description' => 'Gentle cleanser that removes impurities.', 'price' => 8.50, 'stock' => 130, 'imageurl' => 'images/cleansing_water.jpg', 'color' => 'Clear', 'rating' => 4.8, 'discount' => 1.00],
            ['productname' => 'Eye Makeup Remover', 'description' => 'Removes eye makeup without irritation.', 'price' => 6.99, 'stock' => 120, 'imageurl' => 'images/eye_makeup_remover.jpg', 'color' => 'White', 'rating' => 4.7, 'discount' => 1.50],
        ];

        DB::table('products')->insert($products);

    }
}
