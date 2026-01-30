<?php

class Admin extends User {
    public function __construct($id, $pseudo, $email) {
        parent::__construct($id, $pseudo, $email, 'ROLE_ADMIN');
    }
}
