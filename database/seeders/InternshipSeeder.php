<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Internship;

class InternshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $intern = [
            [
                'internship_division_id' => 1,
                'name' => 'Grow Up Webinar',
                'description' => 'Grow Up Webinar adalah program yang dibuat untuk para pemuda di seluruh Indonesia. Dalam program para peserta akan mendapatkan insight dari para narasumber yang berpengalaman dibidangnya. Lewat program ini gupmedia.id berharap generasi muda akan mendapatkan oportunity yang bermanfaat bagi pengembangan karir, personal life, dll agar kelak mampu menjadi #GrowUpMaksimal.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'internship_division_id' => 1,
                'name' => 'Grow Up Kepojurusan',
                'description' => 'Grow Up Kepo Jurusan adalah program yang dibuat untuk teman teman tingkat SMA di seluruh Indonesia. Dalam program para peserta akan mendapatkan insight dari para narasumber yang sedang berkuliah di universitas yang ada di Indonesia. Lewat program ini gupmedia.id berharap Para siswa SMA akan mendapatkaninsight yang bermanfaat dan akan mendapatkan pengetahuan mengenai jurusan kuliah impian mereka. ',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'internship_division_id' => 2,
                'name' => 'Public Relation & Partnership',
                'description' => 'divisi PR & Partnership merupakan divisi yang bertugas sebagai penghubung antara gup media dengan pihak eksternal(luar). divisi ini sangatlah penting karena kedepannya gup media membutuhkan partner baik itu untuk keperluan publikasi event yang diadakan gup, keperluan narasumber, dll. jobdesc lain dari divisi ini juga sebagai admin dari sleuruh media sosial yang ada di gup media.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'internship_division_id' => 2,
                'name' => 'Content',
                'description' => 'divisi content bertanggung jawab untuk membuat seluruh content yang nantinya akan di upload ke sosial media dari gup media. divisi berisi beberapa cakupan seperti reels talent, tiktok talent, youth content(yang merancang konten yang akan di upload di feeds instagram), dan tim podcast.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'internship_division_id' => 3,
                'name' => 'Graphic Designer',
                'description' => 'graphic designer merupakan divisi yang bertanggung jawab untuk mendesain seluruh konten yang akan di upload ke media sosial dari gup media mulai dari instagram feeds, instagram story, dan linkedin.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'internship_division_id' => 3,
                'name' => 'Video Editor',
                'description' => 'vidio editor merupakan divisi yang bertanggung jawab untuk membuat seluruh vidio(take vidio, vidio editing, vidio animasi, dll) yang akan di upload ke media sosial dari gup media mulai dari instagram feeds, instagram story, instagram reels, tiktok, dll.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'internship_division_id' => 4,
                'name' => 'Talent Management',
                'description' => 'talent management merupakan divisi yang bertanggung jawab kepada seluruh talent/SDM yang ada di gup media mulai dari officer(intern), volunteer, dan ambassador. program kerja yang biasa tim talent management lakukan adalah internal workshop/upgrading, internal bonding, KPI (Key performance indicator), dll. bisa dibilang juga talent management lah yang bertanggung jawab terhadap keharmonisan internal dari platform gup media tetap terjaga.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'internship_division_id' => 4,
                'name' => 'Talent Acquisition',
                'description' => 'vidio editor merupakan divisi yang bertanggung jawab untuk membuat seluruh vidio(take vidio, vidio editing, vidio animasi, dll) yang akan di upload ke media sosial dari gup media mulai dari instagram feeds, instagram story, instagram reels, tiktok, dll.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'internship_division_id' => 5,
                'name' => 'Business Development',
                'description' => 'business development merupakan divisi yang bertanggung jawab untuk perencanaan “bisnis” dari platform gup media.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'internship_division_id' => 5,
                'name' => 'Talent Acquisition',
                'description' => 'divisi sponsorship bertanggung jawab kepada seluruh pendanaan dari pihak luar (sponsor) yang masuk ke internal dari GUP Media. peran dari divisi ini sangatlah penting karena divisi ini bisa dibilang adalah support utama ketika gup media akan mengadakan suatu event baik itu webinar atau online class.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Internship::insert($intern);
    }
}
