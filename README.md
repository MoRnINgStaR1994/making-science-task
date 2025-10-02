# Library Management System (Laravel)

ეს არის Library Management System, მცირე ვებ-აპლიკაცია ავტორებისა და წიგნების მართვისთვის. პროექტი იყენებს Laravel 12 და Eloquent ORM-ს. ამ სისტემით შეგიძლიათ CRUD ოპერაციები ავტორებისთვის და წიგნებისათვის, წიგნის მასზე რამდენიმე ავტორის ასოცირება, წიგნების ფილტრაცია სახელის ან ავტორის მიხედვით, და სტატუსების მართვა: available / borrowed.

ინსტალაცია და გაშვება:

1. პროექტის კლონირება: git clone https://github.com/MoRnINgStaR1994/making-science-task და cd making-science-task
2. Composer-ის პაკეტების დაყენება: composer install
3. .env ფაილის შექმნა: cp .env.example .env
4. კონფიგურაცია:
    - SQLite (დეფოლტი):    
    - DB_CONNECTION=sqlite, 
    - DB_DATABASE=/full/path/to/database/database.sqlite
    - ან MySQL: DB_CONNECTION=mysql,
    - DB_HOST=127.0.0.1,
    - DB_PORT=3306, 
    - DB_DATABASE=library, 
    - DB_USERNAME=root, 
    - DB_PASSWORD=your_password
5. აპლიკაციის გასაღების გენერაცია: php artisan key:generate
6. მიგრაციების გაშვება და სემპლ მონაცემების ჩასმა: php artisan migrate:fresh --seed
7. აპლიკაციის გაშვება: php artisan serve, გახსენით ბრაუზერი http://127.0.0.1:8000. ავტომატურად გადამისამართდებით Authors გვერდზე, /books → წიგნების მართვა.

მონაცემები: 5 ავტორი თითოეული 2–3 წიგნით. წიგნების სტატუსები: available / borrowed. ავტორების მაგალითები: J.K. Rowling, George R.R. Martin, J.R.R. Tolkien, Agatha Christie, Stephen King.
# making-science-task
