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
        /* ========================================
        Estudiantes (10)
        ========================================= */
        // 1
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

        // 2
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

        // 3
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

        // 4
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

        // 5
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

        // 6
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

        // 7
        DB::table('curricula')->insert([
            'name' => 'Juan Carlos',
            'last_name' => 'García Pérez',
            'email' => 'juan@email.com',
            'phone' => '4422020202',
            'about_me' => 'Juan es un apasionado de la tecnología y la innovación. Siempre buscando soluciones creativas a los problemas, ha demostrado ser un estudiante dedicado. Su curiosidad lo ha llevado a explorar diferentes áreas de estudio. Amigo leal y comprometido, siempre está dispuesto a ayudar a los demás. Le encanta la programación y disfruta de los retos que le plantea el mundo digital. Con una mentalidad abierta y positiva, enfrenta cada día con entusiasmo.',
            'study_programs_id' => 5,
            'semester' => 9,
            'academic_achievements' => json_encode(["Logro 1 Juan", "Logro 2 Juan", "Logro 3 Juan", "Logro 4 Juan", "Logro 5 Juan"]),
            'academic_programs_id' => 2,
            'experience' => json_encode(["Experiencia 1 Juan", "Experiencia 2 Juan", "Experiencia 3 Juan", "Experiencia 4 Juan", "Experiencia 5 Juan"]),
            'projects' => json_encode(["Proyecto 1 Juan", "Proyecto 2 Juan", "Proyecto 3 Juan", "Proyecto 4 Juan", "Proyecto 5 Juan"]),
            'references' => json_encode([
                ["name" => "Ana Rodríguez Morales", "email" => "ana@email.com", "phone" => "4421112233"],
                ["name" => "Luisa Sánchez Ortiz", "email" => "luisa@email.com", "phone" => "4423344555"],
                ["name" => "Pedro Núñez Gómez", "email" => "pedro@email.com", "phone" => "4425566777"]
            ]),
            'type' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        // 8
        DB::table('curricula')->insert([
            'name' => 'Ana María',
            'last_name' => 'López Hernández',
            'email' => 'ana_maria@email.com',
            'phone' => '4423030303',
            'about_me' => 'Ana María es una estudiante apasionada por las ciencias sociales y el activismo. Siempre comprometida con causas sociales, ha liderado proyectos comunitarios y participado en eventos en pro de la equidad. Es una persona comunicativa y colaborativa, capaz de trabajar en equipo para lograr objetivos comunes. Su creatividad y visión la destacan como una líder emergente. Con un enfoque proactivo, se embarca en desafíos que generan un impacto positivo en la sociedad.',
            'study_programs_id' => 16,
            'semester' => 5,
            'academic_achievements' => json_encode(["Logro 1 Ana María", "Logro 2 Ana María", "Logro 3 Ana María", "Logro 4 Ana María", "Logro 5 Ana María"]),
            'academic_programs_id' => 1,
            'experience' => json_encode(["Experiencia 1 Ana María", "Experiencia 2 Ana María", "Experiencia 3 Ana María", "Experiencia 4 Ana María", "Experiencia 5 Ana María"]),
            'projects' => json_encode(["Proyecto 1 Ana María", "Proyecto 2 Ana María", "Proyecto 3 Ana María", "Proyecto 4 Ana María", "Proyecto 5 Ana María"]),
            'references' => json_encode([
                ["name" => "Ricardo Torres Jiménez", "email" => "ricardo@email.com", "phone" => "4428889999"],
                ["name" => "Elena García Rodríguez", "email" => "elena@email.com", "phone" => "4427778888"],
                ["name" => "Javier Díaz Martínez", "email" => "javier@email.com", "phone" => "4426667777"]
            ]),
            'type' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        // 9
        DB::table('curricula')->insert([
            'name' => 'Carlos Alberto',
            'last_name' => 'Martínez Ramírez',
            'email' => 'carlos_alberto@email.com',
            'phone' => '4424040404',
            'about_me' => 'Carlos Alberto es un estudiante de ciencias exactas con una pasión por la investigación. Su enfoque metódico y su dedicación a la resolución de problemas lo convierten en un académico destacado. Siempre inquieto por descubrir nuevas formas de abordar desafíos científicos, ha participado en proyectos de investigación desde temprana edad. Su habilidad para analizar datos y su mentalidad analítica son sus principales fortalezas. Fuera de las aulas, disfruta de la lectura y los deportes al aire libre.',
            'study_programs_id' => 4,
            'semester' => 5,
            'academic_achievements' => json_encode(["Logro 1 Carlos Alberto", "Logro 2 Carlos Alberto", "Logro 3 Carlos Alberto", "Logro 4 Carlos Alberto", "Logro 5 Carlos Alberto"]),
            'academic_programs_id' => 1,
            'experience' => json_encode(["Experiencia 1 Carlos Alberto", "Experiencia 2 Carlos Alberto", "Experiencia 3 Carlos Alberto", "Experiencia 4 Carlos Alberto", "Experiencia 5 Carlos Alberto"]),
            'projects' => json_encode(["Proyecto 1 Carlos Alberto", "Proyecto 2 Carlos Alberto", "Proyecto 3 Carlos Alberto", "Proyecto 4 Carlos Alberto", "Proyecto 5 Carlos Alberto"]),
            'references' => json_encode([
                ["name" => "Verónica Soto García", "email" => "veronica@email.com", "phone" => "4425554444"],
                ["name" => "Miguel Hernández Ruiz", "email" => "miguel@email.com", "phone" => "4424443333"],
                ["name" => "Isabel Gutiérrez Sánchez", "email" => "isabel@email.com", "phone" => "4423332222"]
            ]),
            'type' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        // 10
        DB::table('curricula')->insert([
            'name' => 'María José',
            'last_name' => 'Díaz Vargas',
            'email' => 'maria_jose@email.com',
            'phone' => '4425050505',
            'about_me' => 'María José es una estudiante de comunicación apasionada por el poder de las palabras. Su creatividad y habilidades lingüísticas la destacan en su campo. Siempre comprometida con contar historias impactantes, ha trabajado en diversos proyectos multimedia. Además de su destreza en redacción, es una persona carismática y empática. Fuera de las aulas, disfruta de la fotografía y la exploración de diferentes formas de expresión artística.',
            'study_programs_id' => 6,
            'semester' => 6,
            'academic_achievements' => json_encode(["Logro 1 María José", "Logro 2 María José", "Logro 3 María José", "Logro 4 María José", "Logro 5 María José"]),
            'academic_programs_id' => 2,
            'experience' => json_encode(["Experiencia 1 María José", "Experiencia 2 María José", "Experiencia 3 María José", "Experiencia 4 María José", "Experiencia 5 María José"]),
            'projects' => json_encode(["Proyecto 1 María José", "Proyecto 2 María José", "Proyecto 3 María José", "Proyecto 4 María José", "Proyecto 5 María José"]),
            'references' => json_encode([
                ["name" => "Roberto Fernández López", "email" => "roberto@email.com", "phone" => "4422221111"],
                ["name" => "Sofía Pérez Torres", "email" => "sofia@email.com", "phone" => "4421110000"],
                ["name" => "Eduardo Ramírez García", "email" => "eduardo@email.com", "phone" => "4429998888"]
            ]),
            'type' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);


        /* ========================================
        Egresados (10)
        ========================================= */
        // 1
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

        // 2
        DB::table('curricula')->insert([
            'name' => 'María Fernanda',
            'last_name' => 'Gómez Pérez',
            'email' => 'maria@email.com',
            'phone' => '4420202020',
            'about_me' => 'María es una estudiante entusiasta de las ciencias sociales. Destaca por su dedicación a la investigación y su compromiso con el servicio comunitario. Es una líder en proyectos de impacto social y ha colaborado en diversas iniciativas para mejorar la calidad de vida de las personas. En su tiempo libre, disfruta participar en actividades culturales y eventos benéficos.',
            'study_programs_id' => 8,
            'semester' => 10,
            'academic_achievements' => json_encode(["Logro 1 María", "Logro 2 María", "Logro 3 María", "Logro 4 María", "Logro 5 María"]),
            'academic_programs_id' => 2,
            'experience' => json_encode(["Experiencia 1 María", "Experiencia 2 María", "Experiencia 3 María", "Experiencia 4 María", "Experiencia 5 María"]),
            'projects' => json_encode(["Proyecto 1 María", "Proyecto 2 María", "Proyecto 3 María", "Proyecto 4 María", "Proyecto 5 María"]),
            'references' => json_encode([
                ["name" => "Alejandro Rodríguez López", "email" => "alejandro@email.com", "phone" => "4421234567"],
                ["name" => "Laura Martínez Torres", "email" => "laura@email.com", "phone" => "4422345678"],
                ["name" => "Carlos Soto Ramírez", "email" => "carlos@email.com", "phone" => "4423456789"]
            ]),
            'type' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        // 3
        DB::table('curricula')->insert([
            'name' => 'Ana Sofía',
            'last_name' => 'Rodríguez García',
            'email' => 'ana@email.com',
            'phone' => '4420303030',
            'about_me' => 'Ana es una estudiante de ingeniería con una pasión por la programación. Ha destacado en competiciones de programación a nivel nacional e internacional. Su habilidad para resolver problemas complejos y su enfoque en la eficiencia la convierten en una profesional prometedora. En su tiempo libre, disfruta explorar nuevas tecnologías y contribuir a proyectos de código abierto.',
            'study_programs_id' => 12,
            'semester' => 10,
            'academic_achievements' => json_encode(["Logro 1 Ana", "Logro 2 Ana", "Logro 3 Ana", "Logro 4 Ana", "Logro 5 Ana"]),
            'academic_programs_id' => 2,
            'experience' => json_encode(["Experiencia 1 Ana", "Experiencia 2 Ana", "Experiencia 3 Ana", "Experiencia 4 Ana", "Experiencia 5 Ana"]),
            'projects' => json_encode(["Proyecto 1 Ana", "Proyecto 2 Ana", "Proyecto 3 Ana", "Proyecto 4 Ana", "Proyecto 5 Ana"]),
            'references' => json_encode([
                ["name" => "Eduardo Pérez Hernández", "email" => "eduardo@email.com", "phone" => "4429876543"],
                ["name" => "Isabel Flores Martínez", "email" => "isabel@email.com", "phone" => "4428765432"],
                ["name" => "Juan Ramírez Sánchez", "email" => "juan@email.com", "phone" => "4427654321"]
            ]),
            'type' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        // 4
        DB::table('curricula')->insert([
            'name' => 'Carlos Alberto',
            'last_name' => 'Hernández López',
            'email' => 'carlos@email.com',
            'phone' => '4420404040',
            'about_me' => 'Carlos es un estudiante de ciencias ambientales con un fuerte compromiso con la sostenibilidad. Ha participado en proyectos de conservación y en iniciativas para concientizar sobre el cambio climático. Su enfoque proactivo y su pasión por el medio ambiente lo destacan como un líder en su campo. En su tiempo libre, disfruta de actividades al aire libre y la fotografía natural.',
            'study_programs_id' => 5,
            'semester' => 10,
            'academic_achievements' => json_encode(["Logro 1 Carlos", "Logro 2 Carlos", "Logro 3 Carlos", "Logro 4 Carlos", "Logro 5 Carlos"]),
            'academic_programs_id' => 2,
            'experience' => json_encode(["Experiencia 1 Carlos", "Experiencia 2 Carlos", "Experiencia 3 Carlos", "Experiencia 4 Carlos", "Experiencia 5 Carlos"]),
            'projects' => json_encode(["Proyecto 1 Carlos", "Proyecto 2 Carlos", "Proyecto 3 Carlos", "Proyecto 4 Carlos", "Proyecto 5 Carlos"]),
            'references' => json_encode([
                ["name" => "Silvia Martínez García", "email" => "silvia@email.com", "phone" => "4428765432"],
                ["name" => "Javier Torres Rodríguez", "email" => "javier@email.com", "phone" => "4427654321"],
                ["name" => "Liliana Sánchez Pérez", "email" => "liliana@email.com", "phone" => "4426543210"]
            ]),
            'type' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        // 5
        DB::table('curricula')->insert([
            'name' => 'Luis Miguel',
            'last_name' => 'Martínez Gutiérrez',
            'email' => 'luis@email.com',
            'phone' => '4420505050',
            'about_me' => 'Luis es un estudiante de economía con un enfoque en finanzas y análisis de datos. Ha participado en investigaciones económicas y se destaca por su habilidad para interpretar tendencias financieras. Su dedicación y habilidades analíticas lo convierten en un candidato ideal para roles en el sector financiero. En su tiempo libre, disfruta de la música y la lectura de libros de economía.',
            'study_programs_id' => 9,
            'semester' => 10,
            'academic_achievements' => json_encode(["Logro 1 Luis", "Logro 2 Luis", "Logro 3 Luis", "Logro 4 Luis", "Logro 5 Luis"]),
            'academic_programs_id' => 2,
            'experience' => json_encode(["Experiencia 1 Luis", "Experiencia 2 Luis", "Experiencia 3 Luis", "Experiencia 4 Luis", "Experiencia 5 Luis"]),
            'projects' => json_encode(["Proyecto 1 Luis", "Proyecto 2 Luis", "Proyecto 3 Luis", "Proyecto 4 Luis", "Proyecto 5 Luis"]),
            'references' => json_encode([
                ["name" => "Ana María Gómez López", "email" => "ana@email.com", "phone" => "4427654321"],
                ["name" => "Ricardo Soto Ramírez", "email" => "ricardo@email.com", "phone" => "4426543210"],
                ["name" => "Gabriela Torres Hernández", "email" => "gabriela@email.com", "phone" => "4425432109"]
            ]),
            'type' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        // 6
        DB::table('curricula')->insert([
            'name' => 'Laura Vanessa',
            'last_name' => 'Sánchez Ramírez',
            'email' => 'laura@email.com',
            'phone' => '4420606060',
            'about_me' => 'Laura es una estudiante de psicología con un enfoque en la psicología clínica. Ha participado en prácticas profesionales en instituciones de salud mental y se destaca por su empatía y habilidades de escucha. Su interés en el bienestar emocional la impulsa a buscar oportunidades para ayudar a otros. En su tiempo libre, disfruta de la pintura y la meditación.',
            'study_programs_id' => 14,
            'semester' => 10,
            'academic_achievements' => json_encode(["Logro 1 Laura", "Logro 2 Laura", "Logro 3 Laura", "Logro 4 Laura", "Logro 5 Laura"]),
            'academic_programs_id' => 2,
            'experience' => json_encode(["Experiencia 1 Laura", "Experiencia 2 Laura", "Experiencia 3 Laura", "Experiencia 4 Laura", "Experiencia 5 Laura"]),
            'projects' => json_encode(["Proyecto 1 Laura", "Proyecto 2 Laura", "Proyecto 3 Laura", "Proyecto 4 Laura", "Proyecto 5 Laura"]),
            'references' => json_encode([
                ["name" => "Roberto Torres Jiménez", "email" => "roberto@email.com", "phone" => "4420987654"],
                ["name" => "Verónica Sánchez García", "email" => "veronica@email.com", "phone" => "4429876543"],
                ["name" => "Manuel Gómez González", "email" => "manuel@email.com", "phone" => "4428765432"]
            ]),
            'type' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        // 7
        DB::table('curricula')->insert([
            'name' => 'Gabriel Alejandro',
            'last_name' => 'Ramírez Gómez',
            'email' => 'gabriel@email.com',
            'phone' => '4420707070',
            'about_me' => 'Gabriel es un estudiante de biología con especialización en ecología. Ha participado en investigaciones relacionadas con la conservación de la biodiversidad y la ecología de ecosistemas. Su compromiso con el medio ambiente y su capacidad para el trabajo en campo lo destacan como un científico prometedor. En su tiempo libre, disfruta de la observación de aves y la fotografía de la naturaleza.',
            'study_programs_id' => 3,
            'semester' => 10,
            'academic_achievements' => json_encode(["Logro 1 Gabriel", "Logro 2 Gabriel", "Logro 3 Gabriel", "Logro 4 Gabriel", "Logro 5 Gabriel"]),
            'academic_programs_id' => 2,
            'experience' => json_encode(["Experiencia 1 Gabriel", "Experiencia 2 Gabriel", "Experiencia 3 Gabriel", "Experiencia 4 Gabriel", "Experiencia 5 Gabriel"]),
            'projects' => json_encode(["Proyecto 1 Gabriel", "Proyecto 2 Gabriel", "Proyecto 3 Gabriel", "Proyecto 4 Gabriel", "Proyecto 5 Gabriel"]),
            'references' => json_encode([
                ["name" => "Elena Martínez Soto", "email" => "elena@email.com", "phone" => "4428765432"],
                ["name" => "Héctor Torres Ramírez", "email" => "hector@email.com", "phone" => "4427654321"],
                ["name" => "Ana López Gutiérrez", "email" => "ana@email.com", "phone" => "4426543210"]
            ]),
            'type' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        // 8
        DB::table('curricula')->insert([
            'name' => 'Isabel Cristina',
            'last_name' => 'García Hernández',
            'email' => 'isabel@email.com',
            'phone' => '4420808080',
            'about_me' => 'Isabel es una estudiante de química con enfoque en investigación de nuevos materiales. Ha participado en proyectos de síntesis y caracterización de compuestos químicos. Su habilidad para trabajar en entornos de laboratorio y su pasión por la química la convierten en una científica talentosa. En su tiempo libre, disfruta de la cocina y la experimentación con recetas.',
            'study_programs_id' => 7,
            'semester' => 10,
            'academic_achievements' => json_encode(["Logro 1 Isabel", "Logro 2 Isabel", "Logro 3 Isabel", "Logro 4 Isabel", "Logro 5 Isabel"]),
            'academic_programs_id' => 2,
            'experience' => json_encode(["Experiencia 1 Isabel", "Experiencia 2 Isabel", "Experiencia 3 Isabel", "Experiencia 4 Isabel", "Experiencia 5 Isabel"]),
            'projects' => json_encode(["Proyecto 1 Isabel", "Proyecto 2 Isabel", "Proyecto 3 Isabel", "Proyecto 4 Isabel", "Proyecto 5 Isabel"]),
            'references' => json_encode([
                ["name" => "Roberto Gómez Sánchez", "email" => "roberto@email.com", "phone" => "4427654321"],
                ["name" => "Laura Torres Pérez", "email" => "laura@email.com", "phone" => "4426543210"],
                ["name" => "Miguel Ramírez López", "email" => "miguel@email.com", "phone" => "4425432109"]
            ]),
            'type' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        // 9
        DB::table('curricula')->insert([
            'name' => 'Daniela Patricia',
            'last_name' => 'Soto Gutiérrez',
            'email' => 'daniela@email.com',
            'phone' => '4420909090',
            'about_me' => 'Daniela es una estudiante de matemáticas con especialización en estadística. Ha destacado en la resolución de problemas matemáticos complejos y en el análisis de datos estadísticos. Su enfoque analítico y su capacidad para trabajar con números la convierten en una profesional prometedora en el campo de la estadística. En su tiempo libre, disfruta de juegos de mesa y rompecabezas.',
            'study_programs_id' => 11,
            'semester' => 10,
            'academic_achievements' => json_encode(["Logro 1 Daniela", "Logro 2 Daniela", "Logro 3 Daniela", "Logro 4 Daniela", "Logro 5 Daniela"]),
            'academic_programs_id' => 2,
            'experience' => json_encode(["Experiencia 1 Daniela", "Experiencia 2 Daniela", "Experiencia 3 Daniela", "Experiencia 4 Daniela", "Experiencia 5 Daniela"]),
            'projects' => json_encode(["Proyecto 1 Daniela", "Proyecto 2 Daniela", "Proyecto 3 Daniela", "Proyecto 4 Daniela", "Proyecto 5 Daniela"]),
            'references' => json_encode([
                ["name" => "Ricardo Martínez Gómez", "email" => "ricardo@email.com", "phone" => "4426543210"],
                ["name" => "Elena Torres Ramírez", "email" => "elena@email.com", "phone" => "4425432109"],
                ["name" => "Javier Sánchez López", "email" => "javier@email.com", "phone" => "4424321098"]
            ]),
            'type' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        // 10
        DB::table('curricula')->insert([
            'name' => 'Mariana Alejandra',
            'last_name' => 'López Ramírez',
            'email' => 'mariana@email.com',
            'phone' => '4421001010',
            'about_me' => 'Mariana es una estudiante de física con especialización en astrofísica. Ha participado en investigaciones relacionadas con la cosmología y la estructura del universo. Su fascinación por los fenómenos astronómicos y su habilidad para comprender conceptos complejos la convierten en una científica prometedora. En su tiempo libre, disfruta de la observación del cielo nocturno y la astronomía amateur.',
            'study_programs_id' => 16,
            'semester' => 10,
            'academic_achievements' => json_encode(["Logro 1 Mariana", "Logro 2 Mariana", "Logro 3 Mariana", "Logro 4 Mariana", "Logro 5 Mariana"]),
            'academic_programs_id' => 2,
            'experience' => json_encode(["Experiencia 1 Mariana", "Experiencia 2 Mariana", "Experiencia 3 Mariana", "Experiencia 4 Mariana", "Experiencia 5 Mariana"]),
            'projects' => json_encode(["Proyecto 1 Mariana", "Proyecto 2 Mariana", "Proyecto 3 Mariana", "Proyecto 4 Mariana", "Proyecto 5 Mariana"]),
            'references' => json_encode([
                ["name" => "Carlos Gómez Pérez", "email" => "carlos@email.com", "phone" => "4425432109"],
                ["name" => "Laura Sánchez Gutiérrez", "email" => "laura@email.com", "phone" => "4424321098"],
                ["name" => "Eduardo Martínez Ramírez", "email" => "eduardo@email.com", "phone" => "4423210987"]
            ]),
            'type' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);


        /* ========================================
        Docentes (10)
        ========================================= */
        // 1
        DB::table('curricula')->insert([
            'name' => 'Roberto Alonso',
            'last_name' => 'Gutiérrez Ramírez',
            'email' => 'roberto_alonso@email.com',
            'phone' => '4421313131',
            'about_me' => 'Roberto Alonso es un docente de economía con experiencia en análisis financiero y desarrollo económico. Su enfoque pedagógico incluye la aplicación práctica de teorías económicas en escenarios del mundo real. Ha participado en proyectos de investigación económica y asesorado a empresas locales en estrategias financieras. Además de su labor docente, contribuye a iniciativas comunitarias para la promoción de la educación económica.',
            'study_level' => json_encode(["Ph.D. en Economía"]),
            'degree' => 'Doctorado en Economía',
            'academic_achievements' => json_encode(["Investigación en Desarrollo Económico Local", "Asesoramiento Financiero a Empresas"]),
            'experience' => json_encode(["Profesor de Economía en la Universidad L", "Consultor Económico"]),
            'projects' => json_encode(["Iniciativa de Educación Financiera Comunitaria", "Análisis de Impacto Económico Local"]),
            'references' => json_encode([
                ["name" => "Carmen Beatriz Ramírez Cruz", "email" => "carmen_beatriz@email.com", "phone" => "4426060606"],
                ["name" => "Gabriel Alonso Sánchez Cruz", "email" => "gabriel@email.com", "phone" => "4422002020"],
                ["name" => "Elena Patricia Hernández Rodríguez", "email" => "elena_patricia@email.com", "phone" => "4423003030"]
            ]),
            'type' => 3,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        // 2
        DB::table('curricula')->insert([
            'name' => 'Gabriel Alonso',
            'last_name' => 'Sánchez Cruz',
            'email' => 'gabriel@email.com',
            'phone' => '4422002020',
            'about_me' => 'Gabriel es un docente apasionado por la biología y la ecología. Con una sólida formación académica en biología marina, ha liderado investigaciones en conservación de ecosistemas acuáticos. Su enfoque educativo se centra en fomentar la conciencia ambiental y el respeto por la biodiversidad. Fuera del aula, disfruta de la fotografía de naturaleza y promueve la participación estudiantil en proyectos de conservación.',
            'study_level' => json_encode(["Ph.D. en Biología Marina"]),
            'degree' => 'Doctor en Biología Marina',
            'academic_achievements' => json_encode(["Publicación destacada en Ecología Marina", "Investigación sobre Conservación de Arrecifes Coralinos"]),
            'experience' => json_encode(["Profesor de Biología Marina en la Universidad X", "Investigador en Conservación Marina"]),
            'projects' => json_encode(["Proyecto de Conservación de Tortugas Marinas", "Estudio de la Biodiversidad Marina"]),
            'references' => json_encode([
                ["name" => "María Rodríguez Soto", "email" => "maria@email.com", "phone" => "4429876543"],
                ["name" => "Javier Torres Gómez", "email" => "javier@email.com", "phone" => "4428765432"],
                ["name" => "Liliana García Martínez", "email" => "liliana@email.com", "phone" => "4427654321"]
            ]),
            'type' => 3,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        // 3
        DB::table('curricula')->insert([
            'name' => 'Elena Patricia',
            'last_name' => 'Hernández Rodríguez',
            'email' => 'elena_patricia@email.com',
            'phone' => '4423003030',
            'about_me' => 'Elena Patricia es una docente de literatura con una pasión por la poesía contemporánea. Su enfoque pedagógico incluye la exploración de diversas corrientes literarias y la promoción de la creatividad en sus estudiantes. Ha participado en proyectos de investigación sobre la influencia de la literatura en la sociedad moderna. Además de su labor académica, disfruta organizando eventos culturales y clubes de lectura.',
            'study_level' => json_encode(["M.A. en Literatura Comparada"]),
            'degree' => 'Maestría en Literatura Comparada',
            'academic_achievements' => json_encode(["Investigación sobre Poesía Contemporánea", "Colaboración en Antología Literaria"]),
            'experience' => json_encode(["Profesora de Literatura en la Universidad Y", "Organizadora de Eventos Culturales"]),
            'projects' => json_encode(["Club de Lectura de Poesía", "Festival de Literatura Contemporánea"]),
            'references' => json_encode([
                ["name" => "Luis Sánchez Ortiz", "email" => "luis@email.com", "phone" => "4421112233"],
                ["name" => "Ana Gómez Herrera", "email" => "ana@email.com", "phone" => "4423344555"],
                ["name" => "Carlos Martínez López", "email" => "carlos@email.com", "phone" => "4425566777"]
            ]),
            'type' => 3,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        // 4
        DB::table('curricula')->insert([
            'name' => 'Francisco Javier',
            'last_name' => 'Martínez Gómez',
            'email' => 'francisco_javier@email.com',
            'phone' => '4424040404',
            'about_me' => 'Francisco Javier es un docente de informática con una sólida experiencia en desarrollo de software. Su enfoque educativo incluye la enseñanza de programación orientada a objetos y metodologías ágiles. Ha liderado proyectos de desarrollo de aplicaciones empresariales y participado en la formación de profesionales de la informática. Apasionado por la tecnología, está siempre actualizado con las últimas tendencias en el mundo de la programación.',
            'study_level' => json_encode(["M.Sc. en Ingeniería de Software"]),
            'degree' => 'Máster en Ingeniería de Software',
            'academic_achievements' => json_encode(["Desarrollo de Aplicación Móvil Innovadora", "Certificación en Metodologías Ágiles"]),
            'experience' => json_encode(["Profesor de Informática en la Universidad Z", "Consultor de Desarrollo de Software"]),
            'projects' => json_encode(["Sistema de Gestión Empresarial", "Plataforma Educativa en Línea"]),
            'references' => json_encode([
                ["name" => "Verónica Soto García", "email" => "veronica@email.com", "phone" => "4425554444"],
                ["name" => "Miguel Hernández Ruiz", "email" => "miguel@email.com", "phone" => "4424443333"],
                ["name" => "Isabel Gutiérrez Sánchez", "email" => "isabel@email.com", "phone" => "4423332222"]
            ]),
            'type' => 3,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        // 5
        DB::table('curricula')->insert([
            'name' => 'Carmen Beatriz',
            'last_name' => 'Ramírez Cruz',
            'email' => 'carmen_beatriz@email.com',
            'phone' => '4426060606',
            'about_me' => 'Carmen Beatriz es una docente de psicología con enfoque en psicoterapia cognitivo-conductual. Su labor educativa se centra en la comprensión de la mente humana y la aplicación de técnicas terapéuticas. Ha trabajado en el ámbito clínico, asistiendo a individuos con diversas necesidades psicológicas. Además de su dedicación a la enseñanza, participa en investigaciones sobre bienestar emocional y salud mental en la comunidad.',
            'study_level' => json_encode(["Ph.D. en Psicología Clínica"]),
            'degree' => 'Doctorado en Psicología Clínica',
            'academic_achievements' => json_encode(["Investigación sobre Estrés y Afrontamiento", "Publicación en Revista de Psicoterapia"]),
            'experience' => json_encode(["Profesora de Psicología en la Universidad W", "Psicoterapeuta Clínica"]),
            'projects' => json_encode(["Programa de Bienestar Emocional en la Comunidad", "Talleres de Manejo del Estrés"]),
            'references' => json_encode([
                ["name" => "Roberto Fernández López", "email" => "roberto@email.com", "phone" => "4422221111"],
                ["name" => "Sofía Pérez Torres", "email" => "sofia@email.com", "phone" => "4421110000"],
                ["name" => "Eduardo Ramírez García", "email" => "eduardo@email.com", "phone" => "4429998888"]
            ]),
            'type' => 3,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        // 6
        DB::table('curricula')->insert([
            'name' => 'Alejandro Daniel',
            'last_name' => 'Gómez Herrera',
            'email' => 'alejandro_daniel@email.com',
            'phone' => '4427070707',
            'about_me' => 'Alejandro Daniel es un docente de matemáticas con especialización en geometría algebraica. Su pasión por la resolución de problemas matemáticos complejos lo ha llevado a contribuir en investigaciones académicas en su campo. En el aula, fomenta el pensamiento lógico y la creatividad matemática. Además de su labor docente, participa en competiciones matemáticas y eventos académicos.',
            'study_level' => json_encode(["Ph.D. en Matemáticas"]),
            'degree' => 'Doctorado en Matemáticas',
            'academic_achievements' => json_encode(["Investigación en Geometría Algebraica", "Premio Nacional de Matemáticas"]),
            'experience' => json_encode(["Profesor de Matemáticas en la Universidad Q", "Participación en Olimpiadas Matemáticas"]),
            'projects' => json_encode(["Desarrollo de Material Didáctico en Matemáticas", "Organizador de Eventos Académicos"]),
            'references' => json_encode([
                ["name" => "María José Díaz Vargas", "email" => "maria_jose@email.com", "phone" => "4425050505"],
                ["name" => "Carlos Alberto Martínez Ramírez", "email" => "carlos_alberto@email.com", "phone" => "4424040404"],
                ["name" => "Mariana Alejandra López Ramírez", "email" => "mariana@email.com", "phone" => "4421001010"]
            ]),
            'type' => 3,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        // 7
        DB::table('curricula')->insert([
            'name' => 'Luis Antonio',
            'last_name' => 'Torres Gutiérrez',
            'email' => 'luis_antonio@email.com',
            'phone' => '4428080808',
            'about_me' => 'Luis Antonio es un docente de química con experiencia en investigación de materiales avanzados. Su enfoque pedagógico incluye la aplicación práctica de conceptos químicos en la vida cotidiana. Ha participado en proyectos de desarrollo de nuevos materiales con propiedades innovadoras. Fuera del aula, organiza demostraciones científicas y promueve la participación estudiantil en ferias de ciencias.',
            'study_level' => json_encode(["Ph.D. en Química"]),
            'degree' => 'Doctorado en Química',
            'academic_achievements' => json_encode(["Investigación en Materiales Avanzados", "Publicación en Revista Científica"]),
            'experience' => json_encode(["Profesor de Química en la Universidad R", "Investigador en Desarrollo de Materiales"]),
            'projects' => json_encode(["Desarrollo de Polímeros Innovadores", "Demostraciones Científicas en Escuelas"]),
            'references' => json_encode([
                ["name" => "Elena Patricia Hernández Rodríguez", "email" => "elena_patricia@email.com", "phone" => "4423003030"],
                ["name" => "Carmen Beatriz Ramírez Cruz", "email" => "carmen_beatriz@email.com", "phone" => "4426060606"],
                ["name" => "Gabriel Alonso Sánchez Cruz", "email" => "gabriel@email.com", "phone" => "4422002020"]
            ]),
            'type' => 3,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        // 8
        DB::table('curricula')->insert([
            'name' => 'Patricia Isabel',
            'last_name' => 'Martínez Soto',
            'email' => 'patricia_isabel@email.com',
            'phone' => '4429090909',
            'about_me' => 'Patricia Isabel es una docente de historia con especialización en historia del arte. Su pasión por la preservación y difusión del patrimonio cultural la ha llevado a trabajar en proyectos de conservación de monumentos históricos. En el aula, fomenta el interés por la historia mediante enfoques interactivos y visitas a sitios históricos. Además de su labor docente, participa en conferencias sobre arte y patrimonio.',
            'study_level' => json_encode(["M.A. en Historia del Arte"]),
            'degree' => 'Máster en Historia del Arte',
            'academic_achievements' => json_encode(["Investigación en Conservación de Patrimonio", "Conferencia sobre Arte Renacentista"]),
            'experience' => json_encode(["Profesora de Historia en la Universidad M", "Coordinadora de Proyectos de Conservación"]),
            'projects' => json_encode(["Restauración de Pinturas Antiguas", "Ruta Histórica en la Comunidad"]),
            'references' => json_encode([
                ["name" => "Luis Antonio Torres Gutiérrez", "email" => "luis_antonio@email.com", "phone" => "4428080808"],
                ["name" => "Alejandro Daniel Gómez Herrera", "email" => "alejandro_daniel@email.com", "phone" => "4427070707"],
                ["name" => "Elena Patricia Hernández Rodríguez", "email" => "elena_patricia@email.com", "phone" => "4423003030"]
            ]),
            'type' => 3,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        // 9
        DB::table('curricula')->insert([
            'name' => 'José Manuel',
            'last_name' => 'García Torres',
            'email' => 'jose_manuel@email.com',
            'phone' => '4421010101',
            'about_me' => 'José Manuel es un docente de educación física con especialización en entrenamiento deportivo. Su compromiso con la salud y el bienestar lo ha llevado a diseñar programas de ejercicio personalizados. En el ámbito educativo, promueve la importancia de un estilo de vida activo y equilibrado. Además de su labor docente, participa como entrenador en competiciones deportivas y eventos comunitarios.',
            'study_level' => json_encode(["M.A. en Educación Física"]),
            'degree' => 'Máster en Educación Física',
            'academic_achievements' => json_encode(["Diseño de Programas de Entrenamiento", "Promoción de Estilos de Vida Saludables"]),
            'experience' => json_encode(["Profesor de Educación Física en la Universidad N", "Entrenador de Atletismo"]),
            'projects' => json_encode(["Programa de Ejercicio para Adultos Mayores", "Competiciones Deportivas Escolares"]),
            'references' => json_encode([
                ["name" => "Carmen Beatriz Ramírez Cruz", "email" => "carmen_beatriz@email.com", "phone" => "4426060606"],
                ["name" => "Gabriel Alonso Sánchez Cruz", "email" => "gabriel@email.com", "phone" => "4422002020"],
                ["name" => "Elena Patricia Hernández Rodríguez", "email" => "elena_patricia@email.com", "phone" => "4423003030"]
            ]),
            'type' => 3,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        // 10
        DB::table('curricula')->insert([
            'name' => 'Laura Gabriela',
            'last_name' => 'Martínez Gómez',
            'email' => 'laura_gabriela@email.com',
            'phone' => '4421212121',
            'about_me' => 'Laura Gabriela es una docente de idiomas con especialización en enseñanza del inglés como segunda lengua. Su enfoque educativo se centra en métodos interactivos y el desarrollo de habilidades comunicativas. Ha trabajado en programas de intercambio cultural y promovido la diversidad lingüística. Fuera del aula, participa en proyectos de traducción y eventos internacionales de idiomas.',
            'study_level' => json_encode(["M.A. en Enseñanza del Inglés como Segunda Lengua"]),
            'degree' => 'Máster en Enseñanza del Inglés como Segunda Lengua',
            'academic_achievements' => json_encode(["Desarrollo de Métodos Interactivos de Enseñanza", "Programa de Intercambio Cultural"]),
            'experience' => json_encode(["Profesora de Idiomas en la Universidad P", "Coordinadora de Proyectos de Traducción"]),
            'projects' => json_encode(["Fomento de la Diversidad Lingüística", "Evento Internacional de Idiomas"]),
            'references' => json_encode([
                ["name" => "Alejandro Daniel Gómez Herrera", "email" => "alejandro_daniel@email.com", "phone" => "4427070707"],
                ["name" => "Elena Patricia Hernández Rodríguez", "email" => "elena_patricia@email.com", "phone" => "4423003030"],
                ["name" => "Carmen Beatriz Ramírez Cruz", "email" => "carmen_beatriz@email.com", "phone" => "4426060606"]
            ]),
            'type' => 3,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
