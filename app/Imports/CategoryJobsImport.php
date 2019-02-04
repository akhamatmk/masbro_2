<?php

namespace App\Imports;

use App\Models\CategoryJobs;
use App\Models\CategoryParentJob;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class CategoryJobsImport implements ToCollection 
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {        
        foreach ($rows as $row) 
        {     
            if($row[0] != null)
            {
                $parentName = strtolower(trim($row[0]));
                $parent = CategoryParentJob::whereRaw('Lower(name)', $parentName)->first();
                if(! $parent)
                {
                    $parent = new CategoryParentJob;
                    $parent->name = $row[0];
                    $parent->save();
                }

                if($row[2] != "")
                {
                    $CategoryJobs = new CategoryJobs;
                    $CategoryJobs->name = (string) $row[1];
                    $CategoryJobs->category_parent_job_id = $parent->id;
                    $CategoryJobs->meta_search = (string) $row[2];
                    $CategoryJobs->save();
                }                
            }            
        }
 
    }
}
