<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesSeeder extends Seeder
{
    public function run()
    {
        $services = [
            // MAQUILLAJES
            ['service_name' => 'Maquillaje de día', 'price' => 1000.00, 'description' => 'Maquillaje profesional para cualquier ocasión.
(El precio puede variar dependiendo del tipo de maquillaje)', 'duration' => '01:00:00', 'type_id' => 1],
            ['service_name' => 'Maquillaje de noche', 'price' => 1000.00, 'description' => 'Maquillaje profesional para cualquier ocasión.
(El precio puede variar dependiendo del tipo de maquillaje)', 'duration' => '01:30:00', 'type_id' => 1],
            ['service_name' => 'Maquillaje natural', 'price' => 1000.00, 'description' => 'Maquillaje profesional para cualquier ocasión.
(El precio puede variar dependiendo del tipo de maquillaje', 'duration' => '00:45:00', 'type_id' => 1],

            // DISEÑO DE CEJA
            ['service_name' => 'Henna y tinte', 'price' => 1000.00, 'description' => 'Si lo tuyo no son los servicios permanentes, no te preocupes, ¡tenemos los servicios perfectos! La henna es un producto vegetal, por lo que su beneficio reside en que este pigmento natural colorea el pelo de las cejas y proporciona sombra a la piel con suavidad y sin dañarlo. Su duración es de 2 semanas en el pelo y 6 en la piel. Por otra parte, el tinte está indicado para personas que deseen dar color a sus cejas además de lograr una mayor definición. Este servicio tiene un duración aproximada de 4 semanas.',
             'duration' => '01:00:00', 'type_id' => 2],
            ['service_name' => 'Lifting de ceja', 'price' => 1000.00, 'description' => 'El novedoso Brow Lifting o Lifting de Cejas, es una técnica que permite elevar y redireccionar el pelo de la ceja creando un efecto de aumento de la densidad y un vello ordenado. Este servicio puede durar entre 5 y 8 semanas.', 
            'duration' => '00:45:00', 'type_id' => 2],

            // PAQUETES
            ['service_name' => 'Paquete de novia', 'price' => 5000.00, 'description' => 'Incluye los siguientes servicios:
-Prueba de maquillaje
-Prueba de peinado
-Maquillaje para el dia del evento
-Peinado para el dia del evento
-Facial hidratante.
(El presio puede variar dependiendo de si quieren agregar otro servicio )', 'duration' => '03:30:00', 'type_id' => 3],
            ['service_name' => 'Paquete de XV', 'price' => 5000.00, 'description' => 'Incluye los siguientes servicios:
-Prueba de maquillaje
-Prueba de peinado
-Maquillaje para el dia del evento
-Peinado para el dia del evento
-Facial hidratante.
(El presio puede variar dependiendo de si quieren agregar otro servicio )', 'duration' => '03:00:00', 'type_id' => 3],
            ['service_name' => 'Uñas', 'price' => 500.00, 'description' => 'Diseño de uñas creativas y personalizadas.
(El presio puede variar dependiendo del diseño de uñas escogido)', 'duration' => '01:30:00', 'type_id' => 3],
            ['service_name' => 'Peinados', 'price' => 700.00, 'description' => 'Peinados elegantes para eventos especiales.', 'duration' => '02:00:00', 'type_id' => 3],

            // MESOTERAPIA CORPORAL
            ['service_name' => 'Caderas', 'price' => 1500.00, 'description' => 'La mesoterapia en las caderas se centra en disminuir la grasa localizada y mejorar la apariencia de la piel en esta área. Las soluciones inyectadas ayudan a romper los depósitos de grasa y a reducir la celulitis, favoreciendo una silueta más esbelta y suave. Además, mejora la elasticidad y firmeza de la piel.
(El presio depende de la cantidad de grasa eliminada y del tamaño de la zona a tratar)', 'duration' => '01:00:00', 'type_id' => 4],
            ['service_name' => 'Brazos', 'price' => 2000.00, 'description' => 'Este tratamiento se aplica en los brazos para reducir la grasa localizada y mejorar la flacidez. A través de inyecciones específicas, se estimula la microcirculación y se promueve la eliminación de toxinas. La mesoterapia ayuda a tonificar los músculos, logrando brazos más esculpidos y firmes.
(El presio depende de la cantidad de grasa eliminada y del tamaño de la zona a tratar)', 'duration' => '01:00:00', 'type_id' => 4],
            ['service_name' => 'Cuello', 'price' => 2500.00, 'description' => 'La mesoterapia en el cuello se enfoca en combatir la flacidez y las arrugas. Se inyectan soluciones que estimulan la producción de colágeno y elastina, mejorando la textura y el tono de la piel. Este tratamiento ayuda a eliminar las toxinas, reducir la papada y mejorar la hidratación de la piel, logrando un cuello más suave y rejuvenecido.
(El presio depende de la cantidad de grasa eliminada y del tamaño de la zona a tratar)', 'duration' => '00:45:00', 'type_id' => 4],
            ['service_name' => 'Abdomen', 'price' => 2708.00, 'description' => 'La mesoterapia abdominal se utiliza para reducir la grasa localizada y mejorar la apariencia de la piel. Consiste en la inyección de una combinación de medicamentos, vitaminas y minerales directamente en la capa media de la piel. Este tratamiento ayuda a disolver los depósitos de grasa, mejora la circulación sanguínea y promueve la elasticidad de la piel, contribuyendo a un abdomen más firme y tonificado.
(El presio depende de la cantidad de grasa eliminada y del tamaño de la zona a tratar)', 'duration' => '01:00:00', 'type_id' => 4],
            ['service_name' => 'Glúteos', 'price' => 3000.00, 'description' => 'La mesoterapia en los glúteos se utiliza para tonificar y dar forma a esta área. Las inyecciones ayudan a reducir la celulitis, mejorar la circulación y aumentar la firmeza de la piel. Además, puede incluir ingredientes que favorecen el aumento de volumen, logrando glúteos más definidos y estéticamente agradables.
(El presio depende de la cantidad de grasa eliminada y del tamaño de la zona a tratar)', 'duration' => '01:15:00', 'type_id' => 4],
            ['service_name' => 'Rostro', 'price' => 1000.00, 'description' => 'La mesoterapia facial se utiliza para rejuvenecer y revitalizar la piel del rostro. Las inyecciones de nutrientes, antioxidantes y ácido hialurónico ayudan a mejorar la hidratación, elasticidad y luminosidad de la piel. Este tratamiento reduce las arrugas, las líneas de expresión y mejora la apariencia general del rostro, otorgándole un aspecto más fresco y juvenil.
(El presio depende de la cantidad de grasa eliminada y del tamaño de la zona a tratar)', 'duration' => '01:15:00', 'type_id' => 4],

            // CABELLO
            ['service_name' => 'Corte', 'price' => 150.00, 'description' => 'Corte de cabello profesional para todo tipo de rostro.
(El precio puede variar dependiendo de la cantidad de cabello.)', 'duration' => '00:45:00', 'type_id' => 5],
            ['service_name' => 'Alaciado permanente', 'price' => 500.00, 'description' => 'Alisado permanente para un cabello suave y lacio.
(El presio puede variar dependiendo de la cantidad de cabello.)', 'duration' => '03:00:00', 'type_id' => 5],
            ['service_name' => 'Balayage', 'price' => 2000.00, 'description' => 'Técnica de balayage para un look natural y brillante.
(El precio puede variar dependiendo de la cantidad de cabello.)', 'duration' => '04:00:00', 'type_id' => 5],
            ['service_name' => 'Babylights', 'price' => 1000.00, 'description' => 'Babylights para un brillo sutil y juvenil en tu cabello.
(El precio puede variar dependiendo de la cantidad de cabello.)', 'duration' => '04:00:00', 'type_id' => 5],
            ['service_name' => 'Tinte global', 'price' => 3000.00, 'description' => 'Cobertura completa con color uniforme.', 'duration' => '02:30:00', 'type_id' => 5],
            ['service_name' => 'Mechas tradicionales', 'price' => 2500.00, 'description' => 'Tinte global para un color intenso y duradero.
(El presio puede variar dependiendo de la cantidad de cabello.)
Mechas tradicionales para dar luz y dimensión al cabello.
(El presio puede variar dependiendo de la cantidad de cabello.)', 'duration' => '03:30:00', 'type_id' => 5],
        ];

        DB::table('services')->insert($services);
    }
}
