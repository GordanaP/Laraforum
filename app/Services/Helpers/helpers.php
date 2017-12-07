<?php

function set_selected($current, $selected)
{
    return $current == $selected ? 'selected' : '';
}

function set_filter($key, $value)
{
    return "$key=$value";
}
