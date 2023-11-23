<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Train;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class TrainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 10; $i++){
            $train = new Train();
            $train->reference = $faker->words(3, true);
            //$train->slug = $this->generateSlug($train->reference);
            $train->azienda = $faker->randomElement(["Trenitalia", "Italo", "Trenino Ciuff Ciuff", "Freccia Bianca", "Freccia Argento", "Freccia Rossa"]);
            $train->stazione_di_partenza = $faker->city;
            $train->stazione_di_arrivo = $faker->city;
            $train->orario_di_partenza = $faker->time;
            $train->orario_di_arrivo = $faker->time;
            $train->codice_treno = $faker->bothify("??###");
            $train->numero_carrozza = $faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8, 9]);
            $train->in_orario = $faker->randomElement([0, 1]);
            $train->cancellato = $faker->randomElement([0, 1]);

            $train->save();
        }
    }

    private function generateSlug($reference){
		$slug = Str::slug($reference, "-");
		$original_slug = $slug;
		$exists = Train::where("slug", $slug)->first();
		$c = 1;
		while($exists){
			$slug = $original_slug . "-" . $c;
			$exists = Train::where("slug", $slug)->first();

			$c++;
		}
		return $slug;
	}
}
