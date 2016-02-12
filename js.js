/*
 * NOTICE OF LICENSE
 *
 * This source file is licensed exclusively to Inovia Team.
 *
 * @copyright   Copyright (c) 2016 Inovia Team (http://www.inovia.fr)
 * @license     All rights reserved
 * @author      The Inovia Dev Team
 */
(function () {
    'use strict';

    angular.module('MobileApps')
        .run(['LegacyProjectService', 'NavBarNavigationService', function (LegacyProjectService, NavBarNavigationService) {
            LegacyProjectService.mobileApps = {
                setMenuUrl: function (url) {
                    NavBarNavigationService.setMenuUrl(url);
                }
            };
        }]);
})();
