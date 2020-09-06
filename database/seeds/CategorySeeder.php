<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Mechanical & Electrical Services & Plumbing Services (MEP)',
            'slug' => 'mechanical_electrical_services_plumbing_services',
        ]);

        DB::table('categories')->insert([
            'name' => 'Civil & Construction',
            'slug' => 'civil_construction',
        ]);

        DB::table('categories')->insert([
            'name' => 'Utility Pipeline',
            'slug' => 'utility_pipeline',
        ]);

        DB::table('categories')->insert([
            'name' => 'Renew Energy',
            'slug' => 'renew_energy',
        ]);

        DB::table('categories')->insert([
            'name' => 'Supply Chain Automation Systems',
            'slug' => 'supply_chain_automation_systems',
        ]);

        DB::table('categories')->insert([
            'name' => 'Joint Venture Project',
            'slug' => 'joint_venture_project',
        ]);
    }
}
