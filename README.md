# axelerant_demo


1. A new form text field named "Site API Key" needs to be added to the "Site Information" form with the default value of “No API Key yet”.
File: axelerant_demo.module [https://github.com/prithirajroy/axelerant_demo/blob/main/axelerant_demo.module#L24]

2. When this form is submitted, the value that the user entered for this field should be saved as the system variable named "siteapikey".
File: axelerant_demo.module [https://github.com/prithirajroy/axelerant_demo/blob/main/axelerant_demo.module#L41]

3. A Drupal message should inform the user that the Site API Key has been saved with that value.
File: axelerant_demo.module [https://github.com/prithirajroy/axelerant_demo/blob/main/axelerant_demo.module#L42]

4. When this form is visited after the "Site API Key" is saved, the field should be populated with the correct value.
File: axelerant_demo.module [https://github.com/prithirajroy/axelerant_demo/blob/main/axelerant_demo.module#L27]

5. The text of the "Save configuration" button should change to "Update Configuration".
File: axelerant_demo.module [https://github.com/prithirajroy/axelerant_demo/blob/main/axelerant_demo.module#L30]

6. This module also provides a URL that responds with a JSON representation of a given node with the content type "page" only if the previously submitted API Key and a node id (nid) of an appropriate node are present, otherwise it will respond with "access denied".
File: AxelerantDemoController.php [https://github.com/prithirajroy/axelerant_demo/blob/main/src/Controller/AxelerantDemoController.php]

