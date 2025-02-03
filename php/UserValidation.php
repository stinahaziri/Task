<?php
class FormValidator {
    private $errors = [];

    // Validimi i fushës First Name
    public function validateFirstName($firstName) {
        if (empty($firstName)) {
            $this->errors['firstName'] = 'First name is required.';
        } elseif (strlen($firstName) > 8) {
            $this->errors['firstName'] = 'First name cannot exceed 8 characters.';
        }
    }

    // Validimi i fushës Last Name
    public function validateLastName($lastName) {
        if (empty($lastName)) {
            $this->errors['lastName'] = 'Last name is required.';
        } elseif (strlen($lastName) > 8) {
            $this->errors['lastName'] = 'Last name cannot exceed 8 characters.';
        }
    }

    // Validimi i fushës Email
    public function validateEmail($email) {
        if (empty($email)) {
            $this->errors['email'] = 'Email is required.';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = 'Please enter a valid email address.';
        }
    }

    // Validimi i fushës Password
    public function validatePassword($password) {
        if (empty($password)) {
            $this->errors['password'] = 'Password is required.';
        } elseif (strlen($password) < 6) {
            $this->errors['password'] = 'Password must be at least 6 characters.';
        }
    }

    // Validimi i fushës Photo (file)
    public function validatePhoto($photo) {
        if ($photo['error'] !== UPLOAD_ERR_OK) {
            $this->errors['photo'] = 'Please upload a photo.';
        } elseif (!in_array(mime_content_type($photo['tmp_name']), ['image/jpeg', 'image/png'])) {
            $this->errors['photo'] = 'Only JPEG or PNG images are allowed.';
        }
    }

    // Validimi i checkbox-it për kushtet
    public function validateTerms($terms) {
        if (!$terms) {
            $this->errors['terms'] = 'You must agree to the terms of service.';
        }
    }

    // Funksioni për të marrë gabimet
    public function getErrors() {
        return $this->errors;
    }
}

$formSubmitted = false;
$errors = [];

// Kontrolloni që formulari është dërguar me metodën GET
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['submit'])) {
    // Krijo një instancë të klasës FormValidator
    $validator = new FormValidator();

    // Validimi për çdo fushë
    $validator->validateFirstName($_GET['firstName'] ?? '');
    $validator->validateLastName($_GET['lastName'] ?? '');
    $validator->validateEmail($_GET['email'] ?? '');
    $validator->validatePassword($_GET['pasi'] ?? '');
    $validator->validateTerms(isset($_GET['termsCheck']));

    // Merr gabimet
    $errors = $validator->getErrors();

    // Kontrolloni nëse ka gabime, përndryshe shfaqni mesazhin e suksesit
    if (empty($errors)) {
        $formSubmitted = true;
        echo "Formulari është valid!";
    }
}
?>

