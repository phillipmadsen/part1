<?php
/**
 * Created by PhpStorm.
 * User: Phillip Madsen
 * Date: 7/11/2016
 * Time: 4:09 PM
 */

namespace App\Http;

/**
 * create a flash message
 *
 * @param string $title
 * @param string $message
 * @param string $level
 * @param string|null $key
 * @return void
 *
 */
class Flash
{
    /**
     * create a flash message
     * @param $title
     * @param $message
     * @param $level
     * @param $key
     */
    public function create($title, $message, $level, $key = 'flash_message')
    {
        session()->flash($key, [

            'title'   => $title,
            'message' => $message,
            'level'   => $level
        ]);
    }

    /**
     * create a info message
     * @param $title
     * @param $message
     * @return mixed
     */
    public function info($title, $message)
    {
        return $this->create($title, $message, 'info');
	    
    }

    /**
     * create a success message
     * @param $title
     * @param $message
     * @return mixed
     */
    public function success($title, $message)
    {
        return $this->create($title, $message, 'success');

    }

    /**
     * create a error message
     * @param $title
     * @param $message
     * @return mixed
     */
    public function error($title, $message)
    {
        return $this->create($title, $message, 'error');

    }

    /**
     * @param $title
     * @param $message
     * @param $level
     * @return mixed
     */
    public function overlay($title, $message, $level = 'success')
    {
        return $this->create($title, $message, $level, 'flash_message_overlay');

    }
}
