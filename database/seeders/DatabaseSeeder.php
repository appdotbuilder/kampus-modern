<?php

namespace Database\Seeders;

use App\Models\Faculty;
use App\Models\News;
use App\Models\Page;
use App\Models\StudyProgram;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@university.edu',
            'password' => bcrypt('password'),
        ]);

        // Create additional users for content creation
        $users = User::factory(3)->create();

        // Create faculties with study programs
        $faculties = collect([
            ['name' => 'Faculty of Engineering', 'code' => 'FT'],
            ['name' => 'Faculty of Computer Science', 'code' => 'FKOM'],
            ['name' => 'Faculty of Business Administration', 'code' => 'FBA'],
            ['name' => 'Faculty of Medicine', 'code' => 'FK'],
            ['name' => 'Faculty of Law', 'code' => 'FH'],
            ['name' => 'Faculty of Arts and Literature', 'code' => 'FSB'],
        ])->map(function ($facultyData) {
            return Faculty::create([
                'name' => $facultyData['name'],
                'code' => $facultyData['code'],
                'description' => fake()->paragraph(3),
                'dean' => 'Prof. Dr. ' . fake()->name(),
                'phone' => fake()->phoneNumber(),
                'email' => fake()->safeEmail(),
                'is_active' => true,
            ]);
        });

        // Create study programs for each faculty
        $faculties->each(function ($faculty) {
            $programsCount = random_int(2, 5);
            StudyProgram::factory($programsCount)->create([
                'faculty_id' => $faculty->id,
            ]);
        });

        // Create news articles
        News::factory(15)->create([
            'user_id' => $users->random()->id,
        ]);

        // Create some draft news
        News::factory(5)->draft()->create([
            'user_id' => $users->random()->id,
        ]);

        // Create static pages
        $pages = [
            [
                'title' => 'About Us',
                'slug' => 'about',
                'content' => '<h2>About Modern University</h2><p>Modern University was established in 1950 with a vision to provide world-class education and foster innovation in research and development. Over the decades, we have grown into one of the leading universities in the region, known for our academic excellence, cutting-edge research facilities, and commitment to producing graduates who make meaningful contributions to society.</p><h3>Our Mission</h3><p>To provide accessible, high-quality education that prepares students for successful careers and lifelong learning while advancing knowledge through innovative research and community engagement.</p><h3>Our Vision</h3><p>To be a globally recognized university that leads in education, research, and community service, creating positive impact on society and contributing to sustainable development.</p>',
            ],
            [
                'title' => 'History',
                'slug' => 'history',
                'content' => '<h2>Our History</h2><p>Modern University began its journey in 1950 as a small technical college with just 100 students and 15 faculty members. Founded by visionary educators who believed in the transformative power of education, the institution was established to meet the growing demand for skilled professionals in the post-war era.</p><h3>1950-1970: Foundation Years</h3><p>During these early years, the university focused on engineering and technical education, gradually expanding its programs and facilities.</p><h3>1970-1990: Growth and Expansion</h3><p>The university expanded significantly, adding new faculties including Business, Medicine, and Law. Student enrollment grew to over 5,000.</p><h3>1990-2010: Modernization</h3><p>This period marked significant infrastructure development and the introduction of modern teaching methods and research facilities.</p><h3>2010-Present: Global Recognition</h3><p>Today, Modern University is home to over 25,000 students and 1,500 faculty members, with international recognition for its academic programs and research contributions.</p>',
            ],
            [
                'title' => 'Admissions',
                'slug' => 'admissions',
                'content' => '<h2>Admissions Information</h2><p>Welcome to Modern University admissions! We are committed to selecting students who demonstrate academic potential, leadership qualities, and a passion for learning.</p><h3>Application Requirements</h3><ul><li>Completed application form</li><li>Official high school transcripts</li><li>Standardized test scores (SAT/ACT or equivalent)</li><li>Letters of recommendation</li><li>Personal statement</li><li>Portfolio (for specific programs)</li></ul><h3>Application Deadlines</h3><ul><li>Early Decision: November 15</li><li>Regular Decision: February 1</li><li>International Students: January 15</li></ul><h3>Tuition and Financial Aid</h3><p>We believe that financial constraints should not be a barrier to quality education. Our financial aid office works with students to provide scholarships, grants, and work-study opportunities.</p>',
            ],
            [
                'title' => 'Contact Us',
                'slug' => 'contact',
                'content' => '<h2>Contact Information</h2><p>We welcome inquiries from prospective students, parents, researchers, and community partners. Please don\'t hesitate to reach out to us.</p><h3>Main Campus</h3><p>Modern University<br>123 University Avenue<br>Academic City, AC 12345</p><h3>Phone Numbers</h3><ul><li>Main Office: +1 (555) 123-4567</li><li>Admissions: +1 (555) 123-4568</li><li>Student Services: +1 (555) 123-4569</li><li>International Office: +1 (555) 123-4570</li></ul><h3>Email Addresses</h3><ul><li>General Inquiries: info@university.edu</li><li>Admissions: admissions@university.edu</li><li>Student Support: support@university.edu</li><li>Media Inquiries: media@university.edu</li></ul><h3>Office Hours</h3><p>Monday - Friday: 8:00 AM - 5:00 PM<br>Saturday: 9:00 AM - 1:00 PM<br>Sunday: Closed</p>',
            ],
        ];

        foreach ($pages as $pageData) {
            Page::create($pageData);
        }
    }
}