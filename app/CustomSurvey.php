<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomSurvey extends Model
{
    use HasFactory;

    protected $table = "customsurvey";
    protected $hidden = array(
        'id',
        'user_id',
        
        'export_packagesboxes',
        'export_packagesboxes_where',
        'export_packagesboxes_weight',
        'export_packagesboxes_permonth',

        'import_packagesboxes',
        'import_packagesboxes_where',
        'import_packagesboxes_weight',
        'import_packagesboxes_permonth',

        'other_depts_sending_shipments',
        'need_100kilos_shipment',
        'need_100kilos_shipment_to_where',
        'need_100kilos_shipment_to_weight',
        'need_100kilos_shipment_to_permonth',
        'need_100kilos_shipment_from_where',
        'need_100kilos_shipment_from_weight',
        'need_100kilos_shipment_from_permonth',

        'updated_at'
    );

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'company_name',
        'business_nature',
        'call_disposition',
        'contacted',
        'export_document',
        'export_document_where',
        'export_document_weight',
        'export_document_permonth',
        'export_packagesboxes',
        'export_packagesboxes_where',
        'export_packagesboxes_weight',
        'export_packagesboxes_permonth',
        'import_document',
        'import_document_where',
        'import_document_weight',
        'import_document_permonth',
        'import_packagesboxes',
        'import_packagesboxes_where',
        'import_packagesboxes_weight',
        'import_packagesboxes_permonth',
        'who_pays_exportimport',
        'shipment_contents',
        'who_deals_send_docsparcel',
        'other_depts_sending_shipments',
        'need_100kilos_shipment',
        'need_100kilos_shipment_to_where',
        'need_100kilos_shipment_to_weight',
        'need_100kilos_shipment_to_permonth',
        'need_100kilos_shipment_from_where',
        'need_100kilos_shipment_from_weight',
        'need_100kilos_shipment_from_permonth',
        'who_you_using_shipping',
        'contact_name',
        'contact_phone',
        'contact_email',
        'contact_current_address',
        'any_info_shipping',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
