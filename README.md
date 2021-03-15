# PebbleMVC
PebbleMVC is a lightweight object-oriented PHP MVC with basic user registration and authentication.
<br/>

## Origin
The core code is based on the MVC created in [Brad Traversy's Udemy course](https://www.udemy.com/course/object-oriented-php-mvc/). I highly recommend enrolling if you are new to PHP OOP, or want to get a better understanding for how the core components of this repository were put together.
<br/>

**fyi**, I'm tinkering with this. It's a work-in-progress and I plan to build it out a little more over time.
<br/>

Feel free to get in touch with me [@PeteMerrill](https://twitter.com/petemerrill) on Twitter if you want to talk about this project a little more.
<br/>

## Screenshots
![Alt text](https://i.ibb.co/vsMGsPD/Screenshot-2021-03-14-Pebble-MVC-3.png)
![Alt](https://i.ibb.co/9cSsJGN/Screenshot-2021-03-14-Pebble-MVC-2.png)
![Alt](https://i.ibb.co/60gTCYX/Screenshot-2021-03-14-Pebble-MVC-1.png)
![Alt]https://i.ibb.co/bg6zwdw/Screenshot-2021-03-14-Pebble-MVC.png)

## Getting Started
The first thing you'll want to do is to enter the correct path to your project in the **.htaccess** file (`RewriteBase`) in the **public** directory.
<br/>

Look for the following on line 4. This is what you should change.
<br/>

`RewriteBase /PebbleMVC/public`
<br/>

Also, be sure to enter your **database credentials**, **site name**, and **URL root** in the **app/config/config.php** file.
<br/>

The value of these constants are what you should be changing.
<br/>

```php
// URL Root
define('URLROOT', '_YOUR_URL_');

// Site Name
define('SITENAME', '_YOUR_SITENAME_');

// Database Params
define('DB_HOST', 'localhost');
define('DB_USER', '_YOUR_USER');
define('DB_PASS', '_YOUR_PASSWORD_');
define('DB_NAME', '_YOUR_DBNAME_');
```
<br/>

## Create User Database Table
Create a new table called ```users``` in the database that you are using for this project.
<br/>

The table should have 5 columns.
- **id**: int, primary key, auto increment
- **name**: varchar(255)
- **email**: varchar(255)
- **password**: varchar(255)
- **created_at**: datetime, default value should be current timestamp

```SQL
--
-- Table structure for table `users`
--
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
```

## Create a Model
Create a new file in the **app/models** folder. In this example, create a file called **Post.php**.
<br/>

Be sure to capitalize the first letter of the file and try not to pluralize the name. It's best to pluralize controllers while leaving models singular.
<br/>

Feel free to copy and paste the following code into the new **Post.php** file to create a basic model.
<br/>

```php
<?php
    class Post {
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function getFromTable(){
            $this->db->query("SELECT * FROM _YOUR_DB_TABLE_");
            return $this->db->resultSet();
        }
    }
```
<br/>

Now go into **app/controllers/Pages.php** and edit the `__construct` and `index` method.
<br/>

```php
public function __construct(){
    $this->postModel = $this->model('Post');
}

public function index(){
    $posts = $this->postModel->getFromTable();
    $data = [
        'title' => 'Post Viewer',
        'posts' => $posts
    ];

    $this->view('pages/index', $data);
}
```

Since the model was added to the index method you'll want to open up the **app/views/pages/index.php** file and enter the following code. This will echo out the contents of the ```$posts``` property as a JSON object.
<br/>

```php
<?php echo json_encode($data['posts']); ?>
```
<br/>

This was just an example and should give you an idea how to add your own models to this MVC.
<br/>

You could also just look at what's in the `app/models` folder to see how models get created in this framework.
<br/>

## Template
The default template uses Bootstrap 5 and Font Awesome icons.
<br/>

Simply remove Bootstrap and Font Awesome from the `app/views/inc/header.php` and `app/views/inc/footer.php` files.
<br/>

You'll also want to take a look at the navigation system in the `app/views/inc/navbar.php` file. You'll have to come up with something different if you're not going to use Bootstrap.
<br/>