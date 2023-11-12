<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('alert'))
{
  function alert($msg = '')
  {
    $str = '<script type="text/javascript">alert("' . $msg . '");</script>';
    return $str;
  }
}