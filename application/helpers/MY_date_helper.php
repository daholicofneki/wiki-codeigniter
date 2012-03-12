<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
function date_between($string)
{
    $diff = abs(strtotime($string) - time());
    
    $years = floor($diff / (365*60*60*24));
    $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
    $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
    
    //printf("%d years, %d months, %d days\n", $years, $months, $days);
    return $days;

}

function tahun ()
{
    $tahun = array ();
    $now = date ('Y');
    
    for ($x = $now - 10; $x<= $now + 10; $x++)
    {
        $tahun[$x] = $x;
    }
    
    return $tahun;
}
function bulan ()
{
    return array (
        ''      => 'All',
        '01'    => 'Januari',
        '02'    => 'Februari',
        '03'    => 'Maret',
        '04'    => 'April',
        '05'    => 'Mei',
        '06'    => 'Juni',
        '07'    => 'Juli',
        '08'    => 'Agustus',
        '09'    => 'September',
        '10'    => 'Oktober',
        '11'    => 'November',
        '12'    => 'Desember');
}