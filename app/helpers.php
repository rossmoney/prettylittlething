<?php

function csvToArray($filename = '', $types, $customHeaders = [], $delimiter = ',')
{
    if (!file_exists($filename) || !is_readable($filename))
        return false;

    $header = null;
    $data = array();
    $invalids = 0;
    if (($handle = fopen($filename, 'r')) !== false)
    {
        while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
        {
            $discard = false;
            if (!$header)
                $header = $row;
            else
            {
                //if i had more time i would split this out into a seperate function, perhaps utilising a callback in the source model to process one record only.
                $diff = count($header) - count($row);
                $amount = abs($diff);
                if($diff < 0) {
                    $row = array_slice($row, 0, count($header));
                } else {
                    $row = array_pad($row, count($header), null);
                }
                $row = preg_replace('/\$|£/', '', $row); //format and sanitize data
                foreach($row as $key=>$value) {
                    if($row[$key] == 'error in export') $discard = true;
                    switch($types[$key]) {
                        case 'int':
                            $row[$key] = (int) $row[$key];
                        break;
                        case 'float':
                            $row[$key] = (float) $row[$key];
                        break;
                        case 'bool':
                            if($row[$key] != 'yes') $row[$key] = 'no';
                        break;
                    }
                }
                if($discard) {
                    $invalids++;
                    continue;
                }
                if(count($customHeaders) > 0) {
                    $data[] = array_combine($customHeaders, $row);
                } else {
                    $data[] = array_combine($header, $row);
                }
                //
            }
        }
        fclose($handle);
    }

    return [$data, $invalids];
}