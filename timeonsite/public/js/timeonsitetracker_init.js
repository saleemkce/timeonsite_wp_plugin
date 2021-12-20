/**@preserve
 * Init code for TimeOnSiteTracker.js
 * Find all possible config options: https://saleemkce.github.io/timeonsite/docs/index.html
 */

var config = {
    trackBy: 'seconds',
    developerMode: true,
    request: { // presence of request object denotes that data is to be saved in local storage and processed on subsequent page access
        url: window.location.protocol +'//'+ window.location.hostname + '/wp-admin/visual/backend/php/timeonsite.php',
        headers: [
            // optional headers if any
        ]
    }
};
var Tos = new TimeOnSiteTracker(config);