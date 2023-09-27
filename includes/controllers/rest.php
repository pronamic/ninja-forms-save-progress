<?php if ( ! defined( 'ABSPATH' ) ) exit;

final class NF_SaveProgress_Controller_REST
{
    public function __construct()
    {
        add_action( 'rest_api_init', array( $this, 'register_routes' ) );
    }

    public function register_routes()
    {
        register_rest_route( 'ninja-forms-save-progress/v1', '/save', array(
            'methods' => 'POST',
            'callback' => array( $this, 'save_form' ),
            'args' => array(
                'form_id' => [
                    'required' => true
                ],
                'save_id' => [
                    'required' => true
                ],
                'fields' => [
                    'required' => true
                ],
            ),
            'permission_callback' => array($this,'check_save_id' ),
        ) );

        register_rest_route( 'ninja-forms-save-progress/v1', '/saves/(?P<form_id>\d+)', array(
            'methods' => 'GET',
            'callback' => array( $this, 'get_form_saves' ),
            'permission_callback' => 'is_user_logged_in'
        ) );
    }

    /*
    |--------------------------------------------------------------------------
    | Route Callbacks
    |--------------------------------------------------------------------------
    */

    public function save_form( WP_REST_Request $request )
    {
        $user_id = get_current_user_id();

        $form_id = $request->get_param( 'form_id' );
        $fields = $request->get_param( 'fields' );

        /* Render Instance Fix */
        if(strpos($form_id, '_')){
            list($form_id) = explode('_', $form_id);

            $updated_fields = array();
            foreach($fields as $field_id => $field ){
                list($field_id) = explode('_', $field_id);
                list($field['id']) = explode('_', $field['id']);
                $updated_fields[$field_id] = $field;
            }
            $fields = $updated_fields;
        }
        /* END Render Instance Fix */

        $data = array(
            'form_id' => $form_id,
            'fields'  => $fields,
            'updated' => time()
        );

        $save_id = $request->get_param( 'save_id' );

        if( $save_id ){
            global $wpdb;
            $query = "SELECT `meta_value` FROM $wpdb->usermeta WHERE `umeta_id` = %d";
            $previous = $wpdb->get_var( $wpdb->prepare( $query , $save_id ) );
        }

        if( $save_id && isset( $previous ) ){
            return update_user_meta( $user_id, 'form_save_' . $data[ 'form_id' ], json_encode( $data ), $previous );
        }

        return add_user_meta( $user_id, 'form_save_' . $data[ 'form_id' ], json_encode( $data ) );
    }

    public function get_form_saves( $data )
    {
        $user_id = get_current_user_id();
        $form_id = absint( $data[ 'form_id' ] );

        $saves = NF_SaveProgress()->saves()->get( apply_filters('nf_save_progress_get_form_saves_where', compact( 'user_id', 'form_id' ), $user_id, $form_id, $data ) );

        /**
         * @param array $saves {
         *     @param array $save
         * }
         */
        $saves = apply_filters( 'nf_save_progress_get_form_saves', $saves, $user_id, $form_id, $data );

        return array( 'saves' => array_values( $saves ) );
    }


    /**
     * Checks if the save_id param is owned by user making request
     *
     * @param WP_REST_Request $request
     * @return bool
     */
    public function check_save_id( WP_REST_Request $request ){
        if( current_user_can( 'manage_options' ) ) {
            return true;
        }
        global $wpdb;
        $save_id = $request->get_param( 'save_id' );
        //Get ID of user who saved this save id
        $query = "SELECT `user_id` FROM $wpdb->usermeta WHERE `umeta_id` = %d";
        $saved_user_id = $wpdb->get_var( $wpdb->prepare( $query , $save_id ) );
        //return true if its the same as current user id
        return absint( $saved_user_id ) === (int) get_current_user_id();
    }
}
