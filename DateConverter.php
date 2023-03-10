<?php

namespace App\Http\Services;
/*
 author:Nutan Dahal
author email:dahalnutan66@gmail.com
author website: http://dahalnutan.com.np
author linkedin: https://www.linkedin.com/in/nutan-dahal-9b4b4b1a4/
author GitHub:https://github.com/nutandc
*/


use Carbon\Carbon;

class DateConverter
{
    public $year;
    public $month;
    public $day;
    public int $nepaliYear = 2000;
    public int $nepaliMonth = 9;
    public int $nepaliDay = 16;
    public int $dayOfWeek = 6;
    private array $calendarData = [0 => [2000, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31], 1 => [2001, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30], 2 => [2002, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30], 3 => [2003, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31], 4 => [2004, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31], 5 => [2005, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30], 6 => [2006, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30], 7 => [2007, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31], 8 => [2008, 31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 29, 31], 9 => [2009, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30], 10 => [2010, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30], 11 => [2011, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31], 12 => [2012, 31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 30, 30], 13 => [2013, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30], 14 => [2014, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30], 15 => [2015, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31], 16 => [2016, 31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 30, 30], 17 => [2017, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30], 18 => [2018, 31, 32, 31, 32, 31, 30, 30, 29, 30, 29, 30, 30], 19 => [2019, 31, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31], 20 => [2020, 31, 31, 31, 32, 31, 31, 30, 29, 30, 29, 30, 30], 21 => [2021, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30], 22 => [2022, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 30], 23 => [2023, 31, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31], 24 => [2024, 31, 31, 31, 32, 31, 31, 30, 29, 30, 29, 30, 30], 25 => [2025, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30], 26 => [2026, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31], 27 => [2027, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31], 28 => [2028, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30], 29 => [2029, 31, 31, 32, 31, 32, 30, 30, 29, 30, 29, 30, 30], 30 => [2030, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31], 31 => [2031, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31], 32 => [2032, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30], 33 => [2033, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30], 34 => [2034, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31], 35 => [2035, 30, 32, 31, 32, 31, 31, 29, 30, 30, 29, 29, 31], 36 => [2036, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30], 37 => [2037, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30], 38 => [2038, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31], 39 => [2039, 31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 30, 30], 40 => [2040, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30], 41 => [2041, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30], 42 => [2042, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31], 43 => [2043, 31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 30, 30], 44 => [2044, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30], 45 => [2045, 31, 32, 31, 32, 31, 30, 30, 29, 30, 29, 30, 30], 46 => [2046, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31], 47 => [2047, 31, 31, 31, 32, 31, 31, 30, 29, 30, 29, 30, 30], 48 => [2048, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30], 49 => [2049, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 30], 50 => [2050, 31, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31], 51 => [2051, 31, 31, 31, 32, 31, 31, 30, 29, 30, 29, 30, 30], 52 => [2052, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30], 53 => [2053, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 30], 54 => [2054, 31, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31], 55 => [2055, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30], 56 => [2056, 31, 31, 32, 31, 32, 30, 30, 29, 30, 29, 30, 30], 57 => [2057, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31], 58 => [2058, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31], 59 => [2059, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30], 60 => [2060, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30], 61 => [2061, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31], 62 => [2062, 30, 32, 31, 32, 31, 31, 29, 30, 29, 30, 29, 31], 63 => [2063, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30], 64 => [2064, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30], 65 => [2065, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31], 66 => [2066, 31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 29, 31], 67 => [2067, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30], 68 => [2068, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30], 69 => [2069, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31], 70 => [2070, 31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 30, 30], 71 => [2071, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30], 72 => [2072, 31, 32, 31, 32, 31, 30, 30, 29, 30, 29, 30, 30], 73 => [2073, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31], 74 => [2074, 31, 31, 31, 32, 31, 31, 30, 29, 30, 29, 30, 30], 75 => [2075, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30], 76 => [2076, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 30], 77 => [2077, 31, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31], 78 => [2078, 31, 31, 31, 32, 31, 31, 30, 29, 30, 29, 30, 30], 79 => [2079, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30], 80 => [2080, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 30], 81 => [2081, 31, 31, 32, 32, 31, 30, 30, 30, 29, 30, 30, 30], 82 => [2082, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 30, 30], 83 => [2083, 31, 31, 32, 31, 31, 30, 30, 30, 29, 30, 30, 30], 84 => [2084, 31, 31, 32, 31, 31, 30, 30, 30, 29, 30, 30, 30], 85 => [2085, 31, 32, 31, 32, 30, 31, 30, 30, 29, 30, 30, 30], 86 => [2086, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 30, 30], 87 => [2087, 31, 31, 32, 31, 31, 31, 30, 30, 29, 30, 30, 30], 88 => [2088, 30, 31, 32, 32, 30, 31, 30, 30, 29, 30, 30, 30], 89 => [2089, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 30, 30], 90 => [2090, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 30, 30],];
    private array $monthsInBS = [1 => 'Baisakh', 2 => 'Jestha', 3 => 'Ashar', 4 => 'Shrawan', 5 => 'Bhadra', 6 => 'Ashoj', 7 => 'Kartik', 8 => 'Manghir', 9 => 'Poush', 10 => 'Magh', 11 => 'Falgun', 12 => 'Chaitra',];
    private array $dayOfWeekInBS = [1 => 'Sunday', 2 => 'Monday', 3 => 'Tuesday', 4 => 'Wednesday', 5 => 'Thursday', 6 => 'Friday', 7 => 'Saturday',];
    private array $monthsInNepali = [1 => '???????????????', 2 => '?????????', 3 => '????????????', 4 => '????????????', 5 => '?????????', 6 => '????????????', 7 => '?????????????????????', 8 => '???????????????', 9 => '?????????', 10 => '?????????', 11 => '???????????????', 12 => '?????????',];

    /*These are initial values for nepali date.*/
    private array $dayOfWeekInNepali = [1 => '??????????????????', 2 => '??????????????????', 3 => '????????????????????????', 4 => '??????????????????', 5 => '?????????????????????', 6 => '????????????????????????', 7 => '??????????????????',];
    private array $numbersInNepali = [0 => '???', 1 => '???', 2 => '???', 3 => '???', 4 => '???', 5 => '???', 6 => '???', 7 => '???', 8 => '???', 9 => '???',];
    private array $normalMonths = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31]; // 17 - 1
    private array $leapMonths = [31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31]; // 7 - 1, 0 for sunday, 6 for saturday

    /*These are initial values for nepali date.*/

    public function create(Carbon $date): static
    {
        $this->year = $date->year;
        $this->month = $date->month;
        $this->day = $date->day;
        $this->setNepaliDate($date->year, $date->month, $date->day);
        return $this;
    }

    private function setNepaliDate($year, $month, $day): void
    {
        $totalEnglishDays = $this->calculateTotalEnglishDays($year, $month, $day);
        $this->performCalculationBasedOn($totalEnglishDays);
    }

    public function calculateTotalEnglishDays($year, $month, $day)
    {
        $totalEnglishDays = 0;
        for ($i = 0; $i < ($year - 1944); $i++) {
            if ($this->isLeapYear(1944 + $i)) {
                for ($j = 0; $j < 12; $j++) {
                    $totalEnglishDays += $this->leapMonths[$j];
                }
            } else {
                for ($j = 0; $j < 12; $j++) {
                    $totalEnglishDays += $this->normalMonths[$j];
                }
            }
        }

        for ($i = 0; $i < ($month - 1); $i++) {
            if ($this->isLeapYear($year)) {
                $totalEnglishDays += $this->leapMonths[$i];
            } else {
                $totalEnglishDays += $this->normalMonths[$i];
            }
        }
        $totalEnglishDays += $day;
        return $totalEnglishDays;
    }

    public function isLeapYear($year): bool
    {
        if ($year % 100 === 0) {
            return $year % 400 === 0;
        }
        return $year % 4 === 0;
    }

    public function performCalculationBasedOn($totalEnglishDays): void
    {
        $i = 0;
        $j = $this->nepaliMonth;
        $nepaliYear = 2000;
        $nepaliMonth = 9;
        $nepaliDay = 16;
        $dayOfWeek = 6;

        while ($totalEnglishDays !== 0) {
            $lastDayOfMonth = $this->calendarData[$i][$j];
            $nepaliDay++;
            $dayOfWeek++;
            if ($nepaliDay > $lastDayOfMonth) {
                $nepaliMonth++;
                $nepaliDay = 1;
                $j++;
            }

            if ($dayOfWeek > 7) {
                $dayOfWeek = 1;
            }

            if ($nepaliMonth > 12) {
                $nepaliYear++;
                $nepaliMonth = 1;
            }

            if ($j > 12) {
                $j = 1;
                $i++;
            }

            $this->nepaliYear = $nepaliYear;
            $this->nepaliMonth = $nepaliMonth;
            $this->nepaliDay = $nepaliDay;
            $this->dayOfWeek = $dayOfWeek;
            $totalEnglishDays--;
        }
    }

    public function toBS(): string
    {
        return $this->nepaliYear . '-' . sprintf('%02d', $this->nepaliMonth) . '-' . sprintf('%02d', $this->nepaliDay);
    }

    public function toFormattedBSDate(): string
    {
        return $this->nepaliDay . ' ' . $this->formattedBSMonth($this->nepaliMonth) . ' ' . $this->nepaliYear . ',' . ' ' . $this->formattedBSDateOfWeek($this->dayOfWeek);
    }

    public function formattedBSMonth($month): mixed
    {
        return $this->monthsInBS[$month];
    }

    public function formattedBSDateOfWeek($dayOfWeek): mixed
    {
        return $this->dayOfWeekInBS[$dayOfWeek];
    }

    public function toFormattedNepaliDate(): string
    {
        return  $this->formattedNepaliNumber($this->nepaliYear)  . ' ' . $this->formattedNepaliMonth($this->nepaliMonth) .' '. $this->formattedNepaliNumber($this->nepaliDay) . ', ' . $this->formattedNepaliDateOfWeek($this->dayOfWeek);
    }

    public function formattedNepaliNumber($value): string
    {
        $numbers = str_split($value);

        foreach ($numbers as $key => $number) {
            $numbers[$key] = $this->numbersInNepali[$number];
        }

        return implode('', $numbers);
    }

    public function formattedNepaliMonth($month)
    {
        return $this->monthsInNepali[$month];
    }

    public function formattedNepaliDateOfWeek($dayOfWeek)
    {
        return $this->dayOfWeekInNepali[$dayOfWeek];
    }

    public function toDetailBS()
    {
        $bs_array = $this->toBSArray();
        $to_detail_bs = null;
        if (count($bs_array) > 0) {
            $to_detail_bs = json_decode(json_encode($bs_array));
        }
        return $to_detail_bs;
    }

    public function toBSArray(): array
    {
        return ['year' => $this->nepaliYear, 'month' => $this->nepaliMonth, 'day' => $this->nepaliDay, 'day_of_week' => $this->dayOfWeek,];
    }

    public function toFormattedBSDateArray(): array
    {
        return ['year' => $this->formattedNepaliNumber($this->nepaliYear), 'month' => $this->formattedNepaliMonth($this->nepaliMonth), 'day' => $this->formattedNepaliNumber($this->nepaliDay), 'day_of_week' => $this->formattedNepaliDateOfWeek($this->dayOfWeek),];
    }
}

