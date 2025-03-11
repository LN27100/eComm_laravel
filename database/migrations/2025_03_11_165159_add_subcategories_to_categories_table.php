<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; 

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('categories')->insert([
            ['parent_id' => 1, 'name' => 'Figurines Résine Saïyens', 'description' => 'Figurines en résine des Saïyens', 'slug' => 'figurines-resine-sayiens', 'created_at' => now(), 'updated_at' => now()],
            ['parent_id' => 1, 'name' => 'Figurines PVC Saïyens', 'description' => 'Figurines en PVC des Saïyens', 'slug' => 'figurines-pvc-sayiens', 'created_at' => now(), 'updated_at' => now()],
            ['parent_id' => 2, 'name' => 'Figurines Résine Méchants', 'description' => 'Figurines en résine des méchants', 'slug' => 'figurines-resine-mechants', 'created_at' => now(), 'updated_at' => now()],
            ['parent_id' => 2, 'name' => 'Figurines PVC Méchants', 'description' => 'Figurines en PVC des méchants', 'slug' => 'figurines-pvc-mechants', 'created_at' => now(), 'updated_at' => now()],
            ['parent_id' => 3, 'name' => 'Répliques', 'description' => 'Répliques d\'objets DBZ', 'slug' => 'repliques', 'created_at' => now(), 'updated_at' => now()],
            ['parent_id' => 3, 'name' => 'Accessoires', 'description' => 'Accessoires DBZ', 'slug' => 'accessoires', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Supprimer les sous-catégories insérées si nécessaire
        DB::table('categories')
            ->whereIn('slug', ['figurines-resine', 'figurines-pvc', 'repliques', 'accessoires'])
            ->delete();
    }
};
