<?php

namespace App\Controllers;

use Core\Controller;
use Core\View;
use App\Models\PhoneBook;
use Core\Router;

class Home extends Controller
{

    public function __construct($route_params)
    {
        parent::__construct($route_params);
        $this->modelPhoneBook = new PhoneBook;
    }

    /**
     * Show the index page
     * @return void
     */
    public function indexAction()
    {
        View::render('Home/index.php', [
            'phonebook' => $this->modelPhoneBook->getContacts()
        ]);
    }

    public function searchAction()
    {

        $searchString = $_POST['search'];

        $data = $this->modelPhoneBook->getContacts($searchString);
        
        View::render('Api/contacts.php', [
            'phonebook' => $data
        ]);
    }

    public function createAction()
    {
        foreach (json_decode($_POST['data'], true) as $v) {
            $data[$v['name']] = $v['value'];
        }
        $data = $this->modelPhoneBook->createContact($data);

        View::render('Api/contacts.php', [
            'phonebook' => $data
        ]);
    }
}
