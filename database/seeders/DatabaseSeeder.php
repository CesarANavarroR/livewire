<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Saucer;
use App\Models\Saucer_Type;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\Saucer::factory(100)->create();
        $role = new Role();
        $role->name = "root";
        $role->save();

        $role = new Role();
        $role->name = "Admin";
        $role->save();

        $user =  new User();
        $user->name = "Angel Martinez";
        $user->email = "angel.martinez@digital-solution.mx";
        $user->password = '$2y$10$tLeipc8GA0FI5OXzcl0aTegPBa5BykgYiNvg69z0VzA.xyZgo2pKe';
        $user->save();
        $user->roles()->attach(1);

        $user =  new User();
        $user->name = "Ernesto Moreno";
        $user->email = "ernesto.moreno@digital-solution.mx";
        $user->password = '$2y$10$7KbSea2Trp1o7/CzXZu1auw1jlyBLl83gWmDkSk87.MqRFG.RsYQa';
        $user->save();
        $user->roles()->attach(2);

        $user =  new User();
        $user->name = "Cesar Navarro";
        $user->email = "cesar.navarro@digital-solution.mx";
        $user->password = '$2y$10$JXFQXd8JMDu9yCC2F88E0OoN8NZTjXrH0L1ejPoi/GnUqvf.kavAm';
        $user->save();
        $user->roles()->attach(2);

        $typeSaucer = new Saucer_Type();
        $typeSaucer->name = 'Ensaladas';
        $typeSaucer->save();

        $saucer = new Saucer();
        $saucer->name = 'Ensalada Cesar';
        $saucer->price = '$32.90';
        $saucer->image_name = 'ensalada-cesar.jpg';
        $saucer->image_url = 'products/d3daHsIxHnTNH6lk1DZE52ip3Wmjco4YAl4nllo6.jpg';
        $saucer->saucer_type_id = 1;
        $saucer->description = 'Una ensalada de lechuga romana y croûtons (trozos de pan tostado) con jugo de limón, aceite de oliva, huevo, salsa Worcestershire, anchoas, ajo, mostaza de Dijon, queso parmesano y pimienta negra.';

        $saucer = new Saucer();
        $saucer->name = 'Ensalada Rusa';
        $saucer->price = '$39.00';
        $saucer->image_name = 'ensalada-rusa.jpg';
        $saucer->image_url = 'products/qOULuw70zaBKwaFG5lBwMnPbIZLPUEAXwtRpbxbO.jpg';
        $saucer->saucer_type_id = 1;
        $saucer->description = 'Una ensalada de papas zanahoria y chicharos con aderezo de mayonesa.';

        $saucer = new Saucer();
        $saucer->name = 'Ensalada Verde';
        $saucer->price = '$25.90';
        $saucer->image_name = 'ensalada-verde.jpg';
        $saucer->image_url = 'products/zkg9c1yjdmkovS6lTKJ1LxpcWChlAGyqCdxaOdmK.jpg';
        $saucer->saucer_type_id = 1;
        $saucer->description = 'Una ensalada a base de lechuga con tomate, cebolla y pepino.';

        $saucer = new Saucer();
        $saucer->name = 'Ensalada Mediterranea';
        $saucer->price = '$42.50';
        $saucer->image_name = 'ensalada-mediterrane.jpg';
        $saucer->image_url = 'products/ASsfsbpnhrcRS0kT2yUXza2SmxvuMZipmqTSkJL7.jpg';
        $saucer->saucer_type_id = 1;
        $saucer->description = 'Una ensalada con pechuga de pollo (120 g), lechuga, espinaca y arúgula, jitomate, almendras*, aceituna verde y aderezo de miel con mostaza.';
    }
}
