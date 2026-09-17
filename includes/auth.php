<?php

function smartwills_get_login_users(): array
{
    return [
        ['email' => 'demo@smartwill.com', 'pass' => 'password123', 'name' => 'Sarah'],
    ];
}

function smartwills_login_validate(string $email, string $password): array
{
    $email = trim($email);
    $password = trim($password);

    if ($email === '' || $password === '') {
        return ['ok' => false, 'message' => 'Invalid username or password. Please try again.'];
    }

    $users = smartwills_get_login_users();
    foreach ($users as $user) {
        if (strtolower((string) $user['email']) === strtolower($email) && (string) $user['pass'] === $password) {
            return [
                'ok' => true,
                'email' => $email,
                'name' => (string) $user['name'],
                'message' => 'Login successful.',
            ];
        }
    }

    return ['ok' => false, 'message' => 'Invalid username or password. Please try again.'];
}

function smartwills_register_user(string $name, string $email, string $password, string $confirmPassword): array
{
    $name = trim($name);
    $email = trim($email);
    $password = trim($password);
    $confirmPassword = trim($confirmPassword);

    if ($name === '' || $email === '' || $password === '' || $confirmPassword === '') {
        return ['ok' => false, 'message' => 'All fields are required.'];
    }

    if (strlen($password) < 4) {
        return ['ok' => false, 'message' => 'Password must be at least 4 characters.'];
    }

    if ($password !== $confirmPassword) {
        return ['ok' => false, 'message' => 'Passwords do not match.'];
    }

    return [
        'ok' => true,
        'name' => $name,
        'email' => $email,
        'message' => 'Account created successfully! Please sign in.',
    ];
}
