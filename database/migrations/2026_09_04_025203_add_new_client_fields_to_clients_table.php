<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddNewClientFieldsToClientsTable extends Migration
{
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            if (!Schema::hasColumn('clients', 'kode_client')) {
                $table->string('kode_client')->nullable()->after('id');
            }

            if (!Schema::hasColumn('clients', 'nama_client')) {
                $table->string('nama_client')->nullable()->after('kode_client');
            }

            if (!Schema::hasColumn('clients', 'nama_perusahaan')) {
                $table->string('nama_perusahaan')->nullable()->after('nama_client');
            }

            if (!Schema::hasColumn('clients', 'no_telepon')) {
                $table->string('no_telepon')->nullable()->after('email');
            }

            if (!Schema::hasColumn('clients', 'alamat')) {
                $table->text('alamat')->nullable()->after('no_telepon');
            }

            if (!Schema::hasColumn('clients', 'is_active')) {
                $table->boolean('is_active')->default(true)->after('alamat');
            }
        });

        // Isi data baru dari kolom lama
        DB::table('clients')
            ->orderBy('id')
            ->get()
            ->each(function ($client) {
                DB::table('clients')
                    ->where('id', $client->id)
                    ->update([
                        'kode_client' => 'CL-' . str_pad($client->id, 4, '0', STR_PAD_LEFT),
                        'nama_client' => $client->name,
                        'nama_perusahaan' => $client->company,
                        'no_telepon' => $client->phone,
                        'alamat' => $client->address,
                        'is_active' => $client->status === 'active',
                    ]);
            });

        // Tambahkan unique hanya kalau belum ada
        Schema::table('clients', function (Blueprint $table) {
            $table->unique('kode_client');
        });
    }

    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            if (Schema::hasColumn('clients', 'kode_client')) {
                $table->dropUnique(['kode_client']);
                $table->dropColumn('kode_client');
            }

            if (Schema::hasColumn('clients', 'nama_client')) {
                $table->dropColumn('nama_client');
            }

            if (Schema::hasColumn('clients', 'nama_perusahaan')) {
                $table->dropColumn('nama_perusahaan');
            }

            if (Schema::hasColumn('clients', 'no_telepon')) {
                $table->dropColumn('no_telepon');
            }

            if (Schema::hasColumn('clients', 'alamat')) {
                $table->dropColumn('alamat');
            }

            if (Schema::hasColumn('clients', 'is_active')) {
                $table->dropColumn('is_active');
            }
        });
    }
}