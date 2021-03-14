# PebbleMVC
A lightweight object oriented PHP MVC. The core code is based on the MVC created in [Brad Traversy's Udemy course](https://www.udemy.com/course/object-oriented-php-mvc/). I highly recommend enrolling if you are new to PHP OOP, or want to get a better understanding how the core components of this repository were put together.
<br/>

**fyi**, I'm tinkering with this. It's a work-in-progress and I plan to build it out a little more.
<br/>

Feel free to get in touch with me [@PeteMerrill](twitter.com/petemerrill) on Twitter if you want to talk about this project a little more.
<br/>

If you're going to use this be sure to enter the correct path to your project in the **.htaccess** file (`RewriteBase`) in the **public** directory.
<br/>

Look for the following on line 4. This is what you must change.
<br/>

`RewriteBase /PebbleMVC/public`
<br/>

Also, be sure to enter your **database credentials**, **site name**, and **root** in the **app/config/config.php** file.
<br/>

## To create a model:
Create a new file in the **app/models** folder. In this example, create s file called **Post.php**.
<br/>

Be sure to capitalize the first letter of the file and try not to pluralize the name. It's best to pluralize controllers while leaving models singular.
<br/>

Feel free to copy and paste the following code into the new Post.php file to create a basic model.
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
    $posts = $this->postModel->getPosts();
    $data = [
        'title' => 'Post Viewer',
        'posts' => $posts
    ];

    $this->view('pages/index', $data);
}
```