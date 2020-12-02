<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesTableSeeder extends Seeder
{
    static $munAhuachapans = [
        'Ahuachapán',
        'Apaneca',
        'Atiquizaya',
        'Concepción de Ataco',
        'El Refugio',
        'Guaymango',
        'Jujutla',
        'San Francisco Menéndez',
        'San Lorenzo',
        'San Pedro Puxtla',
        'Tacuba',
        'Turín'
    ];

    static $munSonsonates = [
        'Acajutla',
        'Armenia',
        'Caluco',
        'Cuisnahuat',
        'Izalco',
        'Juayúa',
        'Nahuizalco',
        'Nahulingo',
        'Salcoatitlán',
        'San Antonio del Monte',
        'San Julián',
        'Santa Catarina Masahuat',
        'Santa Isabel Ishuatán',
        'Santo Domingo Guzmán',
        'Sonsonate',
        'Sonzacate'
    ];

    static $munSantaAnas = [
        'Candelaria de la Frontera',
        'Chalchuapa',
        'Coatepeque',
        'El Congo',
        'El Porvenir',
        'Masahuat',
        'Metapán',
        'San Antonio Pajonal',
        'San Sebastián Salitrillo',
        'Santa Ana',
        'Santa Rosa Guachipilín',
        'Santiago de la Frontera',
        'Texistepeque'
    ];

    static $munChalatenangos = [
        'Agua Caliente',
        'Arcatao',
        'Azacualpa',
        'Chalatenango',
        'Comalapa',
        'Citalá',
        'Concepción Quezaltepeque',
        'Dulce Nombre de María',
        'El Carrizal',
        'El Paraíso',
        'La Laguna',
        'La Palma',
        'La Reina',
        'Las Vueltas',
        'Nueva Concepción',
        'Nueva Trinidad',
        'Nombre de Jesús',
        'Ojos de Agua',
        'Potonico',
        'San Antonio de la Cruz',
        'San Antonio Los Ranchos',
        'San Fernando',
        'San Francisco Lempa',
        'San Francisco Morazán',
        'San Ignacio',
        'San Isidro Labrador',
        'San José Cancasque',
        'San José Las Flores',
        'San Luis del Carmen',
        'San Miguel de Mercedes',
        'San Rafael',
        'Santa Rita',
        'Tejutla'
    ];

    static $munCuscatlans = [
        'Candelaria',
        'Cojutepeque',
        'El Carmen',
        'El Rosario',
        'Monte San Juan',
        'Oratorio de Concepción',
        'San Bartolomé Perulapía',
        'San Cristóbal',
        'San José Guayabal',
        'San Pedro Perulapán',
        'San Rafael Cedros',
        'San Ramón',
        'Santa Cruz Analquito',
        'Santa Cruz Michapa',
        'Suchitoto',
        'Tenancingo'
    ];

    static $munSanSalvadors = [
        'Aguilares',
        'Apopa',
        'Ayutuxtepeque',
        'Cuscatancingo',
        'Ciudad Delgado',
        'El Paisnal',
        'Guazapa',
        'Ilopango',
        'Mejicanos',
        'Nejapa',
        'Panchimalco',
        'Rosario de Mora',
        'San Marcos',
        'San Martín',
        'San Salvador',
        'Santiago Texacuangos',
        'Santo Tomás',
        'Soyapango',
        'Tonacatepeque'
    ];

    static $munLaLibertads = [
        'Antiguo Cuscatlán',
        'Chiltiupán',
        'Ciudad Arce',
        'Colón',
        'Comasagua',
        'Huizúcar',
        'Jayaque',
        'Jicalapa',
        'La Libertad',
        'Santa Tecla',
        'Nuevo Cuscatlán',
        'San Juan Opico',
        'Quezaltepeque',
        'Sacacoyo',
        'San José Villanueva',
        'San Matías',
        'San Pablo Tacachico',
        'Talnique',
        'Tamanique',
        'Teotepeque',
        'Tepecoyo',
        'Zaragoza'
    ];

    static $munSanVicentes = [
        'Apastepeque',
        'Guadalupe',
        'San Cayetano Istepeque',
        'San Esteban Catarina',
        'San Ildefonso',
        'San Lorenzo',
        'San Sebastián',
        'San Vicente',
        'Santa Clara',
        'Santo Domingo',
        'Tecoluca',
        'Tepetitán',
        'Verapaz'
    ];

    static $munCabañas = [
        'Cinquera',
        'Dolores',
        'Guacotecti',
        'Ilobasco',
        'Jutiapa',
        'San Isidro',
        'Sensuntepeque',
        'Tejutepeque',
        'Victoria'
    ];

    static $munLaPazs = [
        'Cuyultitán',
        'El Rosario',
        'Jerusalén',
        'Mercedes La Ceiba',
        'Olocuilta',
        'Paraíso de Osorio',
        'San Antonio Masahuat',
        'San Emigdio',
        'San Francisco Chinameca',
        'San Juan Nonualco',
        'San Juan Talpa',
        'San Juan Tepezontes',
        'San Luis Talpa',
        'San Luis La Herradura',
        'San Miguel Tepezontes',
        'San Pedro Masahuat',
        'San Pedro Nonualco',
        'San Rafael Obrajuelo',
        'Santa María Ostuma',
        'Santiago Nonualco',
        'Tapalhuaca',
        'Zacatecoluca'
    ];

    static $munUsulutans = [
        'Alegría',
        'Berlín',
        'California',
        'Concepción Batres',
        'El Triunfo',
        'Ereguayquín',
        'Estanzuelas',
        'Jiquilisco',
        'Jucuapa',
        'Jucuarán',
        'Mercedes Umaña',
        'Nueva Granada',
        'Ozatlán',
        'Puerto El Triunfo',
        'San Agustín',
        'San Buenaventura',
        'San Dionisio',
        'San Francisco Javier',
        'Santa Elena',
        'Santa María',
        'Santiago de María',
        'Tecapán',
        'Usulután'
    ];

    static $munSanMiguels = [
        'Carolina',
        'Chapeltique',
        'Chinameca',
        'Chirilagua',
        'Ciudad Barrios',
        'Comacarán',
        'El Tránsito',
        'Lolotique',
        'Moncagua',
        'Nueva Guadalupe',
        'Nuevo Edén de San Juan',
        'Quelepa',
        'San Antonio del Mosco',
        'San Gerardo',
        'San Jorge',
        'San Luis de la Reina',
        'San Miguel',
        'San Rafael Oriente',
        'Sesori',
        'Uluazapa'
    ];

    static $munMorazans = [
        'Arambala',
        'Cacaopera',
        'Chilanga',
        'Corinto',
        'Delicias de Concepción',
        'El Divisadero',
        'El Rosario',
        'Gualococti',
        'Guatajiagua',
        'Joateca',
        'Jocoaitique',
        'Jocoro',
        'Lolotiquillo',
        'Meanguera',
        'Osicala',
        'Perquín',
        'San Carlos',
        'San Fernando',
        'San Francisco Gotera',
        'San Isidro',
        'San Simón',
        'Sensembra',
        'Sociedad',
        'Torola',
        'Yamabal',
        'Yoloaiquín'
    ];

    static $munLaUnions = [
        'Anamorós',
        'Bolívar',
        'Concepción de Oriente',
        'Conchagua',
        'El Carmen',
        'El Sauce',
        'Intipucá',
        'La Unión',
        'Lislique',
        'Meanguera del Golfo',
        'Nueva Esparta',
        'Pasaquina',
        'Polorós',
        'San Alejo',
        'San José',
        'Santa Rosa de Lima',
        'Yayantique',
        'Yucuaiquín'
    ];

    public function run()
    {
        
        foreach(self::$munAhuachapans as $munAhuachapan){
            DB::table('cities')->insert([
                'name'=> $munAhuachapan,
                'state_id' =>1
            ]);
        }

        foreach(self::$munSonsonates as $munSonsonate){
            DB::table('cities')->insert([
                'name'=> $munSonsonate,
                'state_id' =>2
            ]);
        }

        foreach(self::$munSantaAnas as $munSantaAna){
            DB::table('cities')->insert([
                'name'=> $munSantaAna,
                'state_id' =>3
            ]);
        }

        foreach(self::$munLaLibertads as $munLaLibertad){
            DB::table('cities')->insert([
                'name'=> $munLaLibertad,
                'state_id' =>4
            ]);
        }

        foreach(self::$munChalatenangos as $munChalatenango){
            DB::table('cities')->insert([
                'name'=> $munChalatenango,
                'state_id' =>5
            ]);
        }

        foreach(self::$munSanSalvadors as $munSanSalvador){
            DB::table('cities')->insert([
                'name'=> $munSanSalvador,
                'state_id' =>6
            ]);
        }

        foreach(self::$munCuscatlans as $munCuscatlan){
            DB::table('cities')->insert([
                'name'=> $munCuscatlan,
                'state_id' =>7
            ]);
        }

        foreach(self::$munLaPazs as $munLaPaz){
            DB::table('cities')->insert([
                'name'=> $munLaPaz,
                'state_id' =>8
            ]);
        }

        foreach(self::$munCabañas as $munCabaña){
            DB::table('cities')->insert([
                'name'=> $munCabaña,
                'state_id' =>9
            ]);
        }

        foreach(self::$munSanVicentes as $munSanVicente){
            DB::table('cities')->insert([
                'name'=> $munSanVicente,
                'state_id' =>10
            ]);
        }

        foreach(self::$munUsulutans as $munUsulutan){
            DB::table('cities')->insert([
                'name'=> $munUsulutan,
                'state_id' =>11
            ]);
        }

        foreach(self::$munSanMiguels as $munSanMiguel){
            DB::table('cities')->insert([
                'name'=> $munSanMiguel,
                'state_id' =>12
            ]);
        }

        foreach(self::$munMorazans as $munMorazan){
            DB::table('cities')->insert([
                'name'=> $munMorazan,
                'state_id' =>13
            ]);
        }

        foreach(self::$munLaUnions as $munLaUnion){
            DB::table('cities')->insert([
                'name'=> $munLaUnion,
                'state_id' =>14
            ]);
        }
    }
}
