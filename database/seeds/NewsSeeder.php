<?php

use App\News;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        News::create([
            'category_id' => 1,
            'title' => 'Regional Expansion as the Key to Accelerating Papua\'s Development',
            'content' => 'Regional expansion is the Government\'s strategy to accelerate development in Papua. With this policy, state services will be more optimal and development will be more easily realized.',
            'url' => 'regional-expansion-as-the-key-to-accelerating-papuas-development',
        ]);

        News::create([
            'category_id' => 2,
            'title' => 'The Importance of the Master Plan in the Implementation of the Special Autonomy Law Volume II',
            'content' => 'Jayapura Regent Mathius Awoitauw emphasized that one of the important aspects in the implementation of the Second Revision of the Papua Special Autonomy Law is the need for a master plan that is jointly prepared by both the district/city and provincial governments by involving indigenous peoples and the central government.',
            'url' => 'the-importance-of-the-master-plan-in-the-implementation-of-the-special-autonomy-law-volume-II',
        ]);

        News::create([
            'category_id' => 3,
            'title' => 'The Community Appreciates the Firm Actions Against The Separatist Terrorist Group in Papua',
            'content' => 'Separatist and terrorist groups (KST) were dealt with firmly by the authorities, but this was appreciated by the community. This is because they have injured too many civilians and members of the TNI who are on guard. So if there is a measurable decisive action, it is permissible.
            Papua is currently famous for several things: tourism, natural nature, and agricultural products. However, there is one negative thing that made the name Bumi Cendrawasih rise in the media, namely OPM and KST. They are united in wanting independence from Indonesia and do not believe in the results of the pepera (the determination of the people’s opinion), even though this incident happened decades ago.',
            'url' => 'the-community-appreciates-the-firm-actions-against-the-separatist-terrorist-group-in-papua',
        ]);

        News::create([
            'category_id' => 4,
            'title' => 'Support the Establishment of a Wanted List (DPO) for Members of Separatist Groups',
            'content' => 'Several members of the Separatist and Terrorist Group (KST) were included in the People’s Wanted List (DPO). They were fugitives for committing grave sins, by being the masterminds in several attacks that resulted in the death of the officers. The Papuan people themselves agree to their hunting, because it has harmed and caused riots on the Earth of Cendrawasih.',
            'url' => 'support-the-establishment-of-a-wanted-list-dpo-for-members-of-separatist-groups',
        ]);
    }
}
