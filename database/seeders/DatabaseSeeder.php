<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Article;
use App\Models\Video;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create test users
        User::firstOrCreate(
            ['email' => 'admin@membership.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password'),
                'membership_type' => 'C',
                'email_verified_at' => now(),
            ]
        );

        User::firstOrCreate(
            ['email' => 'john@example.com'],
            [
                'name' => 'John Doe',
                'password' => Hash::make('password'),
                'membership_type' => 'A',
                'email_verified_at' => now(),
            ]
        );

        User::firstOrCreate(
            ['email' => 'jane@example.com'],
            [
                'name' => 'Jane Smith',
                'password' => Hash::make('password'),
                'membership_type' => 'B',
                'email_verified_at' => now(),
            ]
        );

        // Create dummy articles
        $articles = [
            [
                'title' => 'Memahami Konsep Dasar Pemrograman',
                'content' => 'Pemrograman adalah seni dan ilmu dalam membuat instruksi yang dapat dipahami oleh komputer. Dalam artikel ini, kita akan membahas konsep-konsep dasar yang perlu dipahami oleh setiap programmer pemula.

Konsep pertama yang harus dipahami adalah variabel. Variabel adalah wadah untuk menyimpan data yang dapat berubah selama program berjalan. Misalnya, jika kita membuat program kalkulator, kita memerlukan variabel untuk menyimpan angka-angka yang akan dihitung.

Konsep kedua adalah fungsi atau function. Fungsi adalah blok kode yang dapat dipanggil berulang kali untuk melakukan tugas tertentu. Dengan menggunakan fungsi, kita dapat membuat kode yang lebih terorganisir dan mudah dipelihara.

Konsep ketiga adalah struktur kontrol, seperti if-else dan loop. Struktur kontrol memungkinkan program untuk membuat keputusan dan mengulang tindakan tertentu berdasarkan kondisi yang ditentukan.

Dengan memahami konsep-konsep dasar ini, Anda akan memiliki fondasi yang kuat untuk mempelajari bahasa pemrograman apa pun.',
                'excerpt' => 'Pelajari konsep-konsep fundamental dalam pemrograman yang harus dipahami oleh setiap developer pemula.',
                'author' => 'Ahmad Programmer',
                'published_at' => now()->subDays(1),
                'is_active' => true,
            ],
            [
                'title' => 'Tutorial Laravel untuk Pemula',
                'content' => 'Laravel adalah framework PHP yang sangat populer untuk pengembangan aplikasi web. Framework ini menyediakan banyak fitur yang memudahkan developer dalam membangun aplikasi yang kompleks.

Kelebihan utama Laravel adalah sintaksnya yang elegan dan ekspresif. Developer dapat menulis kode yang mudah dibaca dan dipahami. Selain itu, Laravel juga menyediakan ORM (Object-Relational Mapping) yang disebut Eloquent, yang memudahkan interaksi dengan database.

Untuk memulai dengan Laravel, Anda perlu menginstal Composer terlebih dahulu. Composer adalah dependency manager untuk PHP yang digunakan untuk mengelola library dan package.

Setelah menginstal Composer, Anda dapat membuat project Laravel baru dengan menjalankan perintah: composer create-project laravel/laravel nama-project

Laravel juga menyediakan sistem routing yang sederhana namun powerful. Anda dapat mendefinisikan route di file routes/web.php untuk menentukan bagaimana aplikasi merespons permintaan HTTP.

Dengan mempelajari Laravel, Anda akan dapat membangun aplikasi web yang modern dan scalable.',
                'excerpt' => 'Panduan lengkap untuk memulai belajar Laravel framework PHP yang populer dan powerful.',
                'author' => 'Sarah Developer',
                'published_at' => now()->subDays(3),
                'is_active' => true,
            ],
            [
                'title' => 'Best Practices dalam Web Development',
                'content' => 'Dalam pengembangan web, mengikuti best practices adalah hal yang sangat penting untuk memastikan kode yang dibuat berkualitas tinggi, mudah dipelihara, dan dapat diskalakan.

Pertama, selalu gunakan version control system seperti Git. Version control memungkinkan Anda untuk melacak perubahan kode, berkolaborasi dengan tim, dan kembali ke versi sebelumnya jika terjadi masalah.

Kedua, tulis kode yang bersih dan mudah dibaca. Gunakan nama variabel dan fungsi yang deskriptif, tambahkan komentar yang diperlukan, dan ikuti konvensi penamaan yang konsisten.

Ketiga, implementasikan automated testing. Unit test, integration test, dan end-to-end test akan membantu memastikan bahwa aplikasi berfungsi sesuai yang diharapkan dan mencegah regression bug.

Keempat, optimasi performa aplikasi. Gunakan caching, optimasi database query, dan compress asset untuk meningkatkan kecepatan loading aplikasi.

Kelima, implementasikan security best practices. Validasi input user, gunakan HTTPS, implementasikan authentication dan authorization yang proper.

Dengan mengikuti best practices ini, Anda akan dapat membangun aplikasi web yang professional dan berkualitas tinggi.',
                'excerpt' => 'Pelajari praktik terbaik dalam pengembangan web yang harus diterapkan oleh setiap developer professional.',
                'author' => 'Michael Expert',
                'published_at' => now()->subDays(5),
                'is_active' => true,
            ],
            [
                'title' => 'Mengoptimalkan Performa Database',
                'content' => 'Performa database adalah salah satu faktor kunci dalam kesuksesan aplikasi web. Database yang lambat dapat menyebabkan pengalaman pengguna yang buruk dan bahkan kehilangan pengguna.

Indexing adalah teknik pertama yang harus dipahami. Index adalah struktur data yang meningkatkan kecepatan pencarian data dalam tabel. Namun, terlalu banyak index juga dapat memperlambat operasi insert dan update.

Query optimization adalah teknik kedua yang penting. Hindari menggunakan SELECT * jika tidak diperlukan, gunakan WHERE clause yang efisien, dan manfaatkan JOIN yang tepat.

Caching adalah strategi ketiga yang sangat efektif. Anda dapat menggunakan caching di berbagai level: query caching, object caching, dan page caching.

Database normalization membantu mengurangi redundansi data dan meningkatkan konsistensi. Namun, dalam beberapa kasus, denormalization dapat meningkatkan performa read operation.

Connection pooling dan load balancing juga dapat membantu menangani beban yang tinggi. Dengan mendistribusikan beban ke beberapa server database, aplikasi dapat menangani lebih banyak pengguna secara bersamaan.',
                'excerpt' => 'Teknik-teknik untuk mengoptimalkan performa database dan meningkatkan kecepatan aplikasi.',
                'author' => 'Database Admin',
                'published_at' => now()->subDays(7),
                'is_active' => true,
            ],
            [
                'title' => 'Frontend Framework: React vs Vue vs Angular',
                'content' => 'Dalam dunia frontend development, terdapat tiga framework utama yang sangat populer: React, Vue, dan Angular. Masing-masing memiliki kelebihan dan kekurangan tersendiri.

React, dikembangkan oleh Facebook, menggunakan konsep Virtual DOM dan Component-based architecture. React memiliki learning curve yang moderate dan ecosystem yang sangat besar. JSX syntax memungkinkan developer untuk menulis HTML di dalam JavaScript.

Vue.js adalah framework yang dikembangkan oleh Evan You. Vue dikenal karena kemudahan penggunaannya dan dokumentasi yang sangat baik. Template syntax Vue mirip dengan HTML tradisional, membuatnya mudah dipelajari bagi developer yang sudah familiar dengan HTML dan CSS.

Angular, dikembangkan oleh Google, adalah framework yang full-featured dengan TypeScript sebagai bahasa utamanya. Angular menyediakan banyak fitur out-of-the-box seperti routing, HTTP client, dan form handling.

Untuk memilih framework yang tepat, pertimbangkan faktor-faktor seperti ukuran tim, kompleksitas project, deadline, dan expertise tim. React cocok untuk project yang membutuhkan fleksibilitas tinggi, Vue cocok untuk project yang ingin cepat development, dan Angular cocok untuk enterprise application yang kompleks.',
                'excerpt' => 'Perbandingan mendalam antara tiga framework frontend populer: React, Vue, dan Angular.',
                'author' => 'Frontend Specialist',
                'published_at' => now()->subDays(10),
                'is_active' => true,
            ],
            [
                'title' => 'Keamanan Web: Mencegah Serangan Cyber',
                'content' => 'Keamanan web adalah aspek yang sangat penting dalam pengembangan aplikasi. Dengan meningkatnya serangan cyber, developer harus memahami berbagai jenis ancaman dan cara pencegahannya.

SQL Injection adalah serangan yang memanfaatkan kelemahan dalam query database. Pencegahannya adalah dengan menggunakan prepared statements dan validasi input yang ketat.

Cross-Site Scripting (XSS) adalah serangan yang menyuntikkan script berbahaya ke dalam halaman web. Pencegahannya adalah dengan melakukan sanitasi output dan menggunakan Content Security Policy.

Cross-Site Request Forgery (CSRF) adalah serangan yang memaksa pengguna untuk melakukan aksi yang tidak diinginkan. Pencegahannya adalah dengan menggunakan CSRF token dan validasi referrer.

Authentication dan Authorization harus diimplementasikan dengan benar. Gunakan hashing algorithm yang kuat untuk password, implementasikan rate limiting untuk mencegah brute force attack, dan gunakan multi-factor authentication jika memungkinkan.

HTTPS harus digunakan untuk semua komunikasi antara client dan server. SSL/TLS certificate memastikan bahwa data yang dikirim terenkripsi dan tidak dapat dibaca oleh pihak ketiga.

Regular security audit dan penetration testing juga penting untuk mengidentifikasi kelemahan sebelum dimanfaatkan oleh attacker.',
                'excerpt' => 'Panduan komprehensif untuk mengamankan aplikasi web dari berbagai jenis serangan cyber.',
                'author' => 'Security Expert',
                'published_at' => now()->subDays(12),
                'is_active' => true,
            ],
            [
                'title' => 'Microservices Architecture: Panduan Implementasi',
                'content' => 'Microservices architecture adalah pendekatan dalam membangun aplikasi sebagai kumpulan layanan kecil yang independen. Setiap service bertanggung jawab untuk satu business function dan dapat dikembangkan, deployed, dan diskalakan secara terpisah.

Kelebihan microservices termasuk scalability yang lebih baik, technology diversity, fault isolation, dan kemudahan deployment. Tim yang berbeda dapat bekerja pada service yang berbeda tanpa saling mengganggu.

Namun, microservices juga membawa kompleksitas tambahan. Network latency, data consistency, service discovery, dan monitoring menjadi challenge yang harus diatasi.

Untuk implementasi yang sukses, mulai dengan mengidentifikasi bounded context dalam domain bisnis. Setiap service harus memiliki database sendiri dan berkomunikasi melalui API yang well-defined.

Container technology seperti Docker sangat membantu dalam deployment microservices. Kubernetes dapat digunakan untuk orchestration dan management container dalam skala besar.

Monitoring dan logging menjadi sangat penting dalam microservices. Distributed tracing membantu dalam troubleshooting issue yang melibatkan multiple services.

API Gateway dapat digunakan sebagai single entry point untuk semua client request, menyediakan fitur seperti authentication, rate limiting, dan load balancing.',
                'excerpt' => 'Panduan lengkap untuk memahami dan mengimplementasikan microservices architecture.',
                'author' => 'Solution Architect',
                'published_at' => now()->subDays(15),
                'is_active' => true,
            ],
            [
                'title' => 'DevOps: Menjembatani Development dan Operations',
                'content' => 'DevOps adalah budaya dan praktik yang menggabungkan software development (Dev) dan IT operations (Ops). Tujuannya adalah untuk mempersingkat development lifecycle dan menyediakan continuous delivery dengan kualitas tinggi.

CI/CD (Continuous Integration/Continuous Deployment) adalah inti dari DevOps. Continuous Integration memastikan bahwa perubahan kode diintegrasikan secara otomatis dan ditest. Continuous Deployment memastikan bahwa aplikasi dapat di-deploy secara otomatis ke production.

Infrastructure as Code (IaC) memungkinkan infrastructure didefinisikan dan dikelola melalui kode. Tools seperti Terraform dan CloudFormation membantu dalam provisioning dan management infrastructure.

Monitoring dan alerting adalah komponen penting dalam DevOps. Aplikasi harus dimonitor secara real-time untuk mendeteksi issue sebelum mempengaruhi pengguna. Metrics, logs, dan traces memberikan visibility yang diperlukan.

Automation adalah kunci dalam DevOps. Tugas-tugas repetitif seperti testing, deployment, dan infrastructure provisioning harus diotomatisasi untuk mengurangi human error dan meningkatkan efisiensi.

Kultur collaboration antara development dan operations team sangat penting. Shared responsibility dan komunikasi yang baik memastikan bahwa aplikasi dapat dikembangkan dan dioperasikan dengan smooth.',
                'excerpt' => 'Memahami konsep DevOps dan cara mengimplementasikan praktik-praktik terbaik dalam software development.',
                'author' => 'DevOps Engineer',
                'published_at' => now()->subDays(18),
                'is_active' => true,
            ],
            [
                'title' => 'Cloud Computing: AWS vs Azure vs Google Cloud',
                'content' => 'Cloud computing telah merevolusi cara kita membangun dan men-deploy aplikasi. Tiga provider utama adalah Amazon Web Services (AWS), Microsoft Azure, dan Google Cloud Platform (GCP).

AWS adalah pioneer dalam cloud computing dan memiliki market share terbesar. AWS menyediakan layanan yang sangat lengkap, dari computing, storage, database, hingga machine learning dan IoT.

Microsoft Azure memiliki integrasi yang sangat baik dengan ecosystem Microsoft. Jika organisasi sudah menggunakan Windows Server, Office 365, atau .NET, Azure menjadi pilihan yang natural.

Google Cloud Platform unggul dalam data analytics dan machine learning. Google BigQuery dan TensorFlow adalah contoh layanan yang sangat powerful untuk data processing dan AI.

Faktor-faktor yang perlu dipertimbangkan dalam memilih cloud provider termasuk: pricing model, geographic availability, compliance requirements, existing technology stack, dan expertise tim.

Multi-cloud strategy juga menjadi tren yang berkembang. Organisasi menggunakan multiple cloud provider untuk menghindari vendor lock-in dan memanfaatkan best-of-breed services.

Cloud security adalah aspek yang sangat penting. Shared responsibility model berarti bahwa security adalah tanggung jawab bersama antara cloud provider dan customer.',
                'excerpt' => 'Perbandingan komprehensif antara tiga cloud provider utama dan panduan memilih yang tepat.',
                'author' => 'Cloud Architect',
                'published_at' => now()->subDays(20),
                'is_active' => true,
            ],
            [
                'title' => 'Machine Learning untuk Developer Web',
                'content' => 'Machine Learning (ML) tidak lagi hanya domain para data scientist. Web developer juga dapat memanfaatkan ML untuk meningkatkan functionality dan user experience aplikasi mereka.

TensorFlow.js memungkinkan developer untuk menjalankan ML model di browser. Ini membuka peluang untuk aplikasi seperti image recognition, natural language processing, dan real-time prediction tanpa perlu backend processing.

API-based ML services seperti Google Vision API, AWS Rekognition, dan Azure Cognitive Services memudahkan developer untuk mengintegrasikan AI capabilities tanpa perlu memahami ML secara mendalam.

Recommendation system adalah salah satu aplikasi ML yang paling umum dalam web development. Dengan menganalisis user behavior, aplikasi dapat memberikan personalized content dan product recommendations.

Chatbot dan virtual assistant menggunakan Natural Language Processing (NLP) untuk memahami dan merespons user input. Platform seperti Dialogflow dan Microsoft Bot Framework memudahkan development chatbot.

Fraud detection dan anomaly detection dapat diimplementasikan untuk meningkatkan security aplikasi. ML model dapat mendeteksi pattern yang mencurigakan dalam real-time.

A/B testing dapat ditingkatkan dengan ML untuk automatically optimize conversion rate dan user engagement. Multi-armed bandit algorithms dapat digunakan untuk dynamic optimization.',
                'excerpt' => 'Cara mengintegrasikan Machine Learning dalam aplikasi web untuk meningkatkan functionality dan UX.',
                'author' => 'ML Engineer',
                'published_at' => now()->subDays(22),
                'is_active' => true,
            ],
            [
                'title' => 'Mengenal Tailwind CSS: Utility-First CSS Framework',
                'content' => 'Tailwind CSS adalah framework CSS yang mengusung konsep utility-first. Berbeda dengan framework tradisional seperti Bootstrap yang menyediakan komponen siap pakai, Tailwind menyediakan class-class utilitas low-level.

Dengan Tailwind, Anda tidak perlu meninggalkan file HTML untuk men-style elemen. Anda cukup menambahkan class seperti flex, pt-4, text-center, dan rotate-90 langsung ke element.

Pendekatan ini memiliki beberapa keuntungan. Pertama, ukuran file CSS yang dihasilkan sangat kecil karena Tailwind akan menghapus class yang tidak digunakan (tree-shaking) saat proses build.

Kedua, styling menjadi lebih konsisten karena Anda menggunakan nilai-nilai yang sudah didefinisikan dalam config file. Tidak ada lagi "magic number" atau nilai pixel yang sembarangan.

Ketiga, Anda tidak perlu pusing memikirkan nama class. Salah satu hal tersulit dalam CSS adalah memberi nama class (naming convention), dan Tailwind menghilangkan masalah ini.

Meskipun terlihat berantakan di awal karena banyaknya class di HTML, penggunaan Tailwind dapat mempercepat development secara signifikan setelah Anda terbiasa.',
                'excerpt' => 'Pelajari konsep utility-first CSS framework yang sedang naik daun ini untuk styling yang lebih cepat.',
                'author' => 'Frontend Master',
                'published_at' => now()->subDays(25),
                'is_active' => true,
            ],
            [
                'title' => 'Pengenalan GraphQL: Alternatif REST API',
                'content' => 'GraphQL adalah query language untuk API dan runtime untuk memenuhi query tersebut dengan data yang ada. GraphQL memberikan alternatif yang efisien untuk REST API.

Kelebihan utama GraphQL adalah client dapat meminta data spesifik yang mereka butuhkan, tidak lebih dan tidak kurang. Ini memecahkan masalah over-fetching dan under-fetching yang umum terjadi pada REST API.

Dengan GraphQL, Anda memiliki satu endpoint tunggal, bukan banyak endpoint untuk resource yang berbeda seperti pada REST. Client mengirim query yang mendeskripsikan struktur data yang diinginkan.

GraphQL menggunakan strong typing system. Schema didefinisikan dengan jelas, sehingga client dan server memiliki kontrak yang pasti tentang bentuk data.

Tools dan ecosystem GraphQL juga sangat berkembang. GraphiQL atau Apollo Sandbox memudahkan developer untuk mengetes query dan melihat dokumentasi schema secara langsung.

Banyak perusahaan besar seperti GitHub, Shopify, dan Facebook (pembuatnya) telah beralih menggunakan GraphQL untuk API publik mereka.',
                'excerpt' => 'Mengapa GraphQL menjadi populer dan kapan Anda sebaiknya menggunakannya dibanding REST API.',
                'author' => 'API Architect',
                'published_at' => now()->subDays(28),
                'is_active' => true,
            ],
            [
                'title' => 'Cara Menggunakan GitHub Copilot untuk Productivity',
                'content' => 'GitHub Copilot adalah asisten coding berbasis AI yang dapat membantu Anda menulis kode lebih cepat. Copilot menggunakan OpenAI Codex untuk menyarankan kode dan fungsi secara real-time.

Copilot dapat memahami konteks kode Anda, termasuk variabel, fungsi, dan komentar. Anda cukup menulis komentar tentang apa yang ingin Anda lakukan, dan Copilot akan mencoba mengimplementasikannya.

Fitur ini sangat berguna untuk tugas-tugas repetitif, menulis boiler-plate code, atau bahkan mempelajari library baru. Copilot juga dapat membantu menulis unit test.

Namun, penting untuk diingat bahwa Copilot tidak sempurna. Kode yang dihasilkan harus selalu direview dan diuji. Copilot adalah asisten, bukan pengganti programmer.

Tips menggunakan Copilot: Gunakan nama variabel dan fungsi yang deskriptif. Tulis komentar yang jelas. Buka file-file terkait agar Copilot mendapatkan konteks yang lebih baik.

Selain Copilot, ada juga tools AI lain seperti ChatGPT dan Claude yang dapat membantu dalam proses development, mulai dari brainstorming hingga debugging.',
                'excerpt' => 'Maksimalkan produktivitas coding Anda dengan bantuan asisten AI seperti GitHub Copilot.',
                'author' => 'AI Enthusiast',
                'published_at' => now()->subDays(30),
                'is_active' => true,
            ],
            [
                'title' => 'Clean Code: Seni Menulis Kode yang Mudah Dibaca',
                'content' => 'Menulis kode yang "working" itu mudah, tapi menulis kode yang "clean" adalah tantangan tersendiri. Clean Code adalah tentang menulis kode yang mudah dipahami, dipelihara, dan dikembangkan oleh manusia.

Prinsip-prinsip Clean Code dipopulerkan oleh Robert C. Martin (Uncle Bob). Salah satu prinsip utamanya adalah "Meaningful Names". Gunakan nama yang jelas dan deskriptif untuk variabel, fungsi, dan class.

Fungsi haruslah kecil dan hanya melakukan satu hal (Single Responsibility Principle). Jika fungsi Anda terlalu panjang atau melakukan banyak hal, pecahlah menjadi fungsi-fungsi yang lebih kecil.

Hindari duplikasi kode (DRY - Don\'t Repeat Yourself). Jika Anda menyalin-tempel kode di beberapa tempat, itu adalah tanda bahwa Anda perlu membuat abstraksi atau fungsi baru.

Komentar sebaiknya digunakan seperlunya. Kode yang bersih seharusnya sudah cukup ekspresif tanpa perlu banyak komentar. Gunakan komentar untuk menjelaskan "mengapa", bukan "apa".

Penanganan error yang baik juga merupakan bagian dari Clean Code. Jangan biarkan exception tidak tertangani atau ditelan begitu saja.',
                'excerpt' => 'Pentingnya menulis kode yang bersih dan mudah dipelihara untuk keberlanjutan proyek software.',
                'author' => 'Senior Engineer',
                'published_at' => now()->subDays(32),
                'is_active' => true,
            ],
            [
                'title' => 'Manajemen State pada React dengan Redux',
                'content' => 'State management adalah salah satu aspek paling menantang dalam pengembangan aplikasi frontend yang kompleks. Redux adalah library populer untuk mengelola state aplikasi JavaScript.

Redux bekerja dengan prinsip "Single Source of Truth". Seluruh state aplikasi disimpan dalam satu object store. Ini memudahkan debugging dan pelacakan perubahan data.

Konsep utama Redux adalah: Store (tempat menyimpan state), Action (objek yang mendeskripsikan apa yang terjadi), dan Reducer (fungsi yang menentukan bagaimana state berubah berdasarkan action).

Perubahan state di Redux bersifat pure function dan immutable. Kita tidak mengubah state secara langsung, melainkan membuat copy state baru dengan perubahan yang diinginkan.

Meskipun Redux sangat powerful, ia juga dikenal memiliki banyak boilerplate code. Redux Toolkit hadir untuk menyederhanakan penggunaan Redux dengan syntax yang lebih ringkas.

Alternatif state management lain seperti Context API, Zustand, atau Recoil juga layak dipertimbangkan tergantung kompleksitas aplikasi Anda.',
                'excerpt' => 'Mendalami konsep state management global di aplikasi React menggunakan Redux.',
                'author' => 'React Developer',
                'published_at' => now()->subDays(35),
                'is_active' => true,
            ],
        ];

        foreach ($articles as $articleData) {
            Article::create($articleData);
        }

        // Create dummy videos
        $videos = [
            [
                'title' => 'Tutorial JavaScript ES6+ untuk Pemula',
                'description' => 'Pelajari fitur-fitur terbaru JavaScript ES6+ termasuk arrow functions, destructuring, template literals, dan async/await. Video ini cocok untuk pemula yang ingin memahami JavaScript modern.',
                'url' => 'https://www.youtube.com/embed/NCwa_xi0Uuc',
                'duration' => '45:32',
                'author' => 'JavaScript Guru',
                'published_at' => now()->subDays(2),
                'is_active' => true,
            ],
            [
                'title' => 'Membangun REST API dengan Laravel',
                'description' => 'Tutorial lengkap membangun REST API menggunakan Laravel. Mulai dari setup project, membuat model dan migration, hingga implementasi authentication dengan Sanctum.',
                'url' => 'https://www.youtube.com/embed/MT-GJQIY3EU',
                'duration' => '1:12:45',
                'author' => 'Laravel Master',
                'published_at' => now()->subDays(4),
                'is_active' => true,
            ],
            [
                'title' => 'CSS Grid dan Flexbox: Layout Modern',
                'description' => 'Pelajari cara menggunakan CSS Grid dan Flexbox untuk membuat layout yang responsive dan modern. Tutorial ini mencakup praktik terbaik dan contoh-contoh real-world.',
                'url' => 'https://www.youtube.com/embed/jV8B24rSN5o',
                'duration' => '38:15',
                'author' => 'CSS Expert',
                'published_at' => now()->subDays(6),
                'is_active' => true,
            ],
            [
                'title' => 'Database Design: Normalisasi dan Optimasi',
                'description' => 'Panduan komprehensif untuk mendesain database yang efisien. Mulai dari konsep normalisasi, indexing, hingga teknik optimasi query untuk performa maksimal.',
                'url' => 'https://www.youtube.com/embed/UrYLYV7WSHM',
                'duration' => '52:30',
                'author' => 'Database Pro',
                'published_at' => now()->subDays(8),
                'is_active' => true,
            ],
            [
                'title' => 'React Hooks: useState, useEffect, dan Custom Hooks',
                'description' => 'Tutorial mendalam tentang React Hooks. Pelajari cara menggunakan useState dan useEffect, serta cara membuat custom hooks untuk reusable logic.',
                'url' => 'https://www.youtube.com/embed/O6P86uwfdR0',
                'duration' => '41:22',
                'author' => 'React Developer',
                'published_at' => now()->subDays(10),
                'is_active' => true,
            ],
            [
                'title' => 'Git dan GitHub: Version Control untuk Developer',
                'description' => 'Pelajari Git dari dasar hingga advanced. Mulai dari basic commands, branching, merging, hingga collaboration workflow menggunakan GitHub.',
                'url' => 'https://www.youtube.com/embed/RGOj5yH7evk',
                'duration' => '1:05:18',
                'author' => 'Git Master',
                'published_at' => now()->subDays(12),
                'is_active' => true,
            ],
            [
                'title' => 'Docker untuk Developer: Containerization Made Easy',
                'description' => 'Tutorial Docker untuk developer web. Pelajari cara menggunakan Docker untuk development environment, production deployment, dan Docker Compose untuk multi-container apps.',
                'url' => 'https://www.youtube.com/embed/fqMOX6JJhGo',
                'duration' => '48:45',
                'author' => 'DevOps Specialist',
                'published_at' => now()->subDays(14),
                'is_active' => true,
            ],
            [
                'title' => 'Web Security: Protecting Your Applications',
                'description' => 'Panduan keamanan web yang essential. Pelajari cara mencegah SQL injection, XSS, CSRF, dan implementasi authentication yang aman.',
                'url' => 'https://www.youtube.com/embed/VQb1qfQj5wA',
                'duration' => '55:12',
                'author' => 'Security Expert',
                'published_at' => now()->subDays(16),
                'is_active' => true,
            ],
            [
                'title' => 'Vue.js 3: Composition API dan Reactive Programming',
                'description' => 'Eksplorasi fitur-fitur terbaru Vue.js 3. Pelajari Composition API, reactive system yang baru, dan cara membangun aplikasi yang scalable.',
                'url' => 'https://www.youtube.com/embed/Vp37f_KiLtI',
                'duration' => '43:28',
                'author' => 'Vue Expert',
                'published_at' => now()->subDays(18),
                'is_active' => true,
            ],
            [
                'title' => 'Progressive Web Apps (PWA): Web yang Seperti Native App',
                'description' => 'Tutorial membangun Progressive Web App. Pelajari service workers, web app manifest, push notifications, dan offline functionality.',
                'url' => 'https://www.youtube.com/embed/aqvz5Oqs238',
                'duration' => '1:18:33',
                'author' => 'PWA Developer',
                'published_at' => now()->subDays(20),
                'is_active' => true,
            ],
            [
                'title' => 'TypeScript: JavaScript with Types',
                'description' => 'Pengenalan TypeScript untuk JavaScript developer. Pelajari type system, interfaces, generics, dan cara menggunakan TypeScript dalam project real.',
                'url' => 'https://www.youtube.com/embed/BwuLxPH8IDs',
                'duration' => '39:47',
                'author' => 'TypeScript Pro',
                'published_at' => now()->subDays(22),
                'is_active' => true,
            ],
            [
                'title' => 'Microservices dengan Node.js dan Express',
                'description' => 'Tutorial membangun microservices architecture menggunakan Node.js dan Express. Termasuk API Gateway, service discovery, dan inter-service communication.',
                'url' => 'https://www.youtube.com/embed/XUSHH0E-7zk',
                'duration' => '1:25:15',
                'author' => 'Node.js Expert',
                'published_at' => now()->subDays(24),
                'is_active' => true,
            ],
        ];

        foreach ($videos as $videoData) {
            Video::create($videoData);
        }
    }
}
