# nepali-to-english-date-converter
This is the helper class to convert every English  dates to Nepali

**Namespace App\Http\Services;**:




## Uses
### Convert English date to nepali
#### Currently can only calculate the date between BS 2000-2089.

```php
$dateConverter = new \App\Http\Services\DateConverter();
//$date = now()->format('Y-m-d');
$date = '2022-12-28';
echo $date;
$dateConverter->eng_to_nep($date);

// "2079-09-13"

```

### Count Nepali days by year and month

```php
$dateConverter->get_num_of_nepali_days('2078', '12');
// 30
```

### Check Date Range

```php
$dateConverter->_is_in_range_eng('2022', '12','30');
// true
```

### Check Leap year

```php
$dateConverter->is_leap_year('2022');
// False
```

### Convert english number to nepali number

```php
$dateConverter->convert_to_nepali_number('1111');
// ११११
```

### Convert english number to nepali number

```php
$dateConverter->_get_nepali_month('01' );
// बैशाख
```

### Convert english number to nepali number

```php
$dateConverter->_get_english_month('01' );
// January
```
