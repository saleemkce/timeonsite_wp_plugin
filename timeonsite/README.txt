=== Timeonsite ===
Contributors: saleemkce
Tags: ,time-on-page,time-on-site,blog-popularity,analytics,tracker
Donate link: https://www.paypal.com/paypalme/saleemkce/10usd
Requires at least: 5.1
Tested up to: 5.8.2
Requires PHP: 5.0
Stable tag: 1.0.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Track how much time users spend in each blog accurately (Time-on-page). A Free, Must-Have plugin for your WordPress Site!

== Description ==
* Tracks webpage time-spent duration & blog popularity accurately
* Options to customize the way you track the pages like authenticated users or anonymous
* Tracks TOS data in Web and Mobile browsers efficiently
* Timeonsitetracker.js is opened up free to all Wordpress sites; measure your content significance with an easy-to-use dashboard. (Though timeonsitetracker.js snippet alone is commercial, it's free exclusively for all Wordpress sites for the love of WP ecosystem starting from **2021 Christmas & New Year Gift!**)
* Additional benefits: tracking the **pageviews**, user-type, **user's page traversal order**, **exact entry & exit pages**, popular pages, insignificant pages are all added advantages along with **accurate page visit length** when using this plugin
* You own the whole analytics data yourself. It's secure & ensures privacy!  

== Installation ==
Steps to access and view your blog pages popularity

1, [**usual**] Download and install this wordpress plugin "**timeonsite**"
(Plugin folder path: timeonsite\pubic\js\timeonsitetracker_init.js contains...)
`
url: window.location.protocol +'//'+ window.location.hostname + '/wp-admin/visual/backend/php/timeonsite.php',
`
It auto-sets your domain name to save the captured data. Just verify once post installation; should be correct by default. In case of issues, just adjust path later on.

2, [**download, edit & upload folder**] Upload the free PHP dashboard for viewing blog popularity named "**visual**", [https://github.com/saleemkce/visual/archive/refs/heads/master.zip](https://github.com/saleemkce/visual/archive/refs/heads/master.zip) from Github as is. Rename folder **visual-master** to **visual**; Upload the **visual**\ folder after downloading it from this Github link given here. Remember this step is very important because it contains the PHP code to save the time on site data captured in your website and display it as nice dashboard view for you. Upload it to **wp-admin**\ folder since you would want to restrict public access to the dashboard area. So, it's quite secure to upload it here for the time being, but you can change it to some other location later on if you wish so

* **Before uploading the "visual" folder inside "wp-admin\" folder.......** 

(Update the lines as given below)
a, **visual\backend\php\database.php** (Update/Verify if the credentials matches your default Wordpress DB name, host & password)

b, **visual\config\config.js** (Update the **YOUR_DOMAIN_URL.com** with your actual URL to point it to correct location as given here provided you are using **wp-admin**\ folder for upload)
`
php: {
	reports: {
		url: 'http://YOUR_DOMAIN_URL.com/wp-admin/visual/backend/php/datatable_reports.php',
	},

	analytics: {
		url: 'http://YOUR_DOMAIN_URL.com/wp-admin/visual/backend/php/analytics.php',
	},

	syncData: {
		url: 'http://YOUR_DOMAIN_URL.com/wp-admin/visual/backend/php/refresh.php',
	}
},
`

3, [**refresh your website few times**] Refresh your actual website few times and check if you send data to our visual dashboard as input correctly. You can look at "**Network**" tab in browser console to verify it. If you got any URL location errors, adjust the URL you gave in **step 2**. If set correctly, now it's time to view blog popularity dashboard.

4, [**view Dashboard**] Go to wp-admin panel and look for "**Time-on-site Dashboard**" menu link in the left sidebar. Just click it and view the reports.

== Frequently Asked Questions ==
= How to use time on site tracker or update my integration? =
Please visit the [docs page](https://saleemkce.github.io/timeonsite/docs/index.html). If you need addtional support, raise a ticket in [Github's project page](https://github.com/saleemkce/timeonsite) or raise a question in Stackoverflow

== Screenshots ==
1. Detailed time-on-site analytics dashboard
2. Session-wise reporting dashboard
3. Time on site advantages in analytics
4. Time on site capture example by pages
5. Details page visit duration

== Changelog ==
1.0.0
* Initial release

== Upgrade Notice ==
1.0.0
* Initial release