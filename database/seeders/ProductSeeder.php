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
        $skincare = [
          ['name' => 'Organic Face Wash', 'description' => 'A gentle face wash made from organic ingredients.', 'price' => 15.99, 'stock' => 100, 'image_url' => 'images/face_wash.jpg', 'color' => 'White', 'rating' => 4.5, 'discount' => 10.00, 'category_id' => 1],
          ['name' => 'Moisturizing Lotion', 'description' => 'A lotion that keeps your skin hydrated all day.', 'price' => 12.50, 'stock' => 150, 'image_url' => 'images/lotion.jpg', 'color' => 'Pink', 'rating' => 4.6, 'discount' => 7.50, 'category_id' => 1],
          ['name' => 'Vitamin C Serum', 'description' => 'Brightens your skin with natural vitamin C.', 'price' => 25.00, 'stock' => 80, 'image_url' => 'images/vitamin_c_serum.jpg', 'color' => 'Orange', 'rating' => 4.8, 'discount' => 5.00, 'category_id' => 1],
          ['name' => 'Anti-Aging Cream', 'description' => 'Reduces the appearance of fine lines and wrinkles.', 'price' => 30.00, 'stock' => 60, 'image_url' => 'images/anti_aging_cream.jpg', 'color' => 'White', 'rating' => 4.9, 'discount' => 15.00, 'category_id' => 1],
          ['name' => 'Rose Water Toner', 'description' => 'Hydrates and refreshes your skin.', 'price' => 7.99, 'stock' => 150, 'image_url' => 'images/rose_water_toner.jpg', 'color' => 'Pink', 'rating' => 4.8, 'discount' => 1.50, 'category_id' => 1],
          ['name' => 'Cleansing Balm', 'description' => 'Removes makeup and impurities.', 'price' => 20.00, 'stock' => 50, 'image_url' => 'images/cleansing_balm.jpg', 'color' => 'Yellow', 'rating' => 4.9, 'discount' => 2.00, 'category_id' => 1],
          ['name' => 'Face Toner', 'description' => 'Balances and refreshes the skin.', 'price' => 11.00, 'stock' => 140, 'image_url' => 'images/face_toner.jpg', 'color' => 'Blue', 'rating' => 4.7, 'discount' => 1.50, 'category_id' => 1],
          ['name' => 'Night Cream', 'description' => 'Nourishes and repairs skin overnight.', 'price' => 18.50, 'stock' => 60, 'image_url' => 'images/night_cream.jpg', 'color' => 'White', 'rating' => 4.7, 'discount' => 3.00, 'category_id' => 1],
          ['name' => 'Collagen Face Mask', 'description' => 'Boosts skin elasticity and hydration.', 'price' => 5.50, 'stock' => 160, 'image_url' => 'images/collagen_face_mask.jpg', 'color' => 'Clear', 'rating' => 4.8, 'discount' => 1.00, 'category_id' => 1],
          ['name' => 'Brightening Serum', 'description' => 'Improves skin tone and radiance.', 'price' => 25.00, 'stock' => 70, 'image_url' => 'images/brightening_serum.jpg', 'color' => 'Orange', 'rating' => 4.9, 'discount' => 3.00, 'category_id' => 1],
          ['name' => 'Aloe Vera Moisturizer', 'description' => 'Soothes and hydrates the skin.', 'price' => 9.99, 'stock' => 150, 'image_url' => 'images/aloe_vera_moisturizer.jpg', 'color' => 'Green', 'rating' => 4.8, 'discount' => 1.00, 'category_id' => 1],
        ];

        $haircare = [
          ['name' => 'Shampoo', 'description' => 'A nourishing shampoo that cleanses and revitalizes your hair.', 'price' => 12.99, 'stock' => 120, 'image_url' => 'images/shampoo.jpg', 'color' => 'Clear', 'rating' => 4.5, 'discount' => 2.00, 'category_id' => 2],
          ['name' => 'Conditioner', 'description' => 'A moisturizing conditioner that leaves hair soft and manageable.', 'price' => 14.50, 'stock' => 100, 'image_url' => 'images/conditioner.jpg', 'color' => 'White', 'rating' => 4.6, 'discount' => 3.00, 'category_id' => 2],
          ['name' => 'Hair Mask', 'description' => 'A deep conditioning treatment for damaged hair.', 'price' => 20.00, 'stock' => 70, 'image_url' => 'images/hair_mask.jpg', 'color' => 'Pink', 'rating' => 4.7, 'discount' => 5.00, 'category_id' => 2],
          ['name' => 'Hair Oil', 'description' => 'Nourishes and strengthens hair with natural oils.', 'price' => 18.00, 'stock' => 80, 'image_url' => 'images/hair_oil.jpg', 'color' => 'Gold', 'rating' => 4.8, 'discount' => 4.00, 'category_id' => 2],
          ['name' => 'Leave-In Conditioner', 'description' => 'A lightweight conditioner that can be left in for extra moisture.', 'price' => 13.00, 'stock' => 150, 'image_url' => 'images/leave_in_conditioner.jpg', 'color' => 'White', 'rating' => 4.5, 'discount' => 2.50, 'category_id' => 2],
          ['name' => 'Scalp Treatment', 'description' => 'A treatment that soothes and revitalizes the scalp.', 'price' => 16.00, 'stock' => 90, 'image_url' => 'images/scalp_treatment.jpg', 'color' => 'Green', 'rating' => 4.6, 'discount' => 3.00, 'category_id' => 2],
          ['name' => 'Volumizing Spray', 'description' => 'Adds volume and body to fine hair.', 'price' => 11.50, 'stock' => 110, 'image_url' => 'images/volumizing_spray.jpg', 'color' => 'Clear', 'rating' => 4.4, 'discount' => 2.00, 'category_id' => 2],
          ['name' => 'Anti-Frizz Serum', 'description' => 'Reduces frizz and adds shine.', 'price' => 15.00, 'stock' => 130, 'image_url' => 'images/anti_frizz_serum.jpg', 'color' => 'Clear', 'rating' => 4.7, 'discount' => 3.00, 'category_id' => 2],
          ['name' => 'Heat Protectant Spray', 'description' => 'Protects hair from heat damage caused by styling tools.', 'price' => 14.00, 'stock' => 120, 'image_url' => 'images/heat_protectant_spray.jpg', 'color' => 'Clear', 'rating' => 4.6, 'discount' => 2.50, 'category_id' => 2],
          ['name' => 'Curl Cream', 'description' => 'Defines and enhances curls with a natural finish.', 'price' => 17.00, 'stock' => 85, 'image_url' => 'images/curl_cream.jpg', 'color' => 'White', 'rating' => 4.8, 'discount' => 4.00, 'category_id' => 2],
        ];

        $makeup = [
          ['name' => 'Foundation', 'description' => 'A smooth foundation that provides full coverage.', 'price' => 25.00, 'stock' => 150, 'image_url' => 'images/foundation.jpg', 'color' => 'Beige', 'rating' => 4.6, 'discount' => 5.00, 'category_id' => 3],
          ['name' => 'Mascara', 'description' => 'A volumizing mascara for fuller lashes.', 'price' => 18.00, 'stock' => 120, 'image_url' => 'images/mascara.jpg', 'color' => 'Black', 'rating' => 4.7, 'discount' => 3.00, 'category_id' => 3],
          ['name' => 'Lipstick', 'description' => 'A rich, creamy lipstick available in various shades.', 'price' => 15.00, 'stock' => 200, 'image_url' => 'images/lipstick.jpg', 'color' => 'Red', 'rating' => 4.8, 'discount' => 2.00, 'category_id' => 3],
          ['name' => 'Blush', 'description' => 'A natural-looking blush to add a healthy glow.', 'price' => 22.00, 'stock' => 140, 'image_url' => 'images/blush.jpg', 'color' => 'Pink', 'rating' => 4.5, 'discount' => 3.00, 'category_id' => 3],
          ['name' => 'Eyeshadow Palette', 'description' => 'A palette with a variety of shades for versatile eye looks.', 'price' => 30.00, 'stock' => 100, 'image_url' => 'images/eyeshadow_palette.jpg', 'color' => 'Mixed', 'rating' => 4.6, 'discount' => 5.00, 'category_id' => 3],
          ['name' => 'Eyeliner', 'description' => 'A precise eyeliner for defining the eyes.', 'price' => 12.00, 'stock' => 180, 'image_url' => 'images/eyeliner.jpg', 'color' => 'Black', 'rating' => 4.4, 'discount' => 1.50, 'category_id' => 3],
          ['name' => 'Setting Spray', 'description' => 'A spray to set makeup and extend wear.', 'price' => 20.00, 'stock' => 130, 'image_url' => 'images/setting_spray.jpg', 'color' => 'Clear', 'rating' => 4.7, 'discount' => 2.00, 'category_id' => 3],
          ['name' => 'Concealer', 'description' => 'A concealer that covers blemishes and dark circles.', 'price' => 17.00, 'stock' => 160, 'image_url' => 'images/concealer.jpg', 'color' => 'Light Beige', 'rating' => 4.6, 'discount' => 2.50, 'category_id' => 3],
          ['name' => 'Highlighter', 'description' => 'A radiant highlighter to add glow to your cheeks.', 'price' => 24.00, 'stock' => 110, 'image_url' => 'images/highlighter.jpg', 'color' => 'Champagne', 'rating' => 4.8, 'discount' => 3.00, 'category_id' => 3],
          ['name' => 'Contour Kit', 'description' => 'A kit for contouring and defining your face.', 'price' => 28.00, 'stock' => 90, 'image_url' => 'images/contour_kit.jpg', 'color' => 'Mixed', 'rating' => 4.7, 'discount' => 4.00, 'category_id' => 3],
        ];

        $health_supplements = [
          ['name' => 'Multivitamins', 'description' => 'A daily multivitamin supplement to support overall health.', 'price' => 29.99, 'stock' => 200, 'image_url' => 'images/multivitamins.jpg', 'color' => 'Yellow', 'rating' => 4.7, 'discount' => 5.00, 'category_id' => 4],
          ['name' => 'Omega-3 Fish Oil', 'description' => 'Rich in omega-3 fatty acids to support heart health.', 'price' => 22.50, 'stock' => 150, 'image_url' => 'images/omega3_fish_oil.jpg', 'color' => 'Clear', 'rating' => 4.8, 'discount' => 4.00, 'category_id' => 4],
          ['name' => 'Probiotics', 'description' => 'Supports digestive health with beneficial bacteria.', 'price' => 19.99, 'stock' => 180, 'image_url' => 'images/probiotics.jpg', 'color' => 'White', 'rating' => 4.6, 'discount' => 3.00, 'category_id' => 4],
          ['name' => 'Vitamin D3', 'description' => 'Helps maintain healthy bones and immune function.', 'price' => 15.00, 'stock' => 200, 'image_url' => 'images/vitamin_d3.jpg', 'color' => 'Yellow', 'rating' => 4.5, 'discount' => 2.00, 'category_id' => 4],
          ['name' => 'Magnesium Complex', 'description' => 'Supports muscle and nerve function with magnesium.', 'price' => 18.00, 'stock' => 160, 'image_url' => 'images/magnesium_complex.jpg', 'color' => 'White', 'rating' => 4.7, 'discount' => 2.50, 'category_id' => 4],
          ['name' => 'Turmeric Curcumin', 'description' => 'Natural anti-inflammatory supplement with turmeric.', 'price' => 27.00, 'stock' => 140, 'image_url' => 'images/turmeric_curcumin.jpg', 'color' => 'Orange', 'rating' => 4.8, 'discount' => 3.00, 'category_id' => 4],
          ['name' => 'Protein Powder', 'description' => 'High-quality protein powder for muscle recovery.', 'price' => 35.00, 'stock' => 110, 'image_url' => 'images/protein_powder.jpg', 'color' => 'Chocolate', 'rating' => 4.6, 'discount' => 5.00, 'category_id' => 4],
          ['name' => 'Iron Supplements', 'description' => 'Helps maintain healthy iron levels in the blood.', 'price' => 21.00, 'stock' => 130, 'image_url' => 'images/iron_supplements.jpg', 'color' => 'Red', 'rating' => 4.4, 'discount' => 3.00, 'category_id' => 4],
          ['name' => 'Vitamin C', 'description' => 'Boosts immune health and promotes skin health.', 'price' => 16.00, 'stock' => 190, 'image_url' => 'images/vitamin_c.jpg', 'color' => 'Orange', 'rating' => 4.7, 'discount' => 2.50, 'category_id' => 4],
          ['name' => 'CoQ10', 'description' => 'Supports cellular energy production and heart health.', 'price' => 24.00, 'stock' => 150, 'image_url' => 'images/coq10.jpg', 'color' => 'Yellow', 'rating' => 4.8, 'discount' => 3.00, 'category_id' => 4],
        ];

        $body_care = [
          ['name' => 'Body Lotion', 'description' => 'Hydrating body lotion with a rich, creamy texture.', 'price' => 24.00, 'stock' => 130, 'image_url' => 'images/body_lotion.jpg', 'color' => 'White', 'rating' => 4.6, 'discount' => 3.00, 'category_id' => 5],
          ['name' => 'Body Scrub', 'description' => 'Exfoliating scrub to remove dead skin cells and leave skin smooth.', 'price' => 22.00, 'stock' => 140, 'image_url' => 'images/body_scrub.jpg', 'color' => 'Pink', 'rating' => 4.7, 'discount' => 2.50, 'category_id' => 5],
          ['name' => 'Body Wash', 'description' => 'Gentle body wash with nourishing ingredients.', 'price' => 18.00, 'stock' => 150, 'image_url' => 'images/body_wash.jpg', 'color' => 'Clear', 'rating' => 4.5, 'discount' => 3.00, 'category_id' => 5],
          ['name' => 'Hand Cream', 'description' => 'Rich hand cream to keep your hands soft and hydrated.', 'price' => 15.00, 'stock' => 160, 'image_url' => 'images/hand_cream.jpg', 'color' => 'White', 'rating' => 4.6, 'discount' => 2.00, 'category_id' => 5],
          ['name' => 'Body Oil', 'description' => 'Nourishing body oil for deep hydration and a glowing complexion.', 'price' => 30.00, 'stock' => 120, 'image_url' => 'images/body_oil.jpg', 'color' => 'Golden', 'rating' => 4.8, 'discount' => 4.00, 'category_id' => 5],
          ['name' => 'Foot Cream', 'description' => 'Soothing foot cream to pamper tired feet.', 'price' => 20.00, 'stock' => 140, 'image_url' => 'images/foot_cream.jpg', 'color' => 'White', 'rating' => 4.7, 'discount' => 3.00, 'category_id' => 5],
          ['name' => 'Shaving Cream', 'description' => 'Rich, creamy shaving cream for a smooth shave.', 'price' => 17.00, 'stock' => 150, 'image_url' => 'images/shaving_cream.jpg', 'color' => 'White', 'rating' => 4.5, 'discount' => 2.00, 'category_id' => 5],
          ['name' => 'Exfoliating Mitt', 'description' => 'Exfoliating mitt for removing dead skin and improving circulation.', 'price' => 12.00, 'stock' => 180, 'image_url' => 'images/exfoliating_mitt.jpg', 'color' => 'Beige', 'rating' => 4.6, 'discount' => 1.50, 'category_id' => 5],
          ['name' => 'Self-Tanner', 'description' => 'Self-tanner for a natural-looking, sun-kissed glow.', 'price' => 28.00, 'stock' => 110, 'image_url' => 'images/self_tanner.jpg', 'color' => 'Brown', 'rating' => 4.7, 'discount' => 3.00, 'category_id' => 5],
          ['name' => 'After-Sun Lotion', 'description' => 'Cooling lotion to soothe skin after sun exposure.', 'price' => 25.00, 'stock' => 130, 'image_url' => 'images/after_sun_lotion.jpg', 'color' => 'White', 'rating' => 4.8, 'discount' => 4.00, 'category_id' => 5],
        ];

        $essential_oils = [
          ['name' => 'Lavender Oil', 'description' => 'Soothing lavender essential oil for relaxation.', 'price' => 18.00, 'stock' => 150, 'image_url' => 'images/lavender_oil.jpg', 'color' => 'Purple', 'rating' => 4.8, 'discount' => 2.00, 'category_id' => 6],
          ['name' => 'Peppermint Oil', 'description' => 'Refreshing peppermint essential oil for mental clarity.', 'price' => 20.00, 'stock' => 140, 'image_url' => 'images/peppermint_oil.jpg', 'color' => 'Green', 'rating' => 4.7, 'discount' => 3.00, 'category_id' => 6],
          ['name' => 'Eucalyptus Oil', 'description' => 'Cleansing eucalyptus essential oil for respiratory support.', 'price' => 22.00, 'stock' => 130, 'image_url' => 'images/eucalyptus_oil.jpg', 'color' => 'Clear', 'rating' => 4.6, 'discount' => 2.50, 'category_id' => 6],
          ['name' => 'Tea Tree Oil', 'description' => 'Antiseptic tea tree oil for skin care.', 'price' => 25.00, 'stock' => 120, 'image_url' => 'images/tea_tree_oil.jpg', 'color' => 'Yellow', 'rating' => 4.8, 'discount' => 3.00, 'category_id' => 6],
          ['name' => 'Rosemary Oil', 'description' => 'Stimulating rosemary essential oil for hair health.', 'price' => 21.00, 'stock' => 150, 'image_url' => 'images/rosemary_oil.jpg', 'color' => 'Green', 'rating' => 4.7, 'discount' => 2.00, 'category_id' => 6],
          ['name' => 'Frankincense Oil', 'description' => 'Rejuvenating frankincense essential oil for skincare.', 'price' => 30.00, 'stock' => 110, 'image_url' => 'images/frankincense_oil.jpg', 'color' => 'Golden', 'rating' => 4.9, 'discount' => 4.00, 'category_id' => 6],
          ['name' => 'Chamomile Oil', 'description' => 'Calming chamomile essential oil for relaxation and sleep.', 'price' => 27.00, 'stock' => 140, 'image_url' => 'images/chamomile_oil.jpg', 'color' => 'Blue', 'rating' => 4.8, 'discount' => 3.00, 'category_id' => 6],
          ['name' => 'Jasmine Oil', 'description' => 'Exotic jasmine essential oil for a soothing and uplifting aroma.', 'price' => 35.00, 'stock' => 90, 'image_url' => 'images/jasmine_oil.jpg', 'color' => 'Yellow', 'rating' => 4.9, 'discount' => 5.00, 'category_id' => 6],
          ['name' => 'Geranium Oil', 'description' => 'Balancing geranium essential oil for skin and emotional well-being.', 'price' => 23.00, 'stock' => 130, 'image_url' => 'images/geranium_oil.jpg', 'color' => 'Pink', 'rating' => 4.7, 'discount' => 3.00, 'category_id' => 6],
          ['name' => 'Ylang Ylang Oil', 'description' => 'Sensual ylang ylang essential oil for relaxation and mood enhancement.', 'price' => 28.00, 'stock' => 120, 'image_url' => 'images/ylang_ylang_oil.jpg', 'color' => 'Yellow', 'rating' => 4.8, 'discount' => 4.00, 'category_id' => 6],
        ];

        $oral_care = [
          ['name' => 'Whitening Toothpaste', 'description' => 'Toothpaste designed to remove stains and whiten teeth.', 'price' => 12.00, 'stock' => 150, 'image_url' => 'images/whitening_toothpaste.jpg', 'color' => 'White', 'rating' => 4.5, 'discount' => 2.00, 'category_id' => 7],
          ['name' => 'Mouthwash', 'description' => 'Antimicrobial mouthwash for fresh breath and oral hygiene.', 'price' => 15.00, 'stock' => 130, 'image_url' => 'images/mouthwash.jpg', 'color' => 'Blue', 'rating' => 4.6, 'discount' => 2.50, 'category_id' => 7],
          ['name' => 'Fluoride Toothpaste', 'description' => 'Fluoride toothpaste to help prevent cavities.', 'price' => 10.00, 'stock' => 140, 'image_url' => 'images/fluoride_toothpaste.jpg', 'color' => 'White', 'rating' => 4.7, 'discount' => 1.50, 'category_id' => 7],
          ['name' => 'Electric Toothbrush', 'description' => 'Electric toothbrush with multiple cleaning modes.', 'price' => 60.00, 'stock' => 120, 'image_url' => 'images/electric_toothbrush.jpg', 'color' => 'Black', 'rating' => 4.8, 'discount' => 10.00, 'category_id' => 7],
          ['name' => 'Dental Floss', 'description' => 'Mint-flavored dental floss for effective interdental cleaning.', 'price' => 8.00, 'stock' => 180, 'image_url' => 'images/dental_floss.jpg', 'color' => 'White', 'rating' => 4.4, 'discount' => 1.00, 'category_id' => 7],
          ['name' => 'Tooth Whitening Kit', 'description' => 'Complete kit for at-home tooth whitening.', 'price' => 45.00, 'stock' => 100, 'image_url' => 'images/tooth_whitening_kit.jpg', 'color' => 'White', 'rating' => 4.7, 'discount' => 5.00, 'category_id' => 7],
          ['name' => 'Teeth Whitening Strips', 'description' => 'Convenient teeth whitening strips for a brighter smile.', 'price' => 25.00, 'stock' => 130, 'image_url' => 'images/teeth_whitening_strips.jpg', 'color' => 'White', 'rating' => 4.6, 'discount' => 3.00, 'category_id' => 7],
          ['name' => 'Breath Freshener Spray', 'description' => 'Portable breath freshener spray for on-the-go freshness.', 'price' => 9.00, 'stock' => 160, 'image_url' => 'images/breath_freshener_spray.jpg', 'color' => 'Clear', 'rating' => 4.5, 'discount' => 1.50, 'category_id' => 7],
          ['name' => 'Sensitive Toothpaste', 'description' => 'Toothpaste designed for sensitive teeth and gums.', 'price' => 13.00, 'stock' => 140, 'image_url' => 'images/sensitive_toothpaste.jpg', 'color' => 'White', 'rating' => 4.6, 'discount' => 2.00, 'category_id' => 7],
          ['name' => 'Tongue Scraper', 'description' => 'Metal tongue scraper for removing bacteria and improving breath.', 'price' => 7.00, 'stock' => 170, 'image_url' => 'images/tongue_scraper.jpg', 'color' => 'Silver', 'rating' => 4.4, 'discount' => 1.00, 'category_id' => 7],
        ];

        $mens_grooming = [
          ['name' => 'Beard Oil', 'description' => 'Nourishing beard oil to soften and condition facial hair.', 'price' => 25.00, 'stock' => 130, 'image_url' => 'images/beard_oil.jpg', 'color' => 'Amber', 'rating' => 4.7, 'discount' => 3.00, 'category_id' => 8],
          ['name' => 'Shaving Cream', 'description' => 'Rich shaving cream for a smooth, close shave.', 'price' => 20.00, 'stock' => 140, 'image_url' => 'images/shaving_cream.jpg', 'color' => 'White', 'rating' => 4.6, 'discount' => 2.50, 'category_id' => 8],
          ['name' => 'Aftershave Balm', 'description' => 'Soothing aftershave balm to reduce irritation and hydrate skin.', 'price' => 22.00, 'stock' => 120, 'image_url' => 'images/aftershave_balm.jpg', 'color' => 'Clear', 'rating' => 4.8, 'discount' => 2.00, 'category_id' => 8],
          ['name' => 'Hair Styling Gel', 'description' => 'Strong hold hair gel for creating and maintaining hairstyles.', 'price' => 18.00, 'stock' => 150, 'image_url' => 'images/hair_styling_gel.jpg', 'color' => 'Clear', 'rating' => 4.5, 'discount' => 1.50, 'category_id' => 8],
          ['name' => 'Face Cleanser', 'description' => 'Gentle face cleanser for daily use and deep cleaning.', 'price' => 15.00, 'stock' => 160, 'image_url' => 'images/face_cleanser.jpg', 'color' => 'Blue', 'rating' => 4.6, 'discount' => 2.00, 'category_id' => 8],
          ['name' => 'Moisturizing Cream', 'description' => 'Hydrating cream for keeping skin smooth and moisturized.', 'price' => 27.00, 'stock' => 110, 'image_url' => 'images/moisturizing_cream.jpg', 'color' => 'White', 'rating' => 4.7, 'discount' => 3.00, 'category_id' => 8],
          ['name' => 'Deodorant', 'description' => 'Long-lasting deodorant for all-day freshness.', 'price' => 10.00, 'stock' => 180, 'image_url' => 'images/deodorant.jpg', 'color' => 'White', 'rating' => 4.4, 'discount' => 1.00, 'category_id' => 8],
          ['name' => 'Beard Shampoo', 'description' => 'Specially formulated shampoo for cleansing and conditioning beards.', 'price' => 19.00, 'stock' => 140, 'image_url' => 'images/beard_shampoo.jpg', 'color' => 'Clear', 'rating' => 4.6, 'discount' => 2.00, 'category_id' => 8],
          ['name' => 'Hair Conditioner', 'description' => 'Conditioner to keep hair soft and manageable.', 'price' => 16.00, 'stock' => 150, 'image_url' => 'images/hair_conditioner.jpg', 'color' => 'Clear', 'rating' => 4.5, 'discount' => 1.50, 'category_id' => 8],
          ['name' => 'Hair Pomade', 'description' => 'Classic pomade for styling and shaping hair.', 'price' => 21.00, 'stock' => 130, 'image_url' => 'images/hair_pomade.jpg', 'color' => 'Brown', 'rating' => 4.7, 'discount' => 2.00, 'category_id' => 8],
        ];

        DB::table('products')->insert($skincare);
        DB::table('products')->insert($haircare);
        DB::table('products')->insert($makeup);
        DB::table('products')->insert($health_supplements);
        DB::table('products')->insert($essential_oils);
        DB::table('products')->insert($oral_care);
        DB::table('products')->insert($mens_grooming);
        DB::table('products')->insert($body_care);
    }
}
