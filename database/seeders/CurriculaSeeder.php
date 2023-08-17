<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CurriculaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Estudiante
        DB::table('curricula')->insert([
            'name' => 'José Orlando',
            'last_name' => 'Durán Pérez',
            'email' => 'orlando@email.com',
            'phone' => '4420101010',
            'about_me' => 'Orlando es un joven apasionado por la tecnología y las ciencias. Es un estudiante destacado en su programa académico y ha obtenido logros sobresalientes en proyectos de investigación. Además de su habilidad para trabajar en equipo, destaca por su creatividad. En su tiempo libre, disfruta practicar deportes y es un ávido lector de ciencia ficción. Siempre amigable y dispuesto a ayudar, Orlando es un verdadero líder entre sus amigos.',
            'study_programs_id' => 16,
            'semester' => 10,
            'academic_achievements' => json_encode(["Logro 1 Orlando", "Logro 2 Orlando", "Logro 3 Orlando", "Logro 4 Orlando", "Logro 5 Orlando"]),
            'academic_programs_id' => 2,
            'experience' => json_encode(["Experiencia 1 Orlando", "Experiencia 2 Orlando", "Experiencia 3 Orlando", "Experiencia 4 Orlando", "Experiencia 5 Orlando"]),
            'projects' => json_encode(["Proyecto 1 Orlando", "Proyecto 2 Orlando", "Proyecto 3 Orlando", "Proyecto 4 Orlando", "Proyecto 5 Orlando"]),
            'references' => json_encode([
                ["name" => "Roberto Torres Jiménez", "email" => "roberto@email.com", "phone" => "4420987654"],
                ["name" => "Verónica Sánchez García", "email" => "veronica@email.com", "phone" => "4429876543"],
                ["name" => "Manuel Gómez González", "email" => "manuel@email.com", "phone" => "4428765432"]
            ]),            
            'type' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        // Estudiante
        DB::table('curricula')->insert([
            'name' => 'Ingrid Sarai',
            'last_name' => 'González Martinez',
            'email' => 'ingrid@email.com',
            'phone' => '4421010101',
            'about_me' => 'Ingrid es una joven llena de energía y determinación. Apasionada por el arte y la música, siempre se sumerge en su mundo creativo. Es estudiante sobresaliente y le encanta aprender sobre culturas y tradiciones. Amiga confiable y empática, valiente ante los desafíos. Disfruta viajar, explorar nuevos lugares y cultivar su espíritu aventurero. Con su sonrisa encantadora y corazón amable, deja una impresión duradera en quienes la conocen.',
            'study_programs_id' => 1,
            'semester' => 6,
            'academic_achievements' => json_encode(["Logro 1 Ingrid", "Logro 2 Ingrid", "Logro 3 Ingrid", "Logro 4 Ingrid", "Logro 5 Ingrid"]),
            'academic_programs_id' => 1,
            'experience' => json_encode(["Experiencia 1 Ingrid", "Experiencia 2 Ingrid", "Experiencia 3 Ingrid", "Experiencia 4 Ingrid", "Experiencia 5 Ingrid"]),
            'projects' => json_encode(["Proyecto 1 Ingrid", "Proyecto 2 Ingrid", "Proyecto 3 Ingrid", "Proyecto 4 Ingrid", "Proyecto 5 Ingrid"]),
            'references' => json_encode([
                ["name" => "María Gómez Herrera", "email" => "maria@email.com", "phone" => "4429876543"],
                ["name" => "Carlos Martínez López", "email" => "carlos@email.com", "phone" => "4428765432"],
                ["name" => "Laura Ramírez Cruz", "email" => "laura@email.com", "phone" => "4427654321"]
            ]),            
            'type' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        // Estudiante
        DB::table('curricula')->insert([
            'name' => 'Julio',
            'last_name' => 'Barrera Gomez',
            'email' => 'julio@email.com',
            'phone' => '4422020202',
            'about_me' => 'Julio es un joven carismático y amigable. Destaca en el deporte, especialmente en fútbol y atletismo. Es dedicado en sus estudios, mostrando interés en ciencias y tecnología. Su mente analítica y creativa lo hace un talentoso solucionador de problemas. Le encanta viajar, explorar culturas y ayudar en proyectos de voluntariado. Conecta fácilmente con los demás y es un amigo leal y compasivo.',
            'study_programs_id' => 6,
            'semester' => 9,
            'academic_achievements' => json_encode(["Logro 1 Julio", "Logro 2 Julio", "Logro 3 Julio", "Logro 4 Julio", "Logro 5 Julio"]),
            'academic_programs_id' => 1,
            'experience' => json_encode(["Experiencia 1 Julio", "Experiencia 2 Julio", "Experiencia 3 Julio", "Experiencia 4 Julio", "Experiencia 5 Julio"]),
            'projects' => json_encode(["Proyecto 1 Julio", "Proyecto 2 Julio", "Proyecto 3 Julio", "Proyecto 4 Julio", "Proyecto 5 Julio"]),
            'references' => json_encode([
                ["name" => "Pedro Juárez Morales", "email" => "pedro@email.com", "phone" => "4426543210"],
                ["name" => "Ana Torres González", "email" => "ana@email.com", "phone" => "4425432109"],
                ["name" => "Ricardo Sánchez Flores", "email" => "ricardo@email.com", "phone" => "4424321098"]
            ]),            
            'type' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        
        // Estudiante
        DB::table('curricula')->insert([
            'name' => 'Germán',
            'last_name' => 'Ramírez Ramírez',
            'email' => 'german@email.com',
            'phone' => '4420202020',
            'about_me' => 'Germán es un joven curioso y apasionado por el conocimiento. Destaca en ciencias y matemáticas, pero también encuentra inspiración en el arte y la música. Practica baloncesto y ciclismo, y disfruta de la naturaleza en su tiempo libre. Es amable, empático y siempre está dispuesto a ayudar a los demás. Con determinación y ética de trabajo, enfrenta desafíos con valentía. Su mente abierta y habilidad para trabajar en equipo aseguran un futuro prometedor.',
            'study_programs_id' => 11,
            'semester' => 3,
            'academic_achievements' => json_encode(["Logro 1 Germán", "Logro 2 Germán", "Logro 3 Germán", "Logro 4 Germán", "Logro 5 Germán"]),
            'academic_programs_id' => 2,
            'experience' => json_encode(["Experiencia 1 Germán", "Experiencia 2 Germán", "Experiencia 3 Germán", "Experiencia 4 Germán", "Experiencia 5 Germán"]),
            'projects' => json_encode(["Proyecto 1 Germán", "Proyecto 2 Germán", "Proyecto 3 Germán", "Proyecto 4 Germán", "Proyecto 5 Germán"]),
            'references' => json_encode([
                ["name" => "Isabel Mendoza Silva", "email" => "isabel@email.com", "phone" => "4423210987"],
                ["name" => "Sergio López Herrera", "email" => "sergio@email.com", "phone" => "4422109876"],
                ["name" => "Fernanda Ramírez Paredes", "email" => "fernanda@email.com", "phone" => "4421098765"]
            ]),            
            'type' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        // Estudiante
        DB::table('curricula')->insert([
            'name' => 'Noe',
            'last_name' => 'Becerra Mora',
            'email' => 'noe@email.com',
            'phone' => '4423030303',
            'about_me' => 'Apasionado por el arte y la música, se expresa con libertad y originalidad. Curioso por naturaleza, busca aprender y descubrir nuevas ideas. Amigo leal y comprensivo, está dispuesto a brindar apoyo en cualquier momento. Disfruta la naturaleza y explorar al aire libre. Su optimismo y determinación lo ayudan a enfrentar desafíos con valentía. Con un corazón generoso y mente abierta, Noé está listo para convertir sus sueños en realidad y dejar una huella positiva en el mundo.',
            'study_programs_id' => 7,
            'semester' => 7,
            'academic_achievements' => json_encode(["Logro 1 Noé", "Logro 2 Noé", "Logro 3 Noé", "Logro 4 Noé", "Logro 5 Noé"]),
            'academic_programs_id' => 2,
            'experience' => json_encode(["Experiencia 1 Noé", "Experiencia 2 Noé", "Experiencia 3 Noé", "Experiencia 4 Noé", "Experiencia 5 Noé"]),
            'projects' => json_encode(["Proyecto 1 Noé", "Proyecto 2 Noé", "Proyecto 3 Noé", "Proyecto 4 Noé", "Proyecto 5 Noé"]),
            'references' => json_encode([
                ["name" => "Alejandro Sánchez Jiménez", "email" => "alejandro@email.com", "phone" => "4426543210"],
                ["name" => "Laura Pérez García", "email" => "laura@email.com", "phone" => "4425432109"],
                ["name" => "Carlos Martínez Hernández", "email" => "carlos@email.com", "phone" => "4424321098"]
            ]),                              
            'type' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        // Estudiante
        DB::table('curricula')->insert([
            'name' => 'Enrique',
            'last_name' => 'Hernández Pérez',
            'email' => 'enrique@email.com',
            'phone' => '4420303030',
            'about_me' => 'Enrique es un joven apasionado por la tecnología y la programación. Su dedicación como estudiante lo impulsa a aprender constantemente y enfrentar desafíos con determinación. Es un amigo leal y comprensivo, amante del fútbol y la naturaleza. Con mente analítica y visión emprendedora, busca convertir sus ideas en proyectos innovadores. Su carisma y deseo de generar un impacto positivo en la sociedad prometen un futuro brillante.',
            'study_programs_id' => 3,
            'semester' => 3,
            'academic_achievements' => json_encode(["Logro 1 Enrique", "Logro 2 Enrique", "Logro 3 Enrique", "Logro 4 Enrique", "Logro 5 Enrique"]),
            'academic_programs_id' => 1,
            'experience' => json_encode(["Experiencia 1 Enrique", "Experiencia 2 Enrique", "Experiencia 3 Enrique", "Experiencia 4 Enrique", "Experiencia 5 Enrique"]),
            'projects' => json_encode(["Proyecto 1 Enrique", "Proyecto 2 Enrique", "Proyecto 3 Enrique", "Proyecto 4 Enrique", "Proyecto 5 Enrique"]),
            'references' => json_encode([
                ["name" => "Pedro Sánchez Jiménez", "email" => "pedro@email.com", "phone" => "4426543210"],
                ["name" => "Ana Torres García", "email" => "ana@email.com", "phone" => "4425432109"],
                ["name" => "Carlos Martínez Herrera", "email" => "carlos@email.com", "phone" => "4424321098"]
            ]),                                        
            'type' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        // Estudiante
        DB::table('curricula')->insert([
            'name' => 'Miriam',
            'last_name' => 'Gómez Estrada',
            'email' => 'miriam@email.com',
            'phone' => '4420404040',
            'about_me' => 'Miriam es una joven talentosa y carismática. Su pasión por la música y el canto la hace destacar en cada interpretación. Es una estudiante brillante con una mente inquisitiva, siempre buscando nuevos aprendizajes. Amiga leal y comprensiva, brinda apoyo a quienes la rodean. Con determinación y actitud positiva, enfrenta desafíos con valentía. Su empatía y generosidad la hacen excepcional. Con un futuro prometedor, está lista para dejar una huella significativa en el mundo.',
            'study_programs_id' => 7,
            'semester' => 7,
            'academic_achievements' => json_encode(["Logro 1 Miriam", "Logro 2 Miriam", "Logro 3 Miriam", "Logro 4 Miriam", "Logro 5 Miriam"]),
            'academic_programs_id' => 1,
            'experience' => json_encode(["Experiencia 1 Miriam", "Experiencia 2 Miriam", "Experiencia 3 Miriam", "Experiencia 4 Miriam", "Experiencia 5 Miriam"]),
            'projects' => json_encode(["Proyecto 1 Miriam", "Proyecto 2 Miriam", "Proyecto 3 Miriam", "Proyecto 4 Miriam", "Proyecto 5 Miriam"]),
            'references' => json_encode([
                ["name" => "Isabel Ramírez González", "email" => "isabel@email.com", "phone" => "4423210987"],
                ["name" => "Sergio Gómez Martínez", "email" => "sergio@email.com", "phone" => "4422109876"],
                ["name" => "Fernanda López Paredes", "email" => "fernanda@email.com", "phone" => "4421098765"]
            ]),                                         
            'type' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        // Docente

    }
}
