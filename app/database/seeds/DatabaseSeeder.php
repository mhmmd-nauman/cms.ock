<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('SentryGroupSeeder');
		$this->call('SentryUserSeeder');
		$this->call('SentryUserGroupSeeder');
                $this->call('PageSeeder');
	}

}
class PageSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('pages')->delete();
		Page::create(array(
	        'heading1'        => '<h2 class="red-title"><span>Driving Network Solution</span></h2>',
                'body1'        => '<p>Established in 2000, OCK Group is principally involved in the provision of telecommunications network services. We are able to provide full turnkey services in that respect.</p>',
                'heading2'        => '',
                'body2'        => '',    
	        ));
		
	}
}
class MontagesSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('montages')->delete();
		Page::create(array(
	        'title'         => 'Montages Title',
                'status'        => 'Montages Status',
                'Banner'        => 'Montages Banner',
                'MoreStatus'    => 'Montages More Status', 
                'url'           => 'Website url',
	        ));
		
	}
}
class CareersSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('careers')->delete();
		Page::create(array(
	        'jobtitle'         => 'New Job Title',
                'status'        => 'Job Status',
                'date'        => 'Job Date',
                'responsibilities'    => 'Job Responsibilities', 
                'requirements'           => 'Job requirements',
                'footertext'           => 'footer text',
	        ));
		
	}
}



class SentryGroupSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('groups')->delete();
		Sentry::getGroupProvider()->create(array(
	        'name'        => 'Users',
	        'permissions' => array(
	            'admin' => 0,
	            'users' => 1,
	        )));
		Sentry::getGroupProvider()->create(array(
	        'name'        => 'Admins',
	        'permissions' => array(
	            'admin' => 1,
	            'users' => 1,
	        )));
	}
}
class SentryUserGroupSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('users_groups')->delete();
		$userUser = Sentry::getUserProvider()->findByLogin('user@user.com');
		$adminUser = Sentry::getUserProvider()->findByLogin('admin@admin.com');
		$userGroup = Sentry::getGroupProvider()->findByName('Users');
		$adminGroup = Sentry::getGroupProvider()->findByName('Admins');
                // Assign the groups to the users
                $userUser->addGroup($userGroup);
                $adminUser->addGroup($userGroup);
                $adminUser->addGroup($adminGroup);
	}
}
class SentryUserSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('users')->delete();
		Sentry::getUserProvider()->create(array(
	        'email'    => 'admin@admin.com',
	        'password' => 'sentryadmin',
	        'activated' => 1,
	    ));
	    Sentry::getUserProvider()->create(array(
	        'email'    => 'user@user.com',
	        'password' => 'sentryuser',
	        'activated' => 1,
	    ));
	}
}
