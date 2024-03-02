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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('uvc')->nullable();
            $table->integer('make')->nullable(); 
            $table->integer('range')->nullable();    
            $table->integer('model')->nullable();    
            $table->string('mark')->nullable(); 
            $table->integer('model_series')->nullable(); 
            $table->string('introduction_date')->nullable();   
            $table->string('start_date')->nullable();   
            $table->string('end_date')->nullable(); 
            $table->string('fuel_type')->nullable();    
            $table->string('vehicle_class')->nullable();    
            $table->string('body_shape')->nullable();   
            $table->string('body_style')->nullable();   
            $table->string('number_of_doors')->nullable();  
            $table->string('gross_vehicle_weight_kg')->nullable();  
            $table->string('power_delivery')->nullable();   
            $table->string('engine_capacity_cc')->nullable();   
            $table->string('engine_capacity_litres')->nullable();   
            $table->string('aspiration')->nullable();   
            $table->string('kw')->nullable();   
            $table->string('bhp')->nullable();  
            $table->string('number_of_gears')->nullable();  
            $table->string('transmission_type')->nullable();    
            $table->string('drive_type')->nullable();   
            $table->string('driving_axle')->nullable(); 
            $table->string('battery_capacity')->nullable(); 
            $table->string('vehicle_type')->nullable(); 
            $table->string('model_status')->nullable(); 
            $table->string('vehicles_on_the_road')->nullable(); 
            $table->string('document_version')->nullable(); 
            $table->string('year')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
