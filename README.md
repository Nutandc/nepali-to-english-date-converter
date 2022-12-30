# Convert English date to nepali
This is the helper class to convert every English  dates to Nepali

Copy this file to namespace **App\Http\Services**:


## Uses
#### Currently, can only calculate the date between BS 2000-2089.
This package can convert english date to nepali date.

## Installation


## Usage

``` php
$date = new \App\Services\DateConverter();
$nep_date =  $date->create(Carbon::create('2022-9-8'))->toFormattedBSDate();

$nepaliDate = $date->fromEnglishDate(2020, 10, 4)->toNepaliDate();
//Output: 2077-6-18

$nepaliDate = $date->fromEnglishDate(2020, 10, 4)->toFormattedNepaliDate();
//Output: २०७७ असोज १८, आइतवार

$nepaliDate = $date->fromEnglishDate(2020, 10, 4)->toNepaliDateArray();
//Output:
[
    'year' => 2077,
    'month' => 6,
    'day' => 18,
    'day_of_week' => 1,
]

$nepaliDate = $date->fromEnglishDate(2020, 10, 4)->toFormattedNepaliDateArray();
//Output:
[
    'year' => '२०७७',
    'month' => 'असोज',
    'day' => '१८',
    'day_of_week' => 'आइतवार',
]
```

