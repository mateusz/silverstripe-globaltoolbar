<?php

class GlobalNavControllerExtension extends DataExtension {

	public function onBeforeInit() {
		$host = GlobalNavSiteTreeExtension::get_toolbar_hostname();
		if (
				(isset($_REQUEST['regenerate_nav']) || isset($_REQUEST['flush'])) && 
				$host == Director::absoluteBaseURL() && 
				(Permission::check('ADMIN') || Director::isDev())
			) {
			
				GlobalNavSiteTreeExtension::create_nav();
		}
	}
}
