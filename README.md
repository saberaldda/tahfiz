<a href="https://github.com/saberaldda/tahfiz"> <h1 align="center">Tahfiz</h1></a>

## About

برنامج لإدارة أنشطة حلقات التحفيظ, يهدف البرنامج لوضع أنشطة يومية  للطلاب ومتابعتها مع وجود تقييم لأداء الطالب لهذه الأنشطة, يقوم المحفظ بادخال بيانات إنجاز النشاط لكل طالب من خلال لوحة التحكم(اضافة تقييم, تعديل تقييم, اضافة طالب), ويضم البرنامج صفحة لعرض سجل أداء النشاطات لكل طالب, والصفحة الرئيسية لعرض الطلاب المتفوقين.

<a name="installation"></a>
## Installation

> **Warning**
> Make sure to follow the requirements first.

Here is how you can run the project locally:
1. Clone this repo
    ```sh
    git clone https://github.com/saberaldda/tahfiz
    ```

1. Go into the project root directory
    ```sh
    cd tahfiz
    ```

1. Copy .env.example file to .env file
    ```sh
    cp .env.example .env
    ```
1. Create database `tahfiz` (you can change database name)

1. Go to `.env` file 
    - set database credentials 
        ```sh 
        DB_DATABASE=tahfiz
        DB_USERNAME=root
        DB_PASSWORD=[YOUR PASSWORD]
        ```
    > Make sure to follow your database username and password

1. Install PHP dependencies 
    ```sh
    composer update
    ```
1. Generate key 
    ```sh
    php artisan key:generate
    ```

1. Run migrations & seeders
    ```
    php artisan migrate:fresh --seed
    ```

1. Link the storage folder to public
    ```
    php artisan storage:link
    ```



    this command will create users (Admin, Employee):

    Admin
     > email: admin@gmail.com , password: password

1. Run server 
   
    ```sh
    php artisan serve
    ```  

1. Visit [localhost:8000](http://localhost:8000) in your favorite browser.

    > Make sure to follow your Laravel local Development Environment.
