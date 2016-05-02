<?php
class BugsnagUtils {
    public static function createClient($options=array()) {
        $bugsnag = new \Bugsnag_Client(Configure::read('BugsnagCakephp.apikey'));
        $bugsnag->setBatchSending(false);
        $bugsnag->setNotifier(array(
            'name'    => 'Bugsnag CakePHP',
            'version' => '0.1.0',
            'url'     => 'https://github.com/Label305/bugsnag-cakephp'
        ));
        $bugsnag->setReleaseStage(Configure::read('BugsnagCakephp.releaseStage'));
        $bugsnag->setType("CakePHP");
        $filters = Configure::read('BugsnagCakephp.filters');
        if (!empty($filters)) {
            $bugsnag->setFilters($filters);
        }
        return $bugsnag;
    }
}