
-- --------------------------------------------------------
--
-- Дамп данных таблицы `data_types`
--

INSERT INTO `data_types` (`name`, `slug`, `display_name_singular`, `display_name_plural`, `icon`, `model_name`, `policy_name`, `controller`, `description`, `generate_permissions`, `server_side`, `details`, `created_at`, `updated_at`) VALUES
                                                                                                                                                                                                                                              ('infos', 'infos', 'Info', 'Infos', 'voyager-info-circled', 'App\\Models\\Info', NULL, '\\App\\Modules\\Admin\\Controllers\\VoyagerInfoController', NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2022-03-21 07:08:47', '2022-03-21 07:08:47'),
                                                                                                                                                                                                                                              ('article_types', 'article-types', 'Article Type', 'Article Types', 'voyager-list', 'App\\Models\\ArticleType', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-03-21 07:10:27', '2022-03-21 07:13:47'),
                                                                                                                                                                                                                                              ('articles', 'articles', 'Article', 'Articles', 'voyager-news', 'App\\Models\\Article', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-03-21 07:11:53', '2022-03-21 07:13:40'),
                                                                                                                                                                                                                                              ('categories', 'categories', 'Category', 'Categories', 'voyager-categories', 'App\\Models\\Category', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2022-03-21 07:15:50', '2022-03-21 07:15:50'),
                                                                                                                                                                                                                                              ('products', 'products', 'Product', 'Products', 'voyager-droplet', 'App\\Models\\Product', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-03-21 07:17:28', '2022-03-21 07:21:15');
-- --------------------------------------------------------
--
-- Дамп данных таблицы `data_rows`
--

INSERT INTO `data_rows` (`data_type_id`, `field`, `type`, `display_name`, `required`, `browse`, `read`, `edit`, `add`, `delete`, `details`, `order`) VALUES
(4, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(4, 'name', 'text', 'Name', 0, 1, 1, 1, 1, 1, '{}', 2),
(4, 'key', 'text', 'Key', 1, 1, 1, 1, 1, 1, '{}', 3),
(4, 'type', 'text', 'Type', 0, 0, 0, 0, 0, 0, '{}', 4),
(4, 'value', 'text_area', 'Value', 0, 1, 1, 1, 1, 1, '{}', 5),
(5, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(5, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{}', 2),
(5, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 1, 0, 1, '{}', 3),
(5, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 4),
(6, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(6, 'title', 'text', 'Title', 0, 1, 1, 1, 1, 1, '{}', 3),
(6, 'image', 'image', 'Image', 0, 1, 1, 1, 1, 1, '{}', 4),
(6, 'body', 'text_area', 'Body', 0, 0, 1, 1, 1, 1, '{}', 5),
(6, 'article_type_id', 'hidden', 'Article Type Id', 1, 1, 1, 1, 1, 1, '{}', 2),
(6, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 1, 0, 1, '{}', 6),
(6, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 7),
(6, 'article_belongsto_article_type_relationship', 'relationship', 'Type', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\ArticleType\",\"table\":\"article_types\",\"type\":\"belongsTo\",\"column\":\"article_type_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"article_types\",\"pivot\":\"0\",\"taggable\":\"0\"}', 8),
(7, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(7, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{}', 2),
(7, 'deleted_at', 'timestamp', 'Deleted At', 0, 0, 1, 1, 1, 1, '{}', 3),
(7, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 1, 0, 1, '{}', 4),
(7, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 5),
(8, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(8, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{}', 3),
(8, 'image', 'image', 'Image', 0, 1, 1, 1, 1, 1, '{}', 4),
(8, 'price', 'number', 'Price', 1, 1, 1, 1, 1, 1, '{}', 5),
(8, 'count', 'hidden', 'Count', 1, 0, 0, 0, 0, 0, '{}', 6),
(8, 'description', 'text_area', 'Description', 0, 0, 1, 1, 1, 1, '{}', 7),
(8, 'category_id', 'hidden', 'Category Id', 1, 1, 1, 1, 1, 1, '{}', 2),
(8, 'deleted_at', 'timestamp', 'Deleted At', 0, 0, 1, 1, 1, 1, '{}', 8),
(8, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 1, 0, 1, '{}', 9),
(8, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 10),
(8, 'product_belongsto_category_relationship', 'relationship', 'Category', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Category\",\"table\":\"categories\",\"type\":\"belongsTo\",\"column\":\"category_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"article_types\",\"pivot\":\"0\",\"taggable\":\"0\"}', 11);
-- --------------------------------------------------------
--
-- Дамп данных таблицы `menu_items`
--
INSERT INTO `menu_items` (`menu_id`, `title`, `url`, `target`, `icon_class`, `color`, `parent_id`, `order`, `created_at`, `updated_at`, `route`, `parameters`) VALUES
                                                                                                                                                                         (1, 'Infos', '', '_self', 'voyager-info-circled', NULL, NULL, 15, '2022-03-21 07:08:47', '2022-03-21 07:08:47', 'voyager.infos.index', NULL),
                                                                                                                                                                         (1, 'Article Types', '', '_self', 'voyager-list', NULL, NULL, 16, '2022-03-21 07:10:27', '2022-03-21 07:10:27', 'voyager.article-types.index', NULL),
                                                                                                                                                                         (1, 'Articles', '', '_self', 'voyager-news', NULL, NULL, 17, '2022-03-21 07:11:54', '2022-03-21 07:11:54', 'voyager.articles.index', NULL),
                                                                                                                                                                         (1, 'Categories', '', '_self', 'voyager-categories', NULL, NULL, 18, '2022-03-21 07:15:50', '2022-03-21 07:15:50', 'voyager.categories.index', NULL),
                                                                                                                                                                         (1, 'Products', '', '_self', 'voyager-droplet', NULL, NULL, 19, '2022-03-21 07:17:29', '2022-03-21 07:17:29', 'voyager.products.index', NULL);

INSERT INTO `permissions` (`key`, `table_name`, `created_at`, `updated_at`) VALUES
                                                                                ('browse_infos', 'infos', '2022-03-21 09:04:03', '2022-03-21 09:04:03'),
                                                                                ('read_infos', 'infos', '2022-03-21 09:04:03', '2022-03-21 09:04:03'),
                                                                                ('edit_infos', 'infos', '2022-03-21 09:04:03', '2022-03-21 09:04:03'),
                                                                                ('add_infos', 'infos', '2022-03-21 09:04:03', '2022-03-21 09:04:03'),
                                                                                ('delete_infos', 'infos', '2022-03-21 09:04:03', '2022-03-21 09:04:03'),
                                                                                ('browse_article_types', 'article_types', '2022-03-21 09:08:37', '2022-03-21 09:08:37'),
                                                                                ('read_article_types', 'article_types', '2022-03-21 09:08:37', '2022-03-21 09:08:37'),
                                                                                ('edit_article_types', 'article_types', '2022-03-21 09:08:37', '2022-03-21 09:08:37'),
                                                                                ('add_article_types', 'article_types', '2022-03-21 09:08:37', '2022-03-21 09:08:37'),
                                                                                ('delete_article_types', 'article_types', '2022-03-21 09:08:37', '2022-03-21 09:08:37'),
                                                                                ('browse_articles', 'articles', '2022-03-21 09:08:42', '2022-03-21 09:08:42'),
                                                                                ('read_articles', 'articles', '2022-03-21 09:08:42', '2022-03-21 09:08:42'),
                                                                                ('edit_articles', 'articles', '2022-03-21 09:08:42', '2022-03-21 09:08:42'),
                                                                                ('add_articles', 'articles', '2022-03-21 09:08:42', '2022-03-21 09:08:42'),
                                                                                ('delete_articles', 'articles', '2022-03-21 09:08:42', '2022-03-21 09:08:42'),
                                                                                ('browse_categories', 'categories', '2022-03-21 09:08:50', '2022-03-21 09:08:50'),
                                                                                ('read_categories', 'categories', '2022-03-21 09:08:50', '2022-03-21 09:08:50'),
                                                                                ('edit_categories', 'categories', '2022-03-21 09:08:50', '2022-03-21 09:08:50'),
                                                                                ('add_categories', 'categories', '2022-03-21 09:08:50', '2022-03-21 09:08:50'),
                                                                                ('delete_categories', 'categories', '2022-03-21 09:08:50', '2022-03-21 09:08:50'),
                                                                                ('browse_products', 'products', '2022-03-21 09:09:12', '2022-03-21 09:09:12'),
                                                                                ('read_products', 'products', '2022-03-21 09:09:12', '2022-03-21 09:09:12'),
                                                                                ('edit_products', 'products', '2022-03-21 09:09:12', '2022-03-21 09:09:12'),
                                                                                ('add_products', 'products', '2022-03-21 09:09:12', '2022-03-21 09:09:12'),
                                                                                ('delete_products', 'products', '2022-03-21 09:09:12', '2022-03-21 09:09:12');

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
                                                               (26, 1),
                                                               (27, 1),
                                                               (28, 1),
                                                               (29, 1),
                                                               (30, 1),
                                                               (31, 1),
                                                               (32, 1),
                                                               (33, 1),
                                                               (34, 1),
                                                               (35, 1),
                                                               (36, 1),
                                                               (37, 1),
                                                               (38, 1),
                                                               (39, 1),
                                                               (40, 1),
                                                               (41, 1),
                                                               (42, 1),
                                                               (43, 1),
                                                               (44, 1),
                                                               (45, 1),
                                                               (46, 1),
                                                               (47, 1),
                                                               (48, 1),
                                                               (49, 1),
                                                               (50, 1);
