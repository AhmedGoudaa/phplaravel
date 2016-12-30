<?php

function flash($message)
{
    Session::flash('status',$message);
}