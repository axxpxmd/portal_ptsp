<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('header_menus', function (Blueprint $table) {
            $table->id()->comment('Primary key menu header.');
            $table->foreignId('parent_id')->nullable()->comment('ID menu induk untuk membuat struktur submenu bertingkat. Kosong jika menu utama.')->constrained('header_menus')->cascadeOnDelete();
            $table->string('label')->comment('Teks menu yang ditampilkan pada header.');
            $table->string('url')->nullable()->comment('URL tujuan menu jika memakai link langsung.');
            $table->string('route_name')->nullable()->comment('Nama route Laravel tujuan menu jika memakai named route.');
            $table->json('route_parameters')->nullable()->comment('Parameter route dalam format JSON jika route membutuhkan parameter.');
            $table->string('target', 20)->default('_self')->comment('Target pembukaan link, misalnya _self atau _blank.');
            $table->string('icon')->nullable()->comment('Nama class atau identifier icon menu jika dibutuhkan.');
            $table->unsignedInteger('sort_order')->default(0)->comment('Urutan tampil menu dalam parent yang sama.');
            $table->boolean('is_active')->default(true)->comment('Status menu aktif atau tidak aktif.');
            $table->timestamp('created_at')->nullable()->comment('Waktu data menu dibuat.');
            $table->timestamp('updated_at')->nullable()->comment('Waktu data menu terakhir diperbarui.');
            $table->softDeletes()->comment('Waktu penghapusan lunak menu.');

            $table->index(['parent_id', 'sort_order'], 'header_menus_parent_sort_index');
            $table->index('is_active', 'header_menus_active_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('header_menus');
    }
};
