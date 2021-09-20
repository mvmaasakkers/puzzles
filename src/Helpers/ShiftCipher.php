<?php

namespace App\Helpers;

class ShiftCipher
{
    private string $plain;
    private string $cipher;

    public function __construct(string $plain)
    {
        $this->plain = $plain;
    }

    public function shiftRight(int $amount): string
    {
        $nettShift = ($amount % strlen($this->plain));
        $this->cipher = substr($this->plain, $nettShift) . substr($this->plain, 0, $nettShift);
        return $this->cipher;
    }

    public function translate(string $data): string
    {
        $characters = str_split($data);
        $plainLetters = array_flip(str_split($this->plain));
        $cipherLetters = str_split($this->cipher);
        $encryptedString = '';

        foreach($characters as $v) {
            if(!isset($plainLetters[$v])) {
                $encryptedString .= $v;
                continue;
            }
            $encryptedString .= $cipherLetters[$plainLetters[$v]];
        }

        return $encryptedString;
    }
}
