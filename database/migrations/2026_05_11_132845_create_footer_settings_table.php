<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('footer_settings', function (Blueprint $table) {
            $table->id()->comment('Primary key konfigurasi footer.');
            $table->string('developed_by_label')->comment('Label untuk bagian developer.');
            $table->string('developed_by_name')->comment('Nama/domain developer yang ditampilkan.');
            $table->string('developed_by_url')->comment('URL domain developer.');
            $table->string('office_title')->comment('Nama kantor atau judul alamat.');
            $table->text('office_address')->comment('Alamat kantor.');
            $table->string('office_phone_label')->nullable()->comment('Label telepon pada footer.');
            $table->string('office_phone')->nullable()->comment('Nomor telepon utama pada footer.');
            $table->string('info_heading')->comment('Judul kolom pusat informasi lain.');
            $table->string('about_heading')->comment('Judul kolom tentang kami.');
            $table->json('social_links')->nullable()->comment('Daftar link sosial dalam format JSON.');
            $table->text('map_embed_url')->nullable()->comment('URL embed Google Maps.');
            $table->string('copyright_text')->comment('Teks copyright pada footer.');
            $table->boolean('is_active')->default(true)->comment('Status konfigurasi footer aktif.');
            $table->timestamp('created_at')->nullable()->comment('Waktu data footer dibuat.');
            $table->timestamp('updated_at')->nullable()->comment('Waktu data footer terakhir diperbarui.');
            $table->softDeletes()->comment('Waktu penghapusan lunak data footer.');

            $table->index('is_active', 'footer_settings_active_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('footer_settings');
    }
};
