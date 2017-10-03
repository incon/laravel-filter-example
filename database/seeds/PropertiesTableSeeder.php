<?php

use Illuminate\Database\Seeder;

class PropertiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get Data
        $csvFile = __DIR__ . '/data/property-data.csv';

        // Read Data
        $reader = \League\Csv\Reader::createFromPath($csvFile);
        $reader->setHeaderOffset(0);

        $properties = $reader->getRecords([
            'name',
            'price',
            'bedrooms',
            'bathrooms',
            'storeys',
            'garages'
        ]);

        // Insert
        foreach ($properties as $offset => $property) {
            DB::table('properties')->insert(
                $property
                + ['created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')]
            );
        }
    }
}
