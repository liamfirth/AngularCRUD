AngularCRUD
===========

AngularCRUD Laravel Bundle is a flexible CRUD (Create/Read/Update/Delete) bundle which allows a user to specify their own routes and auth, making it able to work your existing system.

What makes AngularCRUD special is that it uses the [Angular JS](http://www.angularjs.org "Angular JS") framework by Google. You will notice no page refreshes, everything will happen faster than your average CRUD system.

All that is required is that you add your configuration in bundles/angularcrud/config/tables.php and call `AngularCRUD::make('TABLE_NAME');`.

Everything else will comply with the configuration that you provided.