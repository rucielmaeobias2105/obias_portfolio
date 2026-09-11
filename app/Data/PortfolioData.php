<?php

namespace App\Data;

class PortfolioData
{
    public static function all(): array
    {
        return [
            'portfolio' => self::profile(),
            'experiences' => self::experiences(),
            'projects' => self::projects(),
            'project_categories' => collect(self::projects())->pluck('category')->unique()->values()->all(),
            'certificates' => self::certificates(),
            'tools' => self::tools(),
        ];
    }

    public static function profile(): array
    {
        return [
            'name' => 'Ruciel Mae Obias',
            'first_name' => 'Ruciel Mae',
            'last_name' => 'Obias',
            'signature_name' => 'Bachelor of Science in Computer Science',
            'headline' => 'Hi I\'am Ruciel Mae Obias',
            'tagline' => 'Turning ideas into thoughtful, functional digital experiences',
            'bio' => 'I am a passionate developer and designer who loves crafting clean, human-centered websites and applications. I blend logic with aesthetics to build products that feel as good as they look.',
            'bio_about' => 'I\'m a 4th-year Bachelor of Science in Computer Science student passionate about technology and problem-solving. I enjoy facing new challenges and continuously improving my skills through every opportunity that comes my way. I believe in learning from my mistakes, welcoming feedback, and collaborating with others as I grow into a well-rounded future professional.',
            'role' => '',
            'location' => 'Velasco, Tayum, Abra',
            'availability' => 'Available for freelance & full-time',
            'email' => 'rucielmaeobias277@gmail.com',
            'phone' => '09318467600',
            'website' => 'https://kentoblas.dev',
            'github' => 'https://github.com/rucielmaeobias2105',
            'telegram' => '09318467600',
            'facebook' => 'https://www.facebook.com/chiel.obias.7',
            'discord' => '1448606341164699709',
            'avatar' => asset('images/portfolio/avatar.jpg'),
            'portrait' => asset('profile/pic.jpg'),
            'stats' => [
                ['value' => '5+', 'label' => 'Years of Experience'],
                ['value' => '30+', 'label' => 'Projects Delivered'],
                ['value' => '20+', 'label' => 'Certifications'],
            ],
            'files' => [
                'resume' => asset('files/Ruciel.pdf'),
                'pds' => asset('files/RUCIEL_PDS.pdf'),
            ],
            'education' => [
                ['school' => 'Data Center College of the Philippines Inc. - Bangued Abra', 'years' => '2023 – Present', 'degree' => 'BS Computer Science', 'note' => '4th Year - Currently Enrolled'],
                ['school' => 'An-anaao Integrated School', 'years' => '2017 – 2023', 'degree' => 'Senior High School – TVL-ICT CSS NCII', 'note' => 'With High Honors • Batch Salutatorian '],
            ],
        ];
    }

    public static function experiences(): array
    {
        return [
            ['role' => 'Commission on Elections', 'company' => 'Intern', 'dates' => 'July 23, 2026 – Present', 'desc' => "Assists in the preparation, organization, and encoding of election-related documents and records.\nSupports staff in facilitating voter registration processes and maintaining accurate data records.\nDevelops attention to detail, professionalism, and organizational skills through hands-on government office experience."],
            ['role' => 'Instructor / Trainer', 'company' => 'OCTA Information Technology Services', 'dates' => 'December 2025 - Present', 'desc' => "Conduct training sessions about basic information technology concepts, computer hardware, software, and troubleshooting.\nAssist students in understanding lessons through hands-on activities and practical exercises."],
            ['role' => 'SK Kagawad', 'company' => 'Barangay Velasco', 'dates' => '2023 - Present', 'desc' => "Participates in planning and implementing youth programs, activities, and community projects.\nAssists in organizing events that promote youth involvement and community development.\nDevelops leadership, teamwork, communication, and organizational skills through public service."],
            ['role' => 'Special Program for Employment of Students (SPES)', 'company' => 'Municipal Civil Registry Office LGU - Tayum', 'dates' => 'May 2026', 'desc' => "Assisted in daily office tasks, document preparation, and file organization.\nHelped manage records and ensure proper handling of office documents.\nAssisted clients and responded to basic inquiries when needed."],
            ['role' => 'Work Immersion', 'company' => 'Municipal Civil Registry Office LGU - Tayum ', 'dates' => 'March 2023', 'desc' => "Assisted employees with daily office activities and assigned tasks.\nHelped in organizing files, preparing documents, and maintaining office records to digitalized documents.\nObserved proper workplace procedures and learned professional work practices."],
        ];
    }

    public static function projects(): array
    {
        return [
            ['title' => 'Boarding House System Management', 'category' => 'Web', 'desc' => 'Boarding House System Management with dashboard, tenant tracking, rooms, and reporting features.', 'tags' => ['VB.net', 'SQL Server'], 'images' => [
                asset('projects/BHSM/login.png'),
                asset('projects/BHSM/dashboard.png'),
                asset('projects/BHSM/rooms.png'),
                asset('projects/BHSM/tenants.png'),
                asset('projects/BHSM/t_print.png'),
                asset('projects/BHSM/v.png'),
                asset('projects/BHSM/df.png'),
                asset('projects/BHSM/vdcdf.png'),
                asset('projects/BHSM/fgfd.png'),
            ]],
            ['title' => 'Online Ordering & Reservation System for MCA Cafe', 'category' => 'Web', 'desc' => 'Cafe management system with ordering, menu management, and transaction tracking.', 'tags' => ['Laravel', 'MySQL'], 'images' => [
                asset('projects/MCA_cafe/Screenshot 2026-09-09 223300.png'),
                asset('projects/MCA_cafe/Screenshot 2026-09-09 223316.png'),
                asset('projects/MCA_cafe/Screenshot 2026-09-09 223331.png'),
                asset('projects/MCA_cafe/Screenshot 2026-09-09 223347.png'),
                asset('projects/MCA_cafe/Screenshot 2026-09-09 223358.png'),
                asset('projects/MCA_cafe/Screenshot 2026-09-09 223410.png'),
            ]],
            ['title' => 'Personal Portfolio Website', 'category' => 'Web', 'desc' => 'Responsive portfolio website built with modern web technologies. Features dark/light mode, smooth animations, and mobile-first design approach.', 'tags' => ['HTML', 'CSS', 'JavaScript'], 'images' => [
                asset('projects/portfolio/Screenshot 2026-09-09 223636.png'),
                asset('projects/portfolio/Screenshot 2026-09-09 223701.png'),
            ]],
            ['title' => 'ITCS Enrollment System', 'category' => 'Java', 'desc' => 'This Java program implements a comprehensive enrollment system for Information technology and Computer Science students. The system collects personal information and academic details, then displays the appropriate curriculum based on the selected course, year level, and semester. It calculates tuition fees, applies discounts based on academic performance, processes down payments, and generates a complete enrollment summary including the student\'s balance.', 'tags' => ['Java'], 'images' => [asset('projects/java_final.jpg')]],
            ['title' => 'Student Management System', 'category' => 'Python', 'desc' => 'This Python program is a simple Student Management System that allows users to manage student records using a dictionary. It provides options to add, view, edit, delete, and search for students based on their ID or name. The program continuously runs in a loop until the user chooses to exit, making it an interactive way to organize and update student information efficiently.', 'tags' => ['Python'], 'images' => [asset('projects/python.png')]],
            ['title' => 'Student Management System', 'category' => 'C#', 'desc' => 'This program is a Student Management System developed in Visual Studio. It is designed to help users efficiently manage student information such as names, courses, and year levels. The system allows for adding, viewing, editing, deleting, and searching student records, making it a useful tool for organizing student data in an academic environment.', 'tags' => ['C#'], 'images' => [asset('projects/csharp proj.png')]],
            ['title' => 'Student and Teacher Management System', 'category' => 'C++', 'desc' => 'This C++ program is a Student and Teacher Management System designed to handle basic record management in an academic setting. It allows users to add, view, edit, delete, and search information for both students and teachers using simple arrays and a menu-driven interface.', 'tags' => ['C++'], 'images' => [asset('projects/c++ proj.png')]],
            ['title' => 'Database Management System', 'category' => 'Databases', 'desc' => 'This MS Access program is a Database Management System designed to organize, store, and manage student and teacher information efficiently. It allows users to input, edit, delete, and search data using structured tables, queries, forms, and reports.', 'tags' => ['MS Access'], 'images' => [asset('projects/dbms proj.png')]],
['title' => 'Area Finder', 'category' => 'VB.NET', 'desc' => 'A simple desktop application for computing the area of rectangles and triangles. Users can input dimensions and instantly compute the area with a clean, interactive interface.', 'tags' => ['VB.NET'], 'images' => [asset('projects/area_finder.jpg')]],
            ['title' => 'Basic Registration System', 'category' => 'VB.NET', 'desc' => 'A record management form that allows users to save, update, delete, and search entries, with all data displayed in a live-updating table for easy viewing.', 'tags' => ['VB.NET', 'SQL Server'], 'images' => [asset('projects/basic_registration.jpg')]],
            ['title' => 'Prelim Grade Computation System', 'category' => 'C#', 'desc' => 'An academic grade calculator that computes quiz, recitation, assignment, and attendance ratings to automatically generate a student\'s prelim grade.', 'tags' => ['C#'], 'images' => [asset('projects/grade_computation.jpg')]],
            ['title' => 'School Enrollment System', 'category' => 'Java', 'desc' => 'A console-based enrollment program that collects personal and academic information, displays subjects per semester, and automatically computes tuition, discounts, and remaining balance based on down payment and average grade.', 'tags' => ['Java'], 'images' => [asset('projects/java proj.jpg')]],
            ['title' => 'Permanent Record Management System', 'category' => 'VB.NET', 'desc' => 'A comprehensive student information system for registering permanent records, capturing personal, academic, and family background details, with full search, update, and delete functionality tied to a live data table.', 'tags' => ['VB.NET', 'SQL Server'], 'images' => [asset('projects/permanent_rec.jpg')]],
            ['title' => 'Zodiac Sign Finder', 'category' => 'Python', 'desc' => 'A lightweight console program that determines a user\'s zodiac sign based on their input birth month and day.', 'tags' => ['Python'], 'images' => [asset('projects/zodiac sign.png')]],
        ];
    }

    public static function certificates(): array
    {
        return [
            ['title' => 'Understanding Startups & Getting Your Idea for the Phil. StartUp Challenge XI', 'org' => 'Department of Information and Communications Technology', 'year' => 'September 7, 2026', 'image' => 'cert_img/startup2.png', 'pdf' => null],
            ['title' => 'Startup Now Cordillera: Exploring Programs, Funding & Opportunities for Aspiring Startups', 'org' => 'Department of Science and Technology', 'year' => 'September 2, 2026', 'image' => 'cert_img/startup.png', 'pdf' => null],
            ['title' => 'Stay Alert, Stay Secure: Promoting Cyber Awareness & Online Scam Prevention', 'org' => 'Commission on Higher Education', 'year' => 'July 23, 2026', 'image' => 'cert_img/seedling.png', 'pdf' => null],
            ['title' => 'Online Safety Through Digital Netiquette', 'org' => 'Department of Information and Communications Technology', 'year' => 'July 23, 2026', 'image' => 'cert_img/online_safety.png', 'pdf' => null],
            ['title' => 'Data Analytics & Visualization Essentials', 'org' => 'Department of Information and Communications Technology', 'year' => 'December 11, 2025', 'image' => 'cert_img/data_analytics.png', 'pdf' => null],
            ['title' => 'Computer System Servicing NCII', 'org' => 'Technical Education and Skills Development Authority', 'year' => 'September 6, 2025', 'image' => 'cert_img/nc_2.png', 'pdf' => null],
            ['title' => 'Empowering the Next Gen: ICT Career Preparation Essentials Webinar', 'org' => 'Department of Information and Communications Technology', 'year' => 'June 26, 2025', 'image' => 'cert_img/ict_carrerprep.png', 'pdf' => null],
            
        ];
    }

    public static function tools(): array
    {
        $logo = fn (string $file): string => asset('LOGO/'.rawurlencode($file));

        return [
            // Programming & Scripting
            ['name' => 'C++', 'category' => 'Programming & Scripting', 'icon' => $logo('c++.png')],
            ['name' => 'C#', 'category' => 'Programming & Scripting', 'icon' => $logo('C#.jpg')],
            ['name' => 'Java', 'category' => 'Programming & Scripting', 'icon' => $logo('java.jpg')],
            ['name' => 'Python', 'category' => 'Programming & Scripting', 'icon' => $logo('PYTHON.webp')],
            ['name' => 'JavaScript', 'category' => 'Programming & Scripting', 'icon' => $logo('JAVASCRIPT.webp')],
            ['name' => 'CSS3', 'category' => 'Programming & Scripting', 'icon' => $logo('CSS.jpg')],
            ['name' => 'HTML5', 'category' => 'Programming & Scripting', 'icon' => $logo('HTML.png')],
            ['name' => 'Laravel', 'category' => 'Programming & Scripting', 'icon' => $logo('LARAVEL.png')],
            ['name' => 'VB.NET', 'category' => 'Programming & Scripting', 'icon' => $logo('VB.NET.png')],
            ['name' => 'PHP', 'category' => 'Programming & Scripting', 'icon' => $logo('PHP.jpg')],

            // Databases
            ['name' => 'MS Access', 'category' => 'Databases', 'icon' => $logo('ms_access.jpg')],
            ['name' => 'MySQL', 'category' => 'Databases', 'icon' => $logo('MYSQL.avif')],

            // Development Tools
            ['name' => 'Git', 'category' => 'Development Tools', 'icon' => $logo('git.png')],
            ['name' => 'Git Bash', 'category' => 'Development Tools', 'icon' => $logo('gitbash.png')],
            ['name' => 'GitHub', 'category' => 'Development Tools', 'icon' => $logo('github.jpg')],
            ['name' => 'OpenCode', 'category' => 'Development Tools', 'icon' => $logo('opencode.png')],
            ['name' => 'XAMPP', 'category' => 'Development Tools', 'icon' => $logo('xampp.svg')],

            // Design & Multimedia
            ['name' => 'Photoshop', 'category' => 'Design & Multimedia', 'icon' => $logo('PHOTOSHOP.webp')],
            ['name' => 'Canva', 'category' => 'Design & Multimedia', 'icon' => $logo('CANVA.webp')],
            ['name' => 'CapCut', 'category' => 'Design & Multimedia', 'icon' => $logo('CAPCUT.webp')],
            ['name' => 'Filmora', 'category' => 'Design & Multimedia', 'icon' => $logo('FILMORA.webp')],
        ];
    }
}
