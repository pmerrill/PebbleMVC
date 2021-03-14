# PebbleMVC
A lightweight object oriented PHP MVC. The core code is based on the MVC created in [Brad Traversy's Udemy course](https://www.udemy.com/course/object-oriented-php-mvc/). I highly recommend enrolling if you are new to PHP OOP, or want to get a better understanding how the core components of this repository were put together.
<br/>

**fyi**, I'm tinkering with this. It's a work-in-progress and I plan to build it out a little more over time.
<br/>

Feel free to get in touch with me [@PeteMerrill](twitter.com/petemerrill) on Twitter if you want to talk about this project a little more.
<br/>

## Getting Started
The first thing you'll want to do is to enter the correct path to your project in the **.htaccess** file (`RewriteBase`) in the **public** directory.
<br/>

Look for the following on line 4. This is what you should change.
<br/>

`RewriteBase /PebbleMVC/public`
<br/>

Also, be sure to enter your **database credentials**, **site name**, and **URL root** in the **app/config/config.php** file.
<br/>

These constants are what you should be changing.
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

Since the model was added to the index method you'll want to open up the **app/views/pages/index.php** file and enter the following code. This will echo out the contents of the posts object.
<br/>

```php
<?php echo json_encode($data['posts']); ?>
```
<br/>

This was just an example and should give you an idea how to add your own models to this MVC.