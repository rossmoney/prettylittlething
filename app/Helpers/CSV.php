<?php
// File: app/Helpers/CSV.php

namespace App\Helpers;

class CSV
{
    private $headerRow = null;
    private $invalids = 0;
    private $data = [];
    private $customHeaders = [];
    private $headerSpecified = false;

    public function toArray($filename = '', $model, $delimiter = ',')
    {
        $firstRow = true;

        if (!file_exists($filename) || !is_readable($filename))
            return false;

        if (($handle = fopen($filename, 'r')) !== false)
        {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
            {
                if($firstRow) {
                    $firstRow = false;
                    if(!$this->isHeaderSpecified()) {
                        $this->setHeaderRow($row);
                    }
                } else {
                    $this->data = $model->processCSVRow($this, $row);
                }
            }
            fclose($handle);
        }

        return $this->data;
    }

    public function getInvalidProductCount() {
        return $this->invalids;
    }

    public function setInvalidProductCount($invalids) {
        $this->invalids = $invalids;
        return $this->invalids;
    }

    public function getHeaderRow() {
        return $this->headerRow;
    }

    public function setHeaderRow($headerRow) {
        $this->headerRow = $headerRow;
        $this->headerSpecified = true;
        return $this->headerRow;
    }

    public function getRowData() {
        return $this->data;
    }

    public function setRowData($data) {
        $this->data = $data;
        return $this->data;
    }

    public function isHeaderSpecified() {
        return $this->headerSpecified;
    }
}