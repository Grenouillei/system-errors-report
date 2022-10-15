<?php
/**
 * Created by PhpStorm.
 * User: Develooper
 * Date: 21.12.2019
 * Time: 10:01
 */

namespace App\Models\Filters\Report;

use App\Models\Report;
use App\Services\Filters\BaseSearch;

class ReportSearch
{
    const MODEL = Report::class;
    use BaseSearch;
}
