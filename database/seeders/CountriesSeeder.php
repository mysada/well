<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesSeeder extends Seeder
{

    public function run()
    {
        $primaryCountries = [
          ['code' => 'CA', 'name' => 'Canada', 'shipping_rate' => 10.00],
          ['code' => 'US', 'name' => 'United States', 'shipping_rate' => 15.00],
        ];
        DB::table('countries')->insert($primaryCountries);

        $countries = [

          ['code' => 'AF', 'name' => 'Afghanistan', 'shipping_rate' => 45.00],
          ['code' => 'AL', 'name' => 'Albania', 'shipping_rate' => 35.00],
          ['code' => 'DZ', 'name' => 'Algeria', 'shipping_rate' => 40.00],
          ['code' => 'AD', 'name' => 'Andorra', 'shipping_rate' => 30.00],
          ['code' => 'AO', 'name' => 'Angola', 'shipping_rate' => 50.00],
          [
            'code'          => 'AG',
            'name'          => 'Antigua and Barbuda',
            'shipping_rate' => 25.00,
          ],
          ['code' => 'AR', 'name' => 'Argentina', 'shipping_rate' => 35.00],
          ['code' => 'AM', 'name' => 'Armenia', 'shipping_rate' => 40.00],
          ['code' => 'AU', 'name' => 'Australia', 'shipping_rate' => 55.00],
          ['code' => 'AT', 'name' => 'Austria', 'shipping_rate' => 30.00],
          ['code' => 'AZ', 'name' => 'Azerbaijan', 'shipping_rate' => 40.00],
          ['code' => 'BS', 'name' => 'Bahamas', 'shipping_rate' => 25.00],
          ['code' => 'BH', 'name' => 'Bahrain', 'shipping_rate' => 45.00],
          ['code' => 'BD', 'name' => 'Bangladesh', 'shipping_rate' => 50.00],
          ['code' => 'BB', 'name' => 'Barbados', 'shipping_rate' => 30.00],
          ['code' => 'BY', 'name' => 'Belarus', 'shipping_rate' => 35.00],
          ['code' => 'BE', 'name' => 'Belgium', 'shipping_rate' => 30.00],
          ['code' => 'BZ', 'name' => 'Belize', 'shipping_rate' => 25.00],
          ['code' => 'BJ', 'name' => 'Benin', 'shipping_rate' => 45.00],
          ['code' => 'BT', 'name' => 'Bhutan', 'shipping_rate' => 50.00],
          ['code' => 'BO', 'name' => 'Bolivia', 'shipping_rate' => 35.00],
          [
            'code'          => 'BA',
            'name'          => 'Bosnia and Herzegovina',
            'shipping_rate' => 35.00,
          ],
          ['code' => 'BW', 'name' => 'Botswana', 'shipping_rate' => 50.00],
          ['code' => 'BR', 'name' => 'Brazil', 'shipping_rate' => 40.00],
          ['code' => 'BN', 'name' => 'Brunei', 'shipping_rate' => 55.00],
          ['code' => 'BG', 'name' => 'Bulgaria', 'shipping_rate' => 35.00],
          ['code' => 'BF', 'name' => 'Burkina Faso', 'shipping_rate' => 45.00],
          ['code' => 'BI', 'name' => 'Burundi', 'shipping_rate' => 50.00],
          ['code' => 'KH', 'name' => 'Cambodia', 'shipping_rate' => 55.00],
          ['code' => 'CM', 'name' => 'Cameroon', 'shipping_rate' => 45.00],
          ['code' => 'CV', 'name' => 'Cape Verde', 'shipping_rate' => 40.00],
          [
            'code'          => 'CF',
            'name'          => 'Central African Republic',
            'shipping_rate' => 50.00,
          ],
          ['code' => 'TD', 'name' => 'Chad', 'shipping_rate' => 50.00],
          ['code' => 'CL', 'name' => 'Chile', 'shipping_rate' => 40.00],
          ['code' => 'CN', 'name' => 'China', 'shipping_rate' => 55.00],
          ['code' => 'CO', 'name' => 'Colombia', 'shipping_rate' => 35.00],
          ['code' => 'KM', 'name' => 'Comoros', 'shipping_rate' => 55.00],
          ['code' => 'CG', 'name' => 'Congo', 'shipping_rate' => 50.00],
          ['code' => 'CR', 'name' => 'Costa Rica', 'shipping_rate' => 30.00],
          ['code' => 'HR', 'name' => 'Croatia', 'shipping_rate' => 35.00],
          ['code' => 'CU', 'name' => 'Cuba', 'shipping_rate' => 25.00],
          ['code' => 'CY', 'name' => 'Cyprus', 'shipping_rate' => 40.00],
          [
            'code'          => 'CZ',
            'name'          => 'Czech Republic',
            'shipping_rate' => 35.00,
          ],
          ['code' => 'DK', 'name' => 'Denmark', 'shipping_rate' => 30.00],
          ['code' => 'DJ', 'name' => 'Djibouti', 'shipping_rate' => 50.00],
          ['code' => 'DM', 'name' => 'Dominica', 'shipping_rate' => 30.00],
          [
            'code'          => 'DO',
            'name'          => 'Dominican Republic',
            'shipping_rate' => 30.00,
          ],
          ['code' => 'EC', 'name' => 'Ecuador', 'shipping_rate' => 35.00],
          ['code' => 'EG', 'name' => 'Egypt', 'shipping_rate' => 45.00],
          ['code' => 'SV', 'name' => 'El Salvador', 'shipping_rate' => 30.00],
          [
            'code'          => 'GQ',
            'name'          => 'Equatorial Guinea',
            'shipping_rate' => 50.00,
          ],
          ['code' => 'ER', 'name' => 'Eritrea', 'shipping_rate' => 50.00],
          ['code' => 'EE', 'name' => 'Estonia', 'shipping_rate' => 35.00],
          ['code' => 'ET', 'name' => 'Ethiopia', 'shipping_rate' => 50.00],
          ['code' => 'FJ', 'name' => 'Fiji', 'shipping_rate' => 60.00],
          ['code' => 'FI', 'name' => 'Finland', 'shipping_rate' => 35.00],
          ['code' => 'FR', 'name' => 'France', 'shipping_rate' => 30.00],
          ['code' => 'GA', 'name' => 'Gabon', 'shipping_rate' => 50.00],
          ['code' => 'GM', 'name' => 'Gambia', 'shipping_rate' => 45.00],
          ['code' => 'GE', 'name' => 'Georgia', 'shipping_rate' => 40.00],
          ['code' => 'DE', 'name' => 'Germany', 'shipping_rate' => 30.00],
          ['code' => 'GH', 'name' => 'Ghana', 'shipping_rate' => 45.00],
          ['code' => 'GR', 'name' => 'Greece', 'shipping_rate' => 35.00],
          ['code' => 'GD', 'name' => 'Grenada', 'shipping_rate' => 30.00],
          ['code' => 'GT', 'name' => 'Guatemala', 'shipping_rate' => 30.00],
          ['code' => 'GN', 'name' => 'Guinea', 'shipping_rate' => 45.00],
          ['code' => 'GW', 'name' => 'Guinea-Bissau', 'shipping_rate' => 45.00],
          ['code' => 'GY', 'name' => 'Guyana', 'shipping_rate' => 35.00],
          ['code' => 'HT', 'name' => 'Haiti', 'shipping_rate' => 30.00],
          ['code' => 'HN', 'name' => 'Honduras', 'shipping_rate' => 30.00],
          ['code' => 'HU', 'name' => 'Hungary', 'shipping_rate' => 35.00],
          ['code' => 'IS', 'name' => 'Iceland', 'shipping_rate' => 35.00],
          ['code' => 'IN', 'name' => 'India', 'shipping_rate' => 50.00],
          ['code' => 'ID', 'name' => 'Indonesia', 'shipping_rate' => 55.00],
          ['code' => 'IR', 'name' => 'Iran', 'shipping_rate' => 45.00],
          ['code' => 'IQ', 'name' => 'Iraq', 'shipping_rate' => 45.00],
          ['code' => 'IE', 'name' => 'Ireland', 'shipping_rate' => 30.00],
          ['code' => 'IL', 'name' => 'Israel', 'shipping_rate' => 40.00],
          ['code' => 'IT', 'name' => 'Italy', 'shipping_rate' => 35.00],
          ['code' => 'CI', 'name' => 'Ivory Coast', 'shipping_rate' => 45.00],
          ['code' => 'JM', 'name' => 'Jamaica', 'shipping_rate' => 30.00],
          ['code' => 'JP', 'name' => 'Japan', 'shipping_rate' => 55.00],
          ['code' => 'JO', 'name' => 'Jordan', 'shipping_rate' => 45.00],
          ['code' => 'KZ', 'name' => 'Kazakhstan', 'shipping_rate' => 45.00],
          ['code' => 'KE', 'name' => 'Kenya', 'shipping_rate' => 50.00],
          ['code' => 'KI', 'name' => 'Kiribati', 'shipping_rate' => 60.00],
          ['code' => 'KP', 'name' => 'North Korea', 'shipping_rate' => 55.00],
          ['code' => 'KR', 'name' => 'South Korea', 'shipping_rate' => 55.00],
          ['code' => 'KW', 'name' => 'Kuwait', 'shipping_rate' => 45.00],
          ['code' => 'KG', 'name' => 'Kyrgyzstan', 'shipping_rate' => 45.00],
          ['code' => 'LA', 'name' => 'Laos', 'shipping_rate' => 55.00],
          ['code' => 'LV', 'name' => 'Latvia', 'shipping_rate' => 35.00],
          ['code' => 'LB', 'name' => 'Lebanon', 'shipping_rate' => 45.00],
          ['code' => 'LS', 'name' => 'Lesotho', 'shipping_rate' => 50.00],
          ['code' => 'LR', 'name' => 'Liberia', 'shipping_rate' => 45.00],
          ['code' => 'LY', 'name' => 'Libya', 'shipping_rate' => 45.00],
          ['code' => 'LI', 'name' => 'Liechtenstein', 'shipping_rate' => 30.00],
          ['code' => 'LT', 'name' => 'Lithuania', 'shipping_rate' => 35.00],
          ['code' => 'LU', 'name' => 'Luxembourg', 'shipping_rate' => 30.00],
          [
            'code'          => 'MK',
            'name'          => 'North Macedonia',
            'shipping_rate' => 35.00,
          ],
          ['code' => 'MG', 'name' => 'Madagascar', 'shipping_rate' => 55.00],
          ['code' => 'MW', 'name' => 'Malawi', 'shipping_rate' => 50.00],
          ['code' => 'MY', 'name' => 'Malaysia', 'shipping_rate' => 55.00],
          ['code' => 'MV', 'name' => 'Maldives', 'shipping_rate' => 55.00],
          ['code' => 'ML', 'name' => 'Mali', 'shipping_rate' => 45.00],
          ['code' => 'MT', 'name' => 'Malta', 'shipping_rate' => 40.00],
          [
            'code'          => 'MH',
            'name'          => 'Marshall Islands',
            'shipping_rate' => 60.00,
          ],
          ['code' => 'MR', 'name' => 'Mauritania', 'shipping_rate' => 45.00],
          ['code' => 'MU', 'name' => 'Mauritius', 'shipping_rate' => 55.00],
          ['code' => 'MX', 'name' => 'Mexico', 'shipping_rate' => 25.00],
          ['code' => 'FM', 'name' => 'Micronesia', 'shipping_rate' => 60.00],
          ['code' => 'MD', 'name' => 'Moldova', 'shipping_rate' => 35.00],
          ['code' => 'MC', 'name' => 'Monaco', 'shipping_rate' => 30.00],
          ['code' => 'MN', 'name' => 'Mongolia', 'shipping_rate' => 55.00],
          ['code' => 'ME', 'name' => 'Montenegro', 'shipping_rate' => 35.00],
          ['code' => 'MA', 'name' => 'Morocco', 'shipping_rate' => 40.00],
          ['code' => 'MZ', 'name' => 'Mozambique', 'shipping_rate' => 50.00],
          ['code' => 'MM', 'name' => 'Myanmar', 'shipping_rate' => 55.00],
          ['code' => 'NA', 'name' => 'Namibia', 'shipping_rate' => 50.00],
          ['code' => 'NR', 'name' => 'Nauru', 'shipping_rate' => 60.00],
          ['code' => 'NP', 'name' => 'Nepal', 'shipping_rate' => 50.00],
          ['code' => 'NL', 'name' => 'Netherlands', 'shipping_rate' => 30.00],
          ['code' => 'NZ', 'name' => 'New Zealand', 'shipping_rate' => 60.00],
          ['code' => 'NI', 'name' => 'Nicaragua', 'shipping_rate' => 30.00],
          ['code' => 'NE', 'name' => 'Niger', 'shipping_rate' => 45.00],
          ['code' => 'NG', 'name' => 'Nigeria', 'shipping_rate' => 45.00],
          ['code' => 'NO', 'name' => 'Norway', 'shipping_rate' => 35.00],
          ['code' => 'OM', 'name' => 'Oman', 'shipping_rate' => 45.00],
          ['code' => 'PK', 'name' => 'Pakistan', 'shipping_rate' => 50.00],
          ['code' => 'PW', 'name' => 'Palau', 'shipping_rate' => 60.00],
          ['code' => 'PA', 'name' => 'Panama', 'shipping_rate' => 30.00],
          [
            'code'          => 'PG',
            'name'          => 'Papua New Guinea',
            'shipping_rate' => 60.00,
          ],
          ['code' => 'PY', 'name' => 'Paraguay', 'shipping_rate' => 40.00],
          ['code' => 'PE', 'name' => 'Peru', 'shipping_rate' => 40.00],
          ['code' => 'PH', 'name' => 'Philippines', 'shipping_rate' => 55.00],
          ['code' => 'PL', 'name' => 'Poland', 'shipping_rate' => 35.00],
          ['code' => 'PT', 'name' => 'Portugal', 'shipping_rate' => 35.00],
          ['code' => 'QA', 'name' => 'Qatar', 'shipping_rate' => 45.00],
          ['code' => 'RO', 'name' => 'Romania', 'shipping_rate' => 35.00],
          ['code' => 'RU', 'name' => 'Russia', 'shipping_rate' => 45.00],
          ['code' => 'RW', 'name' => 'Rwanda', 'shipping_rate' => 50.00],
          [
            'code'          => 'KN',
            'name'          => 'Saint Kitts and Nevis',
            'shipping_rate' => 30.00,
          ],
          ['code' => 'LC', 'name' => 'Saint Lucia', 'shipping_rate' => 30.00],
          [
            'code'          => 'VC',
            'name'          => 'Saint Vincent and the Grenadines',
            'shipping_rate' => 30.00,
          ],
          ['code' => 'WS', 'name' => 'Samoa', 'shipping_rate' => 60.00],
          ['code' => 'SM', 'name' => 'San Marino', 'shipping_rate' => 35.00],
          [
            'code'          => 'ST',
            'name'          => 'Sao Tome and Principe',
            'shipping_rate' => 50.00,
          ],
          ['code' => 'SA', 'name' => 'Saudi Arabia', 'shipping_rate' => 45.00],
          ['code' => 'SN', 'name' => 'Senegal', 'shipping_rate' => 45.00],
          ['code' => 'RS', 'name' => 'Serbia', 'shipping_rate' => 35.00],
          ['code' => 'SC', 'name' => 'Seychelles', 'shipping_rate' => 55.00],
          ['code' => 'SL', 'name' => 'Sierra Leone', 'shipping_rate' => 45.00],
          ['code' => 'SG', 'name' => 'Singapore', 'shipping_rate' => 55.00],
          ['code' => 'SK', 'name' => 'Slovakia', 'shipping_rate' => 35.00],
          ['code' => 'SI', 'name' => 'Slovenia', 'shipping_rate' => 35.00],
          [
            'code'          => 'SB',
            'name'          => 'Solomon Islands',
            'shipping_rate' => 60.00,
          ],
          ['code' => 'SO', 'name' => 'Somalia', 'shipping_rate' => 50.00],
          ['code' => 'ZA', 'name' => 'South Africa', 'shipping_rate' => 50.00],
          ['code' => 'SS', 'name' => 'South Sudan', 'shipping_rate' => 50.00],
          ['code' => 'ES', 'name' => 'Spain', 'shipping_rate' => 35.00],
          ['code' => 'LK', 'name' => 'Sri Lanka', 'shipping_rate' => 55.00],
          ['code' => 'SD', 'name' => 'Sudan', 'shipping_rate' => 50.00],
          ['code' => 'SR', 'name' => 'Suriname', 'shipping_rate' => 35.00],
          ['code' => 'SE', 'name' => 'Sweden', 'shipping_rate' => 35.00],
          ['code' => 'CH', 'name' => 'Switzerland', 'shipping_rate' => 30.00],
          ['code' => 'SY', 'name' => 'Syria', 'shipping_rate' => 45.00],
          ['code' => 'TJ', 'name' => 'Tajikistan', 'shipping_rate' => 45.00],
          ['code' => 'TZ', 'name' => 'Tanzania', 'shipping_rate' => 50.00],
          ['code' => 'TH', 'name' => 'Thailand', 'shipping_rate' => 55.00],
          ['code' => 'TL', 'name' => 'Timor-Leste', 'shipping_rate' => 55.00],
          ['code' => 'TG', 'name' => 'Togo', 'shipping_rate' => 45.00],
          ['code' => 'TO', 'name' => 'Tonga', 'shipping_rate' => 60.00],
          [
            'code'          => 'TT',
            'name'          => 'Trinidad and Tobago',
            'shipping_rate' => 30.00,
          ],
          ['code' => 'TN', 'name' => 'Tunisia', 'shipping_rate' => 40.00],
          ['code' => 'TR', 'name' => 'Turkey', 'shipping_rate' => 40.00],
          ['code' => 'TM', 'name' => 'Turkmenistan', 'shipping_rate' => 45.00],
          ['code' => 'TV', 'name' => 'Tuvalu', 'shipping_rate' => 60.00],
          ['code' => 'UG', 'name' => 'Uganda', 'shipping_rate' => 50.00],
          ['code' => 'UA', 'name' => 'Ukraine', 'shipping_rate' => 35.00],
          [
            'code'          => 'AE',
            'name'          => 'United Arab Emirates',
            'shipping_rate' => 45.00,
          ],
          [
            'code'          => 'GB',
            'name'          => 'United Kingdom',
            'shipping_rate' => 30.00,
          ],
          ['code' => 'UY', 'name' => 'Uruguay', 'shipping_rate' => 40.00],
          ['code' => 'UZ', 'name' => 'Uzbekistan', 'shipping_rate' => 45.00],
          ['code' => 'VU', 'name' => 'Vanuatu', 'shipping_rate' => 60.00],
          ['code' => 'VA', 'name' => 'Vatican City', 'shipping_rate' => 35.00],
          ['code' => 'VE', 'name' => 'Venezuela', 'shipping_rate' => 35.00],
          ['code' => 'VN', 'name' => 'Vietnam', 'shipping_rate' => 55.00],
          ['code' => 'YE', 'name' => 'Yemen', 'shipping_rate' => 45.00],
          ['code' => 'ZM', 'name' => 'Zambia', 'shipping_rate' => 50.00],
          ['code' => 'ZW', 'name' => 'Zimbabwe', 'shipping_rate' => 50.00],
        ];
        DB::table('countries')->insert($countries);
    }

}
