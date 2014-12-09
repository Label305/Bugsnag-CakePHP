<?php

Bugsnag::register( Configure::read('Bugsnag.apiKey') );

/**
 * The Bugsnag Error will handle erros and exceptions and send them to bugsnag.
 * after sending errors to Bugsnag it will call the regular ErrorHandler and handle
 * errors the regular way.
 */
class BugsnagError extends ErrorHandler
{
    public static function handleError($code, $description, $file = null, $line = null, $context = null)
    {
        Bugsnag::errorHandler($code, $description, $file, $line, $context);
        return parent::handleError($code, $description, $file, $line, $context);
    }

    public static function handleException(Exception $exception)
    {
        Bugsnag::exceptionHandler($exception);
        return parent::handleException($exception);
    }
}