<?php

class FormValidator {
    private $errors = [];

    public function validate($data, $rules) {
        foreach ($rules as $field => $rule) {
            $value = isset($data[$field]) ? trim($data[$field]) : '';

            if (in_array('required', $rule) && empty($value)) {
                $this->errors[$field] = "$field is required.";
            }

            if (in_array('email', $rule) && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                $this->errors[$field] = "Invalid email format.";
            }
        }

        return empty($this->errors);
    }

    public function getErrors() {
        return $this->errors;
    }
}

class SignUpHandler {
    private $validator;

    public function __construct(FormValidator $validator) {
        $this->validator = $validator;
    }

    public function handle($postData, $filesData) {
        $rules = [
            'firstName' => ['required'],
            'lastName' => ['required'],
            'email' => ['required', 'email'],
            'pasi' => ['required'],
            'photo' => ['required'],
        ];

        // Validate form data
        if (!$this->validator->validate($postData, $rules)) {
            return [
                'success' => false,
                'errors' => $this->validator->getErrors()
            ];
        }

        // Check if terms checkbox is checked
        if (!isset($postData['termsCheck']) || $postData['termsCheck'] !== 'on') {
            return [
                'success' => false,
                'errors' => ['termsCheck' => 'You must agree to the terms.']
            ];
        }

        // Here, you can process the uploaded file if needed
        if (isset($filesData['photo']) && $filesData['photo']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = __DIR__ . '/uploads/';
            $uploadFile = $uploadDir . basename($filesData['photo']['name']);

            if (!move_uploaded_file($filesData['photo']['tmp_name'], $uploadFile)) {
                return [
                    'success' => false,
                    'errors' => ['photo' => 'Failed to upload photo.']
                ];
            }
        } else {
            return [
                'success' => false,
                'errors' => ['photo' => 'Photo upload error.']
            ];
        }

        // If everything is fine, return success
        return ['success' => true];
    }
}

// Usage example
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $validator = new FormValidator();
    $signUpHandler = new SignUpHandler($validator);

    $result = $signUpHandler->handle($_POST, $_FILES);

    if ($result['success']) {
        header('Location: ./getDemo.php');
        exit;
    } else {
        $errors = $result['errors'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../style/contacStyle.css">
  <link rel="stylesheet" href="../style/news1Style.css">
    <title>Sign Up</title>
</head>
<body>

<div class="contact">
    <form id="signUpForm" method="POST" action="signUp.php" enctype="multipart/form-data">
        <h1 class="tittle">Signup</h1>
        <div>
            <label for="firstName">First Name</label>
            <input type="text" name="firstName" id="firstName">
            <span class="error-message">
                <?php echo $errors['firstName'] ?? ''; ?>
            </span>
        </div>

        <div>
            <label for="lastName">Last Name</label>
            <input type="text" name="lastName" id="lastName">
            <span class="error-message">
                <?php echo $errors['lastName'] ?? ''; ?>
            </span>
        </div>

        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
            <span class="error-message">
                <?php echo $errors['email'] ?? ''; ?>
            </span>
        </div>

        <div>
            <label for="pasi">Password</label>
            <input type="password" name="pasi" id="pasi">
            <span class="error-message">
                <?php echo $errors['pasi'] ?? ''; ?>
            </span>
        </div>

        <div>
            <label for="photo">Photo</label>
            <input type="file" name="photo" id="photo">
            <span class="error-message">
                <?php echo $errors['photo'] ?? ''; ?>
            </span>
        </div>

        <div>
            <label>
                <input type="checkbox" name="termsCheck" id="termsCheck">
                I agree to the terms and conditions
            </label>
            <span class="error-message">
                <?php echo $errors['termsCheck'] ?? ''; ?>
            </span>
        </div>

        <button type="submit">Sign Up</button>
    </form>
    </div>
</body>
</html>
