<?php

namespace App\Utilities;

class Util
{
    /***
     * Function to filter arrays by their properties
     * @param array $inputArray => The array to filter
     * @param string $filterProperty => The property to filter on
     * @param string $filterValue => The value to filter for
     * @return array
     */
    public static function filterArrayByValue(
        array $inputArray, string $filterProperty,
        string $filterValue) : array {

        $retVal = array_filter($inputArray, function ($row) use ($filterValue, $filterProperty) {
            if ( array_key_exists($filterProperty, $row) ) {
                return $row[$filterProperty] == $filterValue;
            }
        });
        if (count($retVal) > 0) {
            $retVal = array_values($retVal);
        }
        return $retVal;
    }

    public static function AddHTMLSuperscriptOrdinal( string $text) : string {

        $lastChar = '';
        if ( strlen(trim($text)) > 0 ) {
            $lastChar = substr(trim($text),-1);
        }

        if ( is_numeric( $lastChar ) ) {
            switch ($lastChar) {
                case '':
                    break;
                case '1':
                    $text = $text . '<sup>st</sup>';
                    break;
                case '2':
                    $text = $text . '<sup>nd</sup>';
                    break;
                case '3':
                    $text = $text . '<sup>rd</sup>';
                    break;
                default:
                    $text = $text . '<sup>th</sup>';
                    break;
            }
        }
        return $text;
    }

}
