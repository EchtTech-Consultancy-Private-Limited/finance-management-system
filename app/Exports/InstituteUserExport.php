<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;

class InstituteUserExport implements FromCollection
{
    use Exportable;

    private $collection;

    public function __construct($arrays)
    {
        $output = [];
        $headerAdded = false; // Flag to track whether the header row has been added

        foreach ($arrays as $array) {
            if (!empty($array) && isset($array[0])) {
                foreach ($array as $row) {
                    unset($row['deleted_at'], $row['updated_at']);
                    if (!$headerAdded) {
                        $output[] = array_keys($row); // Add header row only if not already added
                        $headerAdded = true;
                    }

                    $outputRow = [];
                    foreach ($row as $key => $value) {                        
                        if ($key === 'states') {
                            $outputRow[$key] = $value['name'];
                        } elseif ($key === 'soe_uc_form_calculation') {
                            foreach ($value as $soeCalculation) {
                                // Remove 'created_at' and 'updated_at' keys from each row
                                unset($soeCalculation['created_at'], $soeCalculation['updated_at'],$soeCalculation['id']);
                                $emptyRow = array_fill(0, count($row), ''); // Create an empty row
                                    $emptyRow['soe_uc_form_calculation'] = implode(', ',$soeCalculation); // Add soe_uc_form_calculation data
                                    $output[] = $emptyRow;
                                // Add empty row with soe_uc_form_calculation data
                            }
                            continue; // Skip adding soe_uc_form_calculation data to main row
                        } else {
                            $outputRow[$key] = $value;
                        }
                    }
                    $output[] = $outputRow;
                    $output[] = ['']; // Add empty row after each entry
                }
            }
        }
        $this->collection = collect($output);
    }



    public function collection()
    {
        return $this->collection;
    }
}
