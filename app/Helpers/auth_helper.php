<?php

function isLoggedIn()
{
    return session()->has('id');
}

function getCurrentUserId()
{
    return session('user_id');
}

function login($data)
{
    session()->set('id', $data->id);
    session()->set('firstname', $data->firstname);
    session()->set('lastname', $data->lastname);
    session()->set('access_level_id',  $data->access_level_id);
}

function logout()
{
    session()->destroy();
}