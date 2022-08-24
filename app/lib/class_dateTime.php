<?php

class class_dateTime
{
    /// ///////////////////////////////////////////////////////////////////
    /// //PARA: Date Should In YYYY-MM-DD Format
    /// //RESULT FORMAT:
    /// // '%y Year %m Month %d Day %h Hours %i Minute %s Seconds'        =>  1 Year 3 Month 14 Day 11 Hours 49 Minute 36 Seconds
    /// // '%y Year %m Month %d Day'                                    =>  1 Year 3 Month 14 Days// '%m Month %d Day'                                            =>  3 Month 14 Day
    /// // '%d Day %h Hours'                                            =>  14 Day 11 Hours
    /// // '%d Day'                                                        =>  14 Days
    /// // '%h Hours %i Minute %s Seconds'                                =>  11 Hours 49 Minute 36 Seconds
    /// // '%i Minute %s Seconds'                                        =>  49 Minute 36 Seconds
    /// // '%h Hours                                                    =>  11 Hours
    /// // '%a Days                                                        =>  468 Days
    /// //////////////////////////////////////////////////////////////////////
    //function dateDiff($date_1, $date_2, $differenceFormat = '%y, %m, %d')
    function dateDiff($date_1, $date_2, $differenceFormat)
    {
        $datetime1 = date_create($date_1);
        $datetime2 = date_create($date_2);

        $interval = date_diff($datetime1, $datetime2);

        return $interval->format($differenceFormat);
    }

    function dateBE($dateAD)
    {
        list($yy, $mm, $dd) = explode('-', $dateAD);
        return ($yy + 543) . "-" . $mm . "-" . $dd;
    }

    function dateAD($dateBE)
    {
        list($yy, $mm, $dd) = explode('-', $dateBE);
        return ($yy - 543) . "-" . $mm . "-" . $dd;
    }

    function monthThai($dateBE)
    {
        list($yy, $mm, $dd) = explode('-', $dateBE);
        $mm = str_replace(
            array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'),
            array('ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'),
            $mm
        );
        return number_format($dd) . " " . $mm . " " . $yy;
    }

    function monthEng($dateBE)
    {
        list($dd, $mm, $yy) = explode(' ', $dateBE);
        $mm = str_replace(
            array('ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'),
            array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'),
            $mm
        );
        return $yy . "-" . $mm . "-" . str_pad($dd, 2, "0", STR_PAD_LEFT);
    }
}