<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
       "/check-current-pwd", "/admin/check-current-pwd", "/admin/categories/update-category" ,"/admin/categories/store-category", "/admin/subcat", "/admin/update-subject-status","/admin/append-categories-level", 'admin/update-subject/{id}' , 'admin/test/destroy-test-all' ,"/admin/previous-subcategory"   ];
}
