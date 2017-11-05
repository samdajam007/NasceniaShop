<?php defined('BASEPATH') OR exit('No direct script access allowed');

use \Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class User
 */
class User extends Eloquent
{

    public $timestamps = false; // table name
    protected $table = "np_users";
    private $_data = array();

    /**
     * @param $data
     * @return int
     */
    public function validate($data)
    {
        $username = $this::where('username', $data['username'])->first();

        if (count($username) == 1) {
            $pass_db = $username->password;
            $pass_post = hash('sha512', $data['password']);

            if (strcasecmp($pass_db, $pass_post) == 0) {
                // we not need password to store in session
                unset($username->password);
                /** @noinspection PhpUndefinedMethodInspection */
                $this->_data = $username->toArray();
                return ERR_NONE;
            }
            return ERR_INVALID_PASSWORD;
        } else {
            return ERR_INVALID_USERNAME;
        }
    }

    /**
     * @return array
     */
    public function get_data()
    {
        return $this->_data;
    }

}