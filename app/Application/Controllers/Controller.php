<?php
declare(strict_types=1);

namespace App\Application\Controllers;

use App\Common\Helper;
use App\Models\BaseModel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Validation\ValidationException;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

/**
 * @OA\Info(title="GameStore", version="1.0")
 */

class Controller extends BaseController
{
        
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

}
