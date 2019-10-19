<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CopyDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'copy:database';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Copy old database to new ';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //Tables name in old database and names in new database
        $tables = [
            'roof_admin'            =>  'admins',
            'roof_admin_meta'       =>  'admin_metas',
            'roof_admin_profile'    =>  'admin_profiles',
            'roof_assign_report'    =>  'assign_reports',
            'roof_block'            =>  'blocks',
            'roof_comment'          =>  'comments',
            'roof_contact_us'       =>  'contact_us',
            'roof_email_template'   =>  'email_templates',
            'roof_gallery_photo'    =>  'gallery_photos',
            'roof_gallery'          =>  'galleries',
            'roof_history_bricks'   =>  'history_bricks',
            'roof_node'             =>  'nodes',
            'roof_nodemeta'         =>  'node_metas',
            'roof_node_resource'    =>  'node_resources',
            'roof_order'            =>  'orders',
            'roof_package'          =>  'packages',
            'roof_profile'          =>  'profiles',
            'roof_promo_code'       =>  'promocodes',
            'roof_recoveryemail'    =>  'recovery_emails',
            'roof_report'           =>  'reports',
            'roof_report_file'      =>  'report_files',
            'roof_resource'         =>  'resources',
            'roof_settings'         =>  'settings',
            'roof_state'            =>  'states',
            'roof_status_order'     =>  'status_orders',
            'roof_subscriber'       =>  'subscribers',
            'roof_term'             =>  'terms',
            'roof_term_relationship'=>  'term_relationships',
            'roof_user'             =>  'users',
            'roof_usermeta'         =>  'user_metas',
            'roof_user_emails'      =>  'user_emails',
            'roof_vocabulary'       =>  'vocabularies',
        ];

        // foreach($tables as $old_name=>$new_name){
            $data = DB::connection('mysql2')->table('roof_promo_code')->get();
       
            foreach ($data as $_data){
                $array = (array) $_data;
                // if(array_key_exists('billing_cardyear', $array)){
                //     $array['billing_cardyear'] = Carbon::createFromDate($array['billing_cardyear'],1,1);
                    
                // }
                // if(array_key_exists('end_date', $array)){
                //     $array['end_date'] = Carbon::create('2000', '01', '01');
                // }
                DB::table('promocodes')->updateOrInsert($array, $array);
            }
        // }
       
    }
}
