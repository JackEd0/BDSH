<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // USER
        $this->call(UserTypesTableSeeder::class);
        $this->call(UsersTableSeeder::class);

        // COLLECTION
        $this->call(CollectionTableSeeder::class);

        // CARD
        $this->call(CardTypesTableSeeder::class);
        $this->call(CardAttributesTableSeeder::class);
        $this->call(CardAttributeTypeTableSeeder::class);
        $this->call(CardsTableSeeder::class);
        $this->call(CardAssociationsTableSeeder::class);

        // DOCUMENT
        $this->call(DocumentsTableSeeder::class);
        $this->call(DocumentDownloadsTableSeeder::class);

        // LICENCE
        $this->call(LicenceVersionTableSeeder::class);
        $this->call(LicencesFeesTableSeeder::class);
        $this->call(LicencesTypesTableSeeder::class);
        $this->call(LicencesAttributesTableSeeder::class);
        $this->call(LicencesAttributesTypesTableSeeder::class);

        // TRANSACTION
        $this->call(LicencesOwnersTableSeeder::class);
        $this->call(TransactionsTableSeeder::class);
        $this->call(LicencesResponsesTableSeeder::class);
        $this->call(TransactionsDocumentsTableSeeder::class);

        // SEARCH
        $this->call(SearchHistoryTableSeeder::class);

        // EXTERNAL PARAMETER
        $this->call(ExternalParametersTableSeeder::class);
    }
}
