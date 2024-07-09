<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\Exportable;

class InstituteUserExport implements FromCollection, WithStyles
{
    use Exportable;

    private $collection;
    private $headerIndexes = [];

    public function __construct($arrays)
    {
        $output = [];
        $headerAdded = false; // Flag to track whether the header row has been added
        $soeUcFormCalculation = false;

        foreach ($arrays as $array) {
            if (!empty($array) && isset($array[0])) {
                foreach ($array as $row) {
                    unset($row['user_id'],$row['program_id'],$row['state'],$row['deleted_at'], $row['updated_at']);
                    if (!$headerAdded) {
                        $formattedKeys = array_map([$this, 'formatHeader'], array_keys($row));
                        $output[] = $formattedKeys; // Add main header row only if not already added
                        $this->headerIndexes[] = count($output); // Track header row index
                        $headerAdded = true;
                    }
                    $outputRow = [];
                    foreach ($row as $key => $value) {
                        if($key === 'states' && is_array($value)){
                                $outputRow['states'] = $value['name'];
                        }elseif($key === 'institute_program' && is_array($value)){
                            $outputRow['Institute Program'] = $value['name'].'-'.$value['code'];
                        }elseif ($key === 'soe_uc_form_calculation' && is_array($value)) {
                            if (!$soeUcFormCalculation) {
                                $caseSample = $value[0];
                                $caseHeaders = array_keys($this->flattenCaseArray($caseSample));
                                $formattedCaseHeaders = array_map([$this, 'formatHeader'], $caseHeaders);
                                $output[] = array_fill(0, count($row), ''); // Add an empty row
                                $output[] = array_merge(array_fill(0, count($row), ''), $formattedCaseHeaders); // Add formatted case headers
                                $this->headerIndexes[] = count($output); // Track header row index
                                $soeUcFormCalculation = true;
                            }
                            foreach ($value as $soeCalculations) {
                                $caseArray = $this->flattenCaseArray($soeCalculations);
                                $output[] = array_merge(array_fill(0, count($row), ''), $caseArray);
                            }
                        } else {
                            $outputRow[$key] = $value;
                        }
                    }
                    $output[] = $outputRow;
                    $output[] = array_fill(0, count($outputRow), ''); // Add an empty row for separation if needed
                }
            }
        }
        $this->collection = collect($output);
    }

    private function formatHeader($key)
    {
        return ucwords(str_replace('_', ' ', $key));
    }

    private function flattenCaseArray($soeCalculations)
    {
        $caseArray = [];
        if (is_array($soeCalculations)) {
            foreach ($soeCalculations as $caseKey => $soeCalculation) {
                $caseArray[$caseKey] = $soeCalculation;
            }
        }
        return $caseArray;
    }

    public function collection()
    {
        return $this->collection;
    }

    public function styles(Worksheet $sheet)
    {
        foreach ($this->headerIndexes as $headerIndex) {
            $sheet->getStyle('A' . $headerIndex . ':' . $sheet->getHighestColumn() . $headerIndex)->applyFromArray([
                'font' => [
                    'bold' => true,
                    'color' => ['argb' => 'FF000000'], // Black color
                ],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => [
                        'argb' => 'FFFFFF00', // Yellow color
                    ]
                ]
            ]);
        }
    }
}
