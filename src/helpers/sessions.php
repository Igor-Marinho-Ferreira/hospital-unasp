<?php
/**
 * Its responsible for set a new index in $_SESSION
 *
 * @param string $key
 * @param mixed $value
 * @param boolean $override
 * @return mixed
 */
function setSession(string $key, $value, $override = false)
{
    if (!isset($_SESSION[$key]) or $override) {
        $_SESSION[$key] = $value;
        return $_SESSION[$key];
    }
    return null;
}


/**
 * Its responsible for get a session from $_SESSION
 *
 * @param string $key
 * @return mixed
 */
function getSession(string $key)
{
    if (isset($_SESSION[$key]))
        return $_SESSION[$key];
    else
        return null;
}

/**
 * Its responsible for forget a session from $_SESSION
 *
 * @param string $key
 * @return void
 */
function unsetSession(string $key)
{
    if (isset($_SESSION[$key]))
        unset($_SESSION[$key]);
}


/**
 * Its responsible for get a session from index 'old'
 *
 * @param string $key
 * @return mixed
 */
function old(string $key)
{
    if (isset($_SESSION['old']) and isset($_SESSION['old'][$key]))
        return $_SESSION['old'][$key];

    return null;
}



/**
 * Its responsible for return if an index exist in 'isWrong' from $_SESSION
 *
 * @param string $key
 * @return mixed
 */
function isWrong(string $key)
{
    $sessionIsWrong = isset($_SESSION['isWrong']);
    if (!$sessionIsWrong)
        return null;
    else
        return isset($_SESSION['isWrong'][$key]);
}

/**
 * Its responsible for return a text from 'isWrong' in $_SESSION
 *
 * @param string $key
 * @return mixed
 */
function isWrongText(string $key)
{
    $sessionIsWrong = isset($_SESSION['isWrong']);
    if (!$sessionIsWrong)
        return null;
    else
        return isset($_SESSION['isWrong'][$key]) ? $_SESSION['isWrong'][$key] : null;
}


/**
 * Its responsible for forget multiples sessions
 *
 * @param array $sessions
 * @return void
 */
function forgetSessions($sessions = [])
{
    foreach ($sessions as $index => $session)
        if (isset($_SESSION[$session])) unset($_SESSION[$session]);
}

/**
 * Its responsible for return 'is-invalid' or 'is-valid' when isWrong contais a key
 *
 * @param string $key
 * @return mixed
 */
function applyWrong(string $key)
{
    if (getSession('isWrong')) {
        $keyWrong = isWrong($key) ? 'is-invalid' : 'is-valid';
        return $keyWrong;
    }
    return null;
}

/**
 * Its responsible for return the text from isWrongText
 *
 * @param string $key
 * @return mixed
 */
function applyWrongText(string $key)
{
    if (getSession('isWrong'))
        return isWrongText($key);
    return null;
}

/**
 * Its verify if session 'old' exists
 *
 * @return boolean
 */
function hasOld()
{
    return getSession('old');
}

/**
 * Its apply old in checkbox simple
 *
 * @param string $key
 * @return void
 */
function applyOldCheck(string $key)
{
    $isChecked = '';
    if (hasOld())
        $isChecked = old($key) ? 'checked' : '';
    else
        $isChecked = 'checked';
    return $isChecked;
}


/**
 * Its apply old in simple select
 *
 * @param mixed $value
 * @param string $key
 * @return mixed
 */
function applyOldSelectSimple($value, $key)
{
    if (!hasOld())
        return null;
    else
        return ($value == old($key)) ? 'selected' : '';
}

/**
 * Its responsible for apply old in input
 *
 * @param string $key
 * @return mixed
 */
function applyOldInput(string $key)
{
    if (hasOld())
        return old($key);
    else
        return null;
}
