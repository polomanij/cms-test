<?php
/**
 * List routes
 */

$this->router->add('login', '/cms-test/admin/login/', 'LoginController:form');
$this->router->add('auth-admin', '/cms-test/admin/auth/', 'LoginController:authAdmin', 'POST');
$this->router->add('dashboard', '/cms-test/admin/', 'DashboardController:index');