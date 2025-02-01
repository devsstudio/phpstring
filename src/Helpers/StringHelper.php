<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace DevsStudio\Phpstring\Helpers;

/**
 * Description of USString
 *
 * @author JEANPAUL
 */
class StringHelper
{

    /**
     * Genera un alias
     * @param string $p_s_string Cadena de dónde se generará el alias
     * @return string Alias generado
     */
    public static function generateAlias($p_s_string)
    {
        $p_s_string = self::normalizeChars($p_s_string);

        // remove any '-' from the string they will be used as concatonater
        $p_s_string = str_replace('-', ' ', $p_s_string);
        $p_s_string = str_replace('_', ' ', $p_s_string);

        // $lang =& JFactory::getLanguage();
        // $str = $lang->transliterate($str);
        // remove any duplicate whitespace, and ensure all characters are alphanumeric
        $p_s_string = preg_replace(array(
            '/\s+/',
            '/[^A-Za-z0-9\-]/'
        ), array(
            '-',
            ''
        ), $p_s_string);

        // lowercase and trim
        $p_s_string = trim(strtolower($p_s_string));
        return $p_s_string;
    }

    private static function normalizeChars($p_s_string)
    {
        $a_replace = array(
            'À' => 'A',
            'Á' => 'A',
            'Â' => 'A',
            'Ã' => 'A',
            'Ä' => 'Ae',
            'Å' => 'A',
            'Æ' => 'A',
            'Ă' => 'A',
            'à' => 'a',
            'á' => 'a',
            'â' => 'a',
            'ã' => 'a',
            'ä' => 'ae',
            'å' => 'a',
            'ă' => 'a',
            'æ' => 'ae',
            'þ' => 'b',
            'Þ' => 'B',
            'Ç' => 'C',
            'ç' => 'c',
            'È' => 'E',
            'É' => 'E',
            'Ê' => 'E',
            'Ë' => 'E',
            'è' => 'e',
            'é' => 'e',
            'ê' => 'e',
            'ë' => 'e',
            'Ğ' => 'G',
            'ğ' => 'g',
            'Ì' => 'I',
            'Í' => 'I',
            'Î' => 'I',
            'Ï' => 'I',
            'İ' => 'I',
            'ı' => 'i',
            'ì' => 'i',
            'í' => 'i',
            'î' => 'i',
            'ï' => 'i',
            'Ñ' => 'N',
            'Ò' => 'O',
            'Ó' => 'O',
            'Ô' => 'O',
            'Õ' => 'O',
            'Ö' => 'Oe',
            'Ø' => 'O',
            'ö' => 'oe',
            'ø' => 'o',
            'ð' => 'o',
            'ñ' => 'n',
            'ò' => 'o',
            'ó' => 'o',
            'ô' => 'o',
            'õ' => 'o',
            'Š' => 'S',
            'š' => 's',
            'Ş' => 'S',
            'ș' => 's',
            'Ș' => 'S',
            'ş' => 's',
            'ß' => 'ss',
            'ț' => 't',
            'Ț' => 'T',
            'Ù' => 'U',
            'Ú' => 'U',
            'Û' => 'U',
            'Ü' => 'Ue',
            'ù' => 'u',
            'ú' => 'u',
            'û' => 'u',
            'ü' => 'ue',
            'Ý' => 'Y',
            'ý' => 'y',
            'ý' => 'y',
            'ÿ' => 'y',
            'Ž' => 'Z',
            'ž' => 'z'
        );
        return strtr($p_s_string, $a_replace);
    }

    /**
     * Captura una palabra dentro un texto
     * @param string $p_s_regex REGEX
     * @param string $p_s_string texto
     * @return boolean|string FALSE en caso de error o la palabra encontrada
     */
    public static function capture($p_s_regex, $p_s_string)
    {
        $a_matches = [];

        preg_match_all($p_s_regex, $p_s_string, $a_matches);

        if (is_array($a_matches) && count($a_matches) > 1 && count($a_matches[1]) > 0) {
            return $a_matches[1][0];
        } else {
            return false;
        }
    }

    /**
     * Chequea si una cadena termina con una subcadena especificada
     * @param mixed $p_s_haystack Cadena que contiene la subcadena
     * @param mixed $p_s_needle Subcadena con la que la cadena termina
     * @return bool VERDADERO si la cadena termina con la subcadena especificada o FALSO en caso contrario
     */
    public static function endsWith($p_s_haystack, $p_s_needle)
    {
        return $p_s_needle === "" || (($temp = strlen($p_s_haystack) - strlen($p_s_needle)) >= 0 && strpos($p_s_haystack, $p_s_needle, $temp) !== FALSE);
    }
}
