<?php

/**
 * Check if there is the "Authentication" session
 * @return ?array session or null
 */
function IsLogged(): ?array
{
    return getSession(AUTHENTICATION_SESS);
}

/**
 * checks if the user is not logged in
 * @return void
 */
function administrativeIsntLoggedRedirect(): void
{
    if (!IsLogged())
        redirect(route(AUTH . AUTH_LOGIN_ADMINISTRATIVE));
}

/**
 * If the user is logged in, he will take to the informed route via parameter
 * @param string $module
 */
function administrativeIsLoggedRedirect(string $module)
{
    if (IsLogged())
        redirect(route($module));
}


/**
 * checks if the user is not logged in
 * @return void
 */
function patientIsntLoggedRedirect(): void
{
    if (!IsLogged())
        redirect(route(AUTH . AUTH_LOGIN_PATIENT));
}

/**
 * If the user is logged in, he will take to the informed route via parameter
 * @param string $module
 */
function patientIsLoggedRedirect(string $module)
{
    if (IsLogged())
        redirect(route($module));
}

/**
 * checks if the user is not logged in
 * @return void
 */
function medicalIsntLoggedRedirect(): void
{
    if (!IsLogged())
        redirect(route(AUTH . AUTH_LOGIN_MEDICAL));
}

/**
 * If the user is logged in, he will take to the informed route via parameter
 * @param string $module
 */
function medicalIsLoggedRedirect(string $module)
{
    if (IsLogged())
        redirect(route($module));
}

/**
 * Obtains some property of the authentication session
 * @param string $property
 * @return mixed
 */
function user(string $property): mixed
{
    if ($user = getSession(AUTHENTICATION_SESS))
        return $user[$property];

    return null;
}
