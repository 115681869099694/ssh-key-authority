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

/**
* Class that represents a log event that was recorded in relation to a group
*/
class UserEvent extends EntityEvent {
	/**
	* Magic getter method - if group field requested, return Group object of the affected group.
	* @param string $field to retrieve
	* @return mixed data stored in field
	*/
	public function &__get($field) {
		switch($field) {
		case 'user':
			$user = new User($this->data['entity_id']);
			return $user;
		default:
			return parent::__get($field);
		}
	}
}
