<?php
/**
 * Created by RAPIDE Internet.
 * User: heppi_000
 * Date: 24-4-2015
 * Time: 13:29
 */

namespace mamorunl\AdminCMS\Navigation\Models;


use Illuminate\Database\Eloquent\Model;

class Page extends Model {
    protected $table = "cms_pages";

    protected $fillable = [
        'name',
        'template_name',
        'template_data',
        'node_id'
    ];
}