<?php

namespace App\Utils;

class DetectorLanguage
{
    public static function getJapaneseType ($str)
    {
        $r = "";

        do {
            //  한자
            preg_match_all('!['
                .'\x{2E80}-\x{2EFF}'// 한,중,일 부수 보충
                .'\x{31C0}-\x{31EF}\x{3200}-\x{32FF}'
                .'\x{3400}-\x{4DBF}\x{4E00}-\x{9FBF}\x{F900}-\x{FAFF}'
                .'\x{20000}-\x{2A6DF}\x{2F800}-\x{2FA1F}'// 한,중,일 호환한자
                .']+!u', $str, $match1);

            //  일어
            preg_match_all('!['
                .'\x{3040}-\x{309F}'// 히라가나
                .'\x{30A0}-\x{30FF}'// 가타카나
                .'\x{31F0}-\x{31FF}'// 가타카나 음성 확장
                .']+!u', $str, $match2);

            if ((count($match1[0]) && count($match2[0]))
                || (!count($match1[0]) && count($match2[0]))) {
                $r = "jap";
                break;
            }

            if (count($match1[0]) && !count($match2[0])) {
                $r = "kanji";
                break;
            }
        } while (false);

        return $r;
    }

    /**
     * 한자가 포함되어 있는지 확인
     * @param $str
     * @return string
     */
    public static function checkExistKanji ($str)
    {
        $r = false;

        do {
            //  한자
            preg_match_all('!['
                .'\x{2E80}-\x{2EFF}'// 한,중,일 부수 보충
                .'\x{31C0}-\x{31EF}\x{3200}-\x{32FF}'
                .'\x{3400}-\x{4DBF}\x{4E00}-\x{9FBF}\x{F900}-\x{FAFF}'
                .'\x{20000}-\x{2A6DF}\x{2F800}-\x{2FA1F}'// 한,중,일 호환한자
                .']+!u', $str, $match1);

            if (count($match1[0])) {
                $r = true;
            }
        } while (false);

        return $r;
    }

    /**
     * 한글에 일본어 취득
     * @param $str
     * @return string
     */
    public static function getJapanInKorea ($str)
    {
        $r = false;

        do {
            //  일어
            preg_match_all('!['
                .'\x{3040}-\x{309F}'// 히라가나
                .'\x{30A0}-\x{30FF}'// 가타카나
                .'\x{31F0}-\x{31FF}'// 가타카나 음성 확장
                .']+!u', $str, $match);

            if (count($match[0])) {
                $r = true;
            }
        } while (false);

        return array($r, $match[0]);
    }
}