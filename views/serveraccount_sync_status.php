<?php
##
## Copyright 2013-2017 Opera Software AS
##
## Licensed under the Apache License, Version 2.0 (the "License");
## you may not use this file except in compliance with the License.
## You may obtain a copy of the License at
##
## http://www.apache.org/licenses/LICENSE-2.0
##
## Unless required by applicable law or agreed to in writing, software
## distributed under the License is distributed on an "AS IS" BASIS,
## WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
## See the License for the specific language governing permissions and
## limitations under the License.
##

try {
	$server = $server_dir->get_server_by_hostname($router->vars['hostname']);
	$account = $server->get_account_by_name($router->vars['account']);
} catch(ServerAccountNotFoundException $e) {
	require('views/error404.php');
	die;
} catch(ServerNotFoundException $e) {
	require('views/error404.php');
	die;
}
$page = new PageSection('serveraccount_sync_status_json');
$page->set('sync_status', $account->sync_status);
$page->set('pending', $account->sync_is_pending());
header('Content-type: application/json; charset=utf-8');
echo $page->generate();
