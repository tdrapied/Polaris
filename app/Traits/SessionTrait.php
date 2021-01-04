<?php

namespace App\Traits;

use ParagonIE\Cookie\Cookie;

trait SessionTrait {

    /**
     * @param string $value
     * @return Void
     */
    public static function setSessionCookie(string $value) {
        Cookie::setcookie(COOKIE_SESSION_KEY, SessionTrait::encryptCookieValue($value))
    }

    /**
     * @param string $cookieValue
     * @return String
     */
    public static function getSessionCookieValue(string $cookieValue) {
        return SessionTrait::decryptCookieValue($cookieValue);
    }

    /**
     * Deconnecte l'utilisateur
     *
     * @return Void
     */
    public static function unsetSessionCookie() {
        // Lorsque l'utilisateur se déconnecte, le cookie est vidé et la variable "user" dans $_SESSION est annulée
        unset($_SESSION['user']);
        Cookie::setcookie(COOKIE_SESSION_KEY, '', time() - 3600);
    }

    /**
     * @param string $value
     * @return String
     */
    private static function encryptCookieValue(string $value) {
        // Récupère la longueur cipher du vecteur d'initialisation
        $ivlen = openssl_cipher_iv_length(COOKIE_CYPHER);
        // Retourne une chaîne de caractères contenant le nombre demandé d'octet aléatoire cryptographiquement sécurisé.
        $bytes = random_bytes($ivlen);
        // Retourne value + iv chiffrée
        return openssl_encrypt($value, COOKIE_CYPHER, COOKIE_SECRET, 0, $bytes) . '|' . $bytes;
    }

    /**
     * @param string $valueEncrypt
     * @return String
     */
    private static function decryptCookieValue(string $valueEncrypt): String {
        // Obtention de value et iv chiffrée
        [$value, $id] = explode('|', $value);

        try {
            $decryptedValue = openssl_decrypt($value, COOKIE_CYPHER, COOKIE_SECRET, 0, $id);
        } catch (\Exception $e) {
            // If we encounter an error, we return an empty string and we unset the cookie
            SessionTrait::unsetSessionCookie();
        }

        return $decryptedValue;
    }

}
