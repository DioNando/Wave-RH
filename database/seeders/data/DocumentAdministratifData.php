<?php

namespace Database\Seeders\Data;

class DocumentAdministratifData
{
    public static function getData(): array
    {
        return [
            [
                'document_path' => 'documents_administratifs/cv_example.pdf',
                'statut' => true
            ],
            [
                'document_path' => 'documents_administratifs/cin_example.pdf',
                'statut' => true
            ],
            [
                'document_path' => 'documents_administratifs/cnss_example.pdf',
                'statut' => true
            ],
            [
                'document_path' => 'documents_administratifs/contrat_example.pdf',
                'statut' => true
            ],
            [
                'document_path' => 'documents_administratifs/bulletin_example.pdf',
                'statut' => true
            ],
            [
                'document_path' => 'documents_administratifs/medical_example.pdf',
                'statut' => true
            ],
            [
                'document_path' => 'documents_administratifs/rib_example.pdf',
                'statut' => true
            ],
            [
                'document_path' => 'documents_administratifs/permis_example.pdf',
                'statut' => true
            ],
            [
                'document_path' => 'documents_administratifs/formation_example.pdf',
                'statut' => true
            ],
            [
                'document_path' => 'documents_administratifs/confidentialite_example.pdf',
                'statut' => true
            ]
        ];
    }
}
