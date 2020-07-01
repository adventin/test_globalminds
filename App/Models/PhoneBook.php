<?php

namespace App\Models;

use PDO;
use App\Models\Helper;

class PhoneBook extends \Core\Model
{
    private $helper = null;

    public function __construct()
    {
        $this->helper = new Helper();
    }

    public function getContacts($search = '')
    {
        $db = static::getDB();
        $query = "SELECT `id`, `name`, `phone` FROM `phonebook`";

        if (!empty($search)) {
            $query .= "WHERE name LIKE '{$search}%' OR phone LIKE '{$search}%'";
        }
        $query .= ' ORDER BY `name` ASC';

        $stmt = $db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createContact($data)
    {
        try {

            $contactData = $this->helper->setData($data)->isEmpty()->isPhone()->isName()->getData();

            $db = static::getDB();
            $query = "INSERT INTO `phonebook` (`name`, `phone`) VALUES (:name, :phone)";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':name', $contactData['name']);
            $stmt->bindParam(':phone', $contactData['phone']);
            $stmt->execute();
            $data['id'] = $db->lastInsertId();
            return $data;
        }
        catch (\Exception $e) {
            return [
                'error' => $e->getMessage()
            ];
        }
    }
}