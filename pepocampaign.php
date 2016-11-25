<?php
class pepocampaign
{
    private $pepo_key;
    private $pepo_secret;
    private $pepo_url;
    private $list;

    function __construct(){
        //date_default_timezone_set('America/Los_Angeles');

        $this->pepo_key = 'change-me';
        $this->pepo_secret = 'change-me';
        $this->pepo_url = 'https://pepocampaigns.com';
    }

    public function set_list($list_id){
        $this->list = $list_id;
    }

    /*
     * Create new list
     * $atributes Array
     * atributes
     *  name: List name
     *  source: Description about how contacts joined the list
     */
    public function create_list($atributes){

        $current_date = strtotime(date('Y-m-d H:i:s'));

        $url = '/api/v1/list/create/';
        $request_time = date("c", $current_date);
        $delimiter = '::';

        $signature = $this->generate_signature($this->pepo_secret, $url.$delimiter.$request_time);
        $fields = array(
            'request-time' => urlencode($request_time),
            'signature' => urlencode($signature),
            'api-key' => urlencode($this->pepo_key),
            'name' => urlencode($atributes['name']),
            'source' => urlencode($atributes['source'])
        );

        $fields_string = '';
        foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
        rtrim($fields_string, '&');

        $result = $this->execute_curl($fields);

        return $result;
    }

    /*
     * Add contact to list
     * $atributes Array
     * atributes
     *  email: Email to be added to the list
     *  first_name: User first name
     *  last_name: User last name
     */
    public function add_contact_to_list($atributes){

        $current_date = strtotime(date('Y-m-d H:i:s'));

        $url = '/api/v1/list/'.$this->list.'/add-contact/';
        $request_time = date("c", $current_date);
        $delimiter = '::';

        $signature = $this->generate_signature($this->pepo_secret, $url.$delimiter.$request_time);
        $fields = array(
            'request-time' => urlencode($request_time),
            'signature' => urlencode($signature),
            'api-key' => urlencode($this->pepo_key),
            'email' => urlencode($atributes['email']),
            'attributes[First Name]' => urlencode($atributes['first_name']),
            'attributes[Last Name]' => urlencode($atributes['last_name'])
        );

        $fields_string = '';
        foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
        rtrim($fields_string, '&');

        $result = $this->execute_curl($fields);

        return $result;
    }

    /*
     * Remove contact from list
     * $atributes Array
     * atributes
     *  email: Email to be removed from the list.
     */
    public function remove_contact_from_list($atributes){

        $current_date = strtotime(date('Y-m-d H:i:s'));

        $url = '/api/v1/list/'.$this->list.'/remove-contact/';
        $request_time = date("c", $current_date);
        $delimiter = '::';

        $signature = $this->generate_signature($this->pepo_secret, $url.$delimiter.$request_time);
        $fields = array(
            'request-time' => urlencode($request_time),
            'signature' => urlencode($signature),
            'api-key' => urlencode($this->pepo_key),
            'email' => urlencode($atributes['email'])
        );

        $result = $this->execute_curl($fields);

        return $result;

    }

    /*
     * Change user status
     * $atributes Array
     * atributes
     *  email: Email to be removed from the list.
     *  type: The status to be updated
     */
    public function change_user_status($atributes){

        $current_date = strtotime(date('Y-m-d H:i:s'));

        $url = '/api/v1/list/'.$this->list.'/remove-contact/';
        $request_time = date("c", $current_date);
        $delimiter = '::';

        $signature = $this->generate_signature($this->pepo_secret, $url.$delimiter.$request_time);
        $fields = array(
            'request-time' => urlencode($request_time),
            'signature' => urlencode($signature),
            'api-key' => urlencode($this->pepo_key),
            'email' => urlencode($atributes['email']),
            'type' => urlencode($atributes['type'])
        );

        $result = $this->execute_curl($fields);

        return $result;

    }

    private function execute_curl($fields){

        $fields_string = '';
        foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
        rtrim($fields_string, '&');

        $ch = curl_init();
        $url= $this->pepo_url;
        curl_setopt( $ch,CURLOPT_URL, $url );
        curl_setopt( $ch,CURLOPT_POST, count($fields) );
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        $result = curl_exec($ch );
        curl_close( $ch );

        return $result;
    }

    private function generate_signature($api_secret, $signature){
        return hash_hmac('sha256', $signature, $api_secret, false);
    }

}