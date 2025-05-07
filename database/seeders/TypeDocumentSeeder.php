<?php

namespace Database\Seeders;

use App\Models\TypeDocument;
use Database\Seeders\Data\TypeDocumentData;
use Illuminate\Database\Seeder;

class TypeDocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $typesDocumentsData = TypeDocumentData::getData();

        foreach ($typesDocumentsData as $typeDocumentData) {
            TypeDocument::create($typeDocumentData);
        }
    }
}
