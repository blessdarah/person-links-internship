<?php

declare(strict_types=1);

namespace PersonLinks\Internship\actions\apply;

use PersonLinks\Internship\app\core\Connection;

class CreateApplicationAction
{
    public function __invoke(array $data)
    {
        $db = Connection::getInstance();

        $sql = 'INSERT INTO register 
        (fullname, email, phone, school, referral, speciality, comments) VALUES 
        (:fullname, :email, :phone, :school, :referral, :speciality, :comments)';

        $query = $db->prepare($sql);
        $result = $query->execute($data);

        return $result;
    }
}
