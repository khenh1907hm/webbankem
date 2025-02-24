<?php
class SessionHelper {
    public static function startSession() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function isLoggedIn() {
        self::startSession();
        return isset($_SESSION['username']);
    }

    public static function isAdmin() {
        self::startSession();
        return isset($_SESSION['username']) && ($_SESSION['role'] ?? '') === 'admin';
    }

    public static function getUser() {
        self::startSession();
        return $_SESSION['username'] ?? null;
    }

    public static function getRole() {
        self::startSession();
        return $_SESSION['role'] ?? null;
    }

    public static function logout() {
        self::startSession();
        session_unset();
        session_destroy();
    }
}
?>
