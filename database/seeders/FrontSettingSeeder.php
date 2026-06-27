<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FrontSetting;

class FrontSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        // Home Page Setting
        $data = [
            // Main image
            [
                'name' => 'Main image',
                'slug' => 'main-image',
                'value' => null,
                'page_name' => 'Home'
            ], 
            [
                'name' => 'Main image tag',
                'slug' => 'main-image-tag',
                'value' => 'Your Partner in Financial Success',
                'page_name' => 'Home'
            ],
            [
                'name' => 'Main image title',
                'slug' => 'main-image-title',
                'value' => 'Secure Your Financial Future with Confidence',
                'page_name' => 'Home'
            ],
            [
                'name' => 'Main image description',
                'slug' => 'main-image-description',
                'value' => 'We provide expert financial services tailored to your unique goals. Whether you’re planning for retirement, investing, or managing assets, our team is here to guide you every step of the way.',
                'page_name' => 'Home'
            ],

            // Experience title & description
            [
                'name' => 'Experience title 1',
                'slug' => 'experience-title-1',
                'value' => 'Experienced Professionals',
                'page_name' => 'Home'
            ],
            [
                'name' => 'Experience description 1',
                'slug' => 'experience-description-1',
                'value' => 'Decades of expertise in financial services.',
                'page_name' => 'Home'
            ],
            [
                'name' => 'Experience title 2',
                'slug' => 'experience-title-2',
                'value' => 'Personalized Solutions',
                'page_name' => 'Home'
            ],
            [
                'name' => 'Experience description 2',
                'slug' => 'experience-description-2',
                'value' => 'Tailored professional strategies to fit your needs.',
                'page_name' => 'Home'
            ],
            [
                'name' => 'Experience title 3',
                'slug' => 'experience-title-3',
                'value' => 'Proven Success',
                'page_name' => 'Home'
            ],
            [
                'name' => 'Experience description 3',
                'slug' => 'experience-description-3',
                'value' => 'A track record of helping clients achieve financial freedom.',
                'page_name' => 'Home'
            ],

            // INSURANCE 
            [
                'name' => 'Insurance main title',
                'slug' => 'insurance-main-title',
                'value' => 'Protect What Matters Most with the Right Insurancer',
                'page_name' => 'Home'
            ],
            [
                'name' => 'Insurance card title 1',
                'slug' => 'insurance-card-title-1',
                'value' => 'Life Insurance',
                'page_name' => 'Home'
            ],
            [
                'name' => 'Insurance card description 1',
                'slug' => 'insurance-card-description-1',
                'value' => 'Secure your familys financial future with comprehensive life insurance coverage tailored to your needs.',
                'page_name' => 'Home'
            ],
            [
                'name' => 'Insurance card title 2',
                'slug' => 'insurance-card-title-2',
                'value' => 'Health Insurance',
                'page_name' => 'Home'
            ],
            [
                'name' => 'Insurance card description 2',
                'slug' => 'insurance-card-description-2',
                'value' => 'Get peace of mind with reliable health coverage that ensures access to quality medical care when you need it most.',
                'page_name' => 'Home'
            ],
            [
                'name' => 'Insurance card title 3',
                'slug' => 'insurance-card-title-3',
                'value' => 'General Insurance',
                'page_name' => 'Home'
            ],
            [
                'name' => 'Insurance card description 3',
                'slug' => 'insurance-card-description-3',
                'value' => 'Protect your assets and mitigate risks with customized general insurance solutions for every stage of life.',
                'page_name' => 'Home'
            ],

            // Investment 
            [
                'name' => 'Investment main title',
                'slug' => 'investment-main-title',
                'value' => 'Grow Your Wealth with Smart Investment Strategies',
                'page_name' => 'Home'
            ],
            [
                'name' => 'Investment card title 1',
                'slug' => 'investment-card-title-1',
                'value' => 'Mutual Funds',
                'page_name' => 'Home'
            ],
            [
                'name' => 'Investment card description 1',
                'slug' => 'investment-card-description-1',
                'value' => 'Diversify your portfolio with expertly managed mutual funds Earn stable returns with low-risk investment options.',
                'page_name' => 'Home'
            ],
            [
                'name' => 'Investment card title 2',
                'slug' => 'investment-card-title-2',
                'value' => 'Corporate Bonds & Fixed Deposits',
                'page_name' => 'Home'
            ],
            [
                'name' => 'Investment card description 2',
                'slug' => 'investment-card-description-2',
                'value' => 'Earn stable returns with low-risk investment options.',
                'page_name' => 'Home'
            ],
            [
                'name' => 'Investment card title 3',
                'slug' => 'investment-card-title-3',
                'value' => 'Premium Investment Strategies',
                'page_name' => 'Home'
            ],
            [
                'name' => 'Investment card description 3',
                'slug' => 'investment-card-description-3',
                'value' => 'Maximize wealth with tailored, high-value investment plans.',
                'page_name' => 'Home'
            ],

            // smart tools
            [
                'name' => 'Smart tools image',
                'slug' => 'smart-tools-image',
                'value' => null,
                'page_name' => 'Home'
            ], 
            [
                'name' => 'Smart tools title',
                'slug' => 'smart-tools-title',
                'value' => 'Smart Financial Tools to Plan Your Future',
                'page_name' => 'Home'
            ],
            [
                'name' => 'Smart tools description',
                'slug' => 'smart-tools-description',
                'value' => 'Take control of your financial future with our smart tools, including retirement calculators, goal-based planning, and more. Easily assess your financial needs and make informed decisions with confidence.',
                'page_name' => 'Home'
            ],
            [
                'name' => 'Smart tools card title 1',
                'slug' => 'smart-tools-card-title-1',
                'value' => 'SIP Calculator',
                'page_name' => 'Home'
            ],
            [
                'name' => 'Smart tools card description 1',
                'slug' => 'smart-tools-card-description-1',
                'value' => 'Plan your investments and estimate returns with ease.',
                'page_name' => 'Home'
            ],
            [
                'name' => 'Smart tools card title 2',
                'slug' => 'smart-tools-card-title-2',
                'value' => 'Retirement Calculator',
                'page_name' => 'Home'
            ],
            [
                'name' => 'Smart tools card description 2',
                'slug' => 'smart-tools-card-description-2',
                'value' => 'Secure your future by calculating your ideal retirement savings.',
                'page_name' => 'Home'
            ],
            [
                'name' => 'Smart tools card title 3',
                'slug' => 'smart-tools-card-title-3',
                'value' => 'Goal-Based Planning',
                'page_name' => 'Home'
            ],
            [
                'name' => 'Smart tools card description 3',
                'slug' => 'smart-tools-card-description-3',
                'value' => 'Set, track, and achieve your financial goals with confidence.',
                'page_name' => 'Home'
            ],

            // Testimonial
            [
                'name' => 'Testimonial title',
                'slug' => 'testimonial-title',
                'value' => 'What Our Client Says',
                'page_name' => 'Home'
            ],
            [
                'name' => 'Testimonial description',
                'slug' => 'testimonial-description',
                'value' => 'See what our clients have to say about their journey with us. Their success stories reflect our commitment to providing expert financial guidance and personalized solutions.',
                'page_name' => 'Home'
            ],

            // About Page Setting

            // About main 
            [
                'name' => 'About main image',
                'slug' => 'about-main-image',
                'value' => null,
                'page_name' => 'About'
            ],
            [
                'name' => 'About main title',
                'slug' => 'about-main-title',
                'value' => 'Empowering Your Financial Future with Confidences',
                'page_name' => 'About'
            ],
            [
                'name' => 'About main description',
                'slug' => 'about-main-description',
                'value' => 'At Sampad Finserv, we believe that financial security starts with the right strategy. With our expertise in insurance and investment, we provide tailored solutions that help you protect, grow, and manage your wealth effectively. Our commitment to trust and transparency ensures you make informed decisions with confidence.',
                'page_name' => 'About'
            ],

            // MILESTONE
            [
                'name' => 'Milestone main title',
                'slug' => 'milestone-main-title',
                'value' => 'Our Journey of Growth & Excellence',
                'page_name' => 'About'
            ],
            [
                'name' => 'Milestone year title 1',
                'slug' => 'milestone-year-title-1',
                'value' => 'Laying the Foundation',
                'page_name' => 'About'
            ],
            [
                'name' => 'Milestone year description 1',
                'slug' => 'milestone-year-description-1',
                'value' => 'Established with a vision to provide reliable insurance and investment solutions.',
                'page_name' => 'About'
            ],
            [
                'name' => 'Milestone year title 2',
                'slug' => 'milestone-year-title-2',
                'value' => 'Building Trust & Expanding Services',
                'page_name' => 'About'
            ],
            [
                'name' => 'Milestone year description 2',
                'slug' => 'milestone-year-description-2',
                'value' => 'Gained our first major clients and expanded our service offerings to meet diverse financial needs.',
                'page_name' => 'About'
            ],
            [
                'name' => 'Milestone year title 3',
                'slug' => 'milestone-year-title-3',
                'value' => 'A Recognized Financial Partner',
                'page_name' => 'About'
            ],
            [
                'name' => 'Milestone year description 3',
                'slug' => 'milestone-year-description-3',
                'value' => 'Strengthened our reputation in the industry, helping more individuals and businesses secure their financial future.',
                'page_name' => 'About'
            ],

            // Smart Tools Page Setting

            [
                'name' => 'Smart tools retirement title',
                'slug' => 'smart-tools-retirement-title',
                'value' => 'Secure Your Future with Smart Retirement Planning',
                'page_name' => 'SmartTools'
            ],
            [
                'name' => 'Smart tools retirement description',
                'slug' => 'smart-tools-retirement-description',
                'value' => 'A comfortable retirement starts with smart planning today. Use our calculator to estimate the savings you need, adjust your contributions, and ensure financial security for your golden years. Take charge of your future with confidence.',
                'page_name' => 'SmartTools'
            ],
        ];

        foreach ($data as $key => $value) {

            $find = FrontSetting::where('slug', $value['slug'])->first();

            if (is_null($find)) {
                FrontSetting::create($value);
            } else {
                $find->update($value);
            }
        }
    }
}
