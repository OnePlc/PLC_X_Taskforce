--
-- Base Table
--
CREATE TABLE `taskforce` (
  `Taskforce_ID` int(11) NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `taskforce`
  ADD PRIMARY KEY (`Taskforce_ID`);

ALTER TABLE `taskforce`
  MODIFY `Taskforce_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Permissions
--
INSERT INTO `permission` (`permission_key`, `module`, `label`, `nav_label`, `nav_href`, `show_in_menu`) VALUES
('add', 'OnePlace\\Taskforce\\Controller\\TaskforceController', 'Add', '', '', 0),
('edit', 'OnePlace\\Taskforce\\Controller\\TaskforceController', 'Edit', '', '', 0),
('index', 'OnePlace\\Taskforce\\Controller\\TaskforceController', 'Index', 'Taskforces', '/taskforce', 1),
('list', 'OnePlace\\Taskforce\\Controller\\ApiController', 'List', '', '', 1),
('view', 'OnePlace\\Taskforce\\Controller\\TaskforceController', 'View', '', '', 0),
('dump', 'OnePlace\\Taskforce\\Controller\\ExportController', 'Excel Dump', '', '', 0),
('index', 'OnePlace\\Taskforce\\Controller\\SearchController', 'Search', '', '', 0);

--
-- Form
--
INSERT INTO `core_form` (`form_key`, `label`, `entity_class`, `entity_tbl_class`) VALUES
('taskforce-single', 'Taskforce', 'OnePlace\\Taskforce\\Model\\Taskforce', 'OnePlace\\Taskforce\\Model\\TaskforceTable');

--
-- Index List
--
INSERT INTO `core_index_table` (`table_name`, `form`, `label`) VALUES
('taskforce-index', 'taskforce-single', 'Taskforce Index');

--
-- Tabs
--
INSERT INTO `core_form_tab` (`Tab_ID`, `form`, `title`, `subtitle`, `icon`, `counter`, `sort_id`, `filter_check`, `filter_value`) VALUES ('taskforce-base', 'taskforce-single', 'Taskforce', 'Base', 'fas fa-cogs', '', '0', '', '');

--
-- Buttons
--
INSERT INTO `core_form_button` (`Button_ID`, `label`, `icon`, `title`, `href`, `class`, `append`, `form`, `mode`, `filter_check`, `filter_value`) VALUES
(NULL, 'Save Taskforce', 'fas fa-save', 'Save Taskforce', '#', 'primary saveForm', '', 'taskforce-single', 'link', '', ''),
(NULL, 'Edit Taskforce', 'fas fa-edit', 'Edit Taskforce', '/taskforce/edit/##ID##', 'primary', '', 'taskforce-view', 'link', '', ''),
(NULL, 'Add Taskforce', 'fas fa-plus', 'Add Taskforce', '/taskforce/add', 'primary', '', 'taskforce-index', 'link', '', ''),
(NULL, 'Export Taskforces', 'fas fa-file-excel', 'Export Taskforces', '/taskforce/export', 'primary', '', 'taskforce-index', 'link', '', ''),
(NULL, 'Find Taskforces', 'fas fa-searh', 'Find Taskforces', '/taskforce/search', 'primary', '', 'taskforce-index', 'link', '', ''),
(NULL, 'Export Taskforces', 'fas fa-file-excel', 'Export Taskforces', '#', 'primary initExcelDump', '', 'taskforce-search', 'link', '', ''),
(NULL, 'New Search', 'fas fa-searh', 'New Search', '/taskforce/search', 'primary', '', 'taskforce-search', 'link', '', '');

--
-- Fields
--
INSERT INTO `core_form_field` (`Field_ID`, `type`, `label`, `fieldkey`, `tab`, `form`, `class`, `url_view`, `url_list`, `show_widget_left`, `allow_clear`, `readonly`, `tbl_cached_name`, `tbl_class`, `tbl_permission`) VALUES
(NULL, 'text', 'Name', 'label', 'taskforce-base', 'taskforce-single', 'col-md-3', '/taskforce/view/##ID##', '', 0, 1, 0, '', '', '');

--
-- User XP Activity
--
INSERT INTO `user_xp_activity` (`Activity_ID`, `xp_key`, `label`, `xp_base`) VALUES
(NULL, 'taskforce-add', 'Add New Taskforce', '50'),
(NULL, 'taskforce-edit', 'Edit Taskforce', '5'),
(NULL, 'taskforce-export', 'Edit Taskforce', '5');

COMMIT;