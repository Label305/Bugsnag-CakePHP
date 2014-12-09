<?php
/*   _            _          _ ____   ___  _____
 *  | |          | |        | |___ \ / _ \| ____|
 *  | |      __ _| |__   ___| | __) | | | | |__
 *  | |     / _` | '_ \ / _ \ ||__ <|  -  |___ \
 *  | |____| (_| | |_) |  __/ |___) |     |___) |
 *  |______|\__,_|_.__/ \___|_|____/ \___/|____/
 *
 *  Copyright Label305 B.V. All rights reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

Bugsnag::register( Configure::read('BugsnagCakephp.apikey') );

/**
 * @class BugsnagError
 *
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